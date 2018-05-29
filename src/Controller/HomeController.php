<?php

namespace App\Controller;

//DB
use App\Entity\Category;
use App\Entity\Document;
use App\Entity\User;

//Form
use App\Form\DocumentType;

use App\Service\DataService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;


class HomeController extends Controller
{
    private $categories;

    private $tags;

    /**
     * @param DataService $dataService
     */
    public function __construct(DataService $dataService)
    {
        $this->categories = $dataService->getCategories();
        $this->tags = $dataService->getTags();
    }

    /**
     * @param Request $request
     * @param AuthorizationCheckerInterface $authChecker
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function index(Request $request, AuthorizationCheckerInterface $authChecker)
    {
        if (false === $authChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->render('home/index.html.twig', []);
        } else {

            $document = new Document();
            $form = $this->createForm(DocumentType::class, $document);
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $article = $form->getData();

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

                $article->setUser($this->getUser());
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('index');
            }

            return $this->render('home/home.html.twig', [
                'form' => $form->createView(),
                'files' => $this->getUser()->getDocuments(),
                'categories' => $this->categories,
                'tags' => $this->tags
            ]);
        }
    }

    /**
     * @param Request $request
     * @param AuthorizationCheckerInterface $authChecker
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function reminder(Request $request, AuthorizationCheckerInterface $authChecker)
    {
        if (false === $authChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->render('home/index.html.twig', [
            ]);
        } else {

            $form = $this->newForm();
            $form->handleRequest($request);

            $reminders = $this->getDoctrine()->getRepository(Document::class)->reminderDates($this->getUser());

            if($form->isSubmitted() && $form->isValid()) {
                $article = $form->getData();
                $article->setUser($this->getUser());
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('index');
            }

            return $this->render('home/home.html.twig', [
                'form' => $form->createView(),
                'files' => $reminders,
                'categories' => $this->categories,
                'tags' => $this->tags
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
     * @param Request $request
     * @param $kategorija
     * @param AuthorizationCheckerInterface $authChecker
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function categories(request $request, $kategorija, AuthorizationCheckerInterface $authChecker)
    {
        if (false === $authChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->render('home/index.html.twig', [
            ]);
        } else {
            $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser());

            $form = $this->newForm();
            $form->handleRequest($request);

            $reminders = $this->getDoctrine()->getRepository(Document::class)->reminderDates($this->getUser());
            $category = $this->getDoctrine()->getRepository(Category::class)->findOneBy(["id" => $kategorija]);
            $categoryFiles = $this->getDoctrine()->getRepository(Document::class)->categoryFiles($category, $user);
            //$categoryFiles = $this->getDoctrine()->getRepository(Document::class)->findBy(["documentName" => "test"], ['documentDate' => 'DESC']);

            if($form->isSubmitted() && $form->isValid()) {
                $article = $form->getData();
                $article->setUser($this->getUser());
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('index');
            }

            return $this->render('home/home.html.twig', [
                'form' => $form->createView(),
                'files' => $categoryFiles,
                'reminders' => $reminders,
                'categories' => $this->categories,
                'tags' => $this->tags
            ]);
        }
    }

    /**
     * @param Request $request
     * @param $etikete
     * @param AuthorizationCheckerInterface $authChecker
     * @return JsonResponse|\Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function tags(request $request, $etikete, AuthorizationCheckerInterface $authChecker)
    {
        if (false === $authChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->render('home/index.html.twig', [
            ]);
        } else {
            $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser());

            $form = $this->newForm();
            $form->handleRequest($request);

            $tagFiles = $this->getDoctrine()->getRepository(Document::class)->tagFiles($etikete, $user);

            if($form->isSubmitted() && $form->isValid()) {
                $article = $form->getData();
                $article->setUser($this->getUser());
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('index');
            }

            return $this->render('home/home.html.twig', [
                'form' => $form->createView(),
                'files' => $tagFiles,
                'categories' => $this->categories,
                'tags' => $this->tags
            ]);
        }
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