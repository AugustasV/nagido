<?php
/**
 * Created by PhpStorm.
 * User: dangis
 * Date: 18.6.2
 * Time: 14.02
 */

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Document;
use App\Entity\Tag;
use App\Service\DataService;
use App\Service\Google\DriveService;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @property DriveService drive
 */
class DocumentController extends Controller
{
    /**
     * DocumentController constructor.
     * @param DriveService $driveService
     */
    public function __construct(DriveService $driveService)
    {
        $this->drive = $driveService;
    }

    /**
     * @param Request $request
     * @param DataService $dataService
     * @return JsonResponse
     */
    public function index(Request $request, DataService $dataService)
    {
        $documents = $this->getUser()->getDocuments();
        return $dataService->processData($documents);
    }

    /**
     * @param $id
     */
    public function delete($id)
    {
        $file = $this->getDoctrine()->getRepository(Document::class)->find($id);

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->remove($file);
        $entityManager->flush();
        $response = new Response();
        $response->send();
    }

    public function test()
    {
        $this->drive->deleteFiles();
    }

    /**
     * @param Request $request
     * @param DataService $dataService
     * @return JsonResponse
     */
    public function edit(Request $request, DataService $dataService)
    {
        $input = $request->request->get('id');

        $documents = $this->getDoctrine()->getManager()->getRepository(Document::class)->findOneBy(["id" => $input]);

        return $dataService->processData($documents);
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function update(Request $request)
    {
        $id = $request->request->get('documentId');
        $name = $request->request->get('documentName');
        $category = $request->request->get('documentCategory');
        $date = $request->request->get('documentDate');
        $expires = $request->request->get('documentExpires');
        $reminder = $request->request->get('documentReminder');
        $notes = $request->request->get('documentNotes');
        $tags = $request->request->get('checkbox');


        $document = $this->getDoctrine()->getManager()->getRepository(Document::class)
            ->findOneBy(["id" => $id]);
        $category = $this->getDoctrine()->getManager()->getRepository(Category::class)
            ->findOneBy(["id" => $category]);

        $document->setDocumentName($name);
        $document->setCategory($category);
        $document->setDocumentNotes($notes);

        if ($tags !== null) {
            foreach ($tags as $tagId) {
                $tagRep = $this->getDoctrine()->getManager()->getRepository(Tag::class)
                    ->findOneBy(["id" => $tagId]);
                if ($tagRep) {
                    $document->removeTag($tagRep);
                } else {
                    $tagName = $this->getDoctrine()->getManager()->getRepository(Tag::class)
                        ->findOneBy(["tagName" => $tagId]);
                    if ($tagName) {
                        $tagName->addDocument($document);
                        $document->addTag($tagName);
                    } else {
                        $tag = new Tag();
                        $tag->setTagName($tagId);
                        $tag->addDocument($document);
                        $document->addTag($tag);
                    }
                }
            }
        }

        if ($date === "") {
            $document->setDocumentDate(null);
        } else {
            $document->setDocumentDate(\DateTime::createFromFormat('Y-m-d', $date));
        }
        if ($expires === "") {
            $document->setDocumentExpires(null);
        } else {
            $document->setDocumentExpires(\DateTime::createFromFormat('Y-m-d', $expires));
        }
        if ($reminder === "") {
            $document->setDocumentReminder(null);
        } else {
            $document->setDocumentReminder(\DateTime::createFromFormat('Y-m-d', $reminder));
        }

        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($document);
        $entityManager->flush();
        return $this->redirect("/");
    }
}
