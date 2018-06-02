<?php

namespace App\Controller;

//DB
use App\Entity\Category;
use App\Entity\Document;
use App\Entity\Tag;
use App\Entity\User;

//Form
use App\Form\DocumentType;

use App\Service\Google\DriveService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;


class HomeController extends Controller
{

    /**
     * @param Request $request
     * @param AuthorizationCheckerInterface $authChecker
     * @param DriveService $driveService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, AuthorizationCheckerInterface $authChecker, DriveService $driveService)
    {
        if (false === $authChecker->isGranted('ROLE_USER')) {
            return $this->render('home/index.html.twig', []);
        } else {
            $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser());
            $category = $this->getDoctrine()->getRepository(Category::class)->findAll();
            $documentCount = $this->getDoctrine()->getRepository(Document::class)->countDocuments($this->getUser(), false);
            $reminderCount = $this->getDoctrine()->getRepository(Document::class)->countDocuments($this->getUser(), true);

            $document = new Document();

            $form = $this->createForm(DocumentType::class, $document);
            $form->handleRequest($request);

            $tags = $this->getDoctrine()->getRepository(Tag::class)->tagFiles($user);

            if($form->isSubmitted() && $form->isValid()) {
                $document->setDocumentName($form["documentName"]->getData());
                $document->setDocumentDate($form["documentDate"]->getData());
                $document->setDocumentReminder($form["documentReminder"]->getData());
                $document->setDocumentExpires($form["documentExpires"]->getData());
                $document->setDocumentNotes($form["documentNotes"]->getData());
                $document->setUser($this->getUser());
                $document->setCategory($form["category"]->getData());


                $tags = $form["tag"]->getData();
                foreach ($tags as $tagInd) {
                    $user = $this->getDoctrine()
                        ->getRepository(Tag::class)
                        ->findOneBy(array('tagName' => $tagInd->getTagName()));
                    if ($user) {
                        $user->addDocument($document);
                        $document->addTag($user);
                    } else {
                        $tag = New Tag();
                        $tag->setTagName($tagInd->getTagName());
                        $tag->addDocument($document);
                        $document->addTag($tag);
                    }


                }

                if (sizeof($form["files"]->getData()) > 0) {

                    $images = $form["files"]->getData();
                    $driveService->storageInit();
                    foreach ($images as $image) {
                        $fileName = $image->getfileName();
                        $filePath = $image->getpathName();
                        $driveService->saveFiles($filePath, $fileName, $form["documentName"]->getData());

    //                    $file = New Files;
    //                    $file->setDocument($document);
    //                    $file->setFileAttach($image->getfileName());
    //                    $document->addFile($file);
                    }
                    $document->setDocumentPath($driveService->getFolderLink($form["documentName"]->getData()));
                }


//                $creationDate = clone $form["documentDate"]->getData();
//                if ($form["documentExpires"]->getData() === null) {
//                    switch ($form["category"]->getData()->getCategoryName()) {
//                        case "Pažymos":
//                            $creationDate->modify('+8 day');
//                            break;
//                        default:
//                            $creationDate = null;
//                    }
//                    $article->setDocumentExpires($creationDate);
//                }

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($document);
                $entityManager->flush();
                return $this->redirect("/");
            }

            return $this->render('home/home.html.twig', [
                'form' => $form->createView(),
                'files' => $this->getUser()->getDocuments(),
                'categories' => $category,
                'tags' => $tags,
                'documentCount' => $documentCount[0][1],
                'reminderCount' => $reminderCount[0][1]

            ]);
        }
    }

    /**
     * @return \Symfony\Component\Form\FormInterface
     */
    public function newForm() {
        $file = new Document();
        return $this->createForm(DocumentType::class, $file);
    }

    /**
     * @param $id
     */
    public  function delete($id)
    {
        $file = $this->getDoctrine()->getRepository(Document::class)->find($id);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($file);
        $entityManager->flush();
        $response = new Response();
        $response->send();
    }
}