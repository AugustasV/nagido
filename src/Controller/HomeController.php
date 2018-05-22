<?php

namespace App\Controller;

//DB
use App\Entity\Category;
use App\Entity\Document;
use App\Entity\User;

//Form
use App\Form\DocumentType;

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
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, AuthorizationCheckerInterface $authChecker)
    {
        if (false === $authChecker->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->render('home/index.html.twig', [
            ]);
        } else {
            $user = $this->getDoctrine()->getRepository(User::class)->find($this->getUser());
            $id = $this->getDoctrine()->getRepository(User::class)->find($this->getUser())->getId();

            if ($request->isXmlHttpRequest()) {
                $documentId = $request->request->get('id');
                $userFiles = $this->getDoctrine()->getRepository(Document::class)->findOneBy(["id" => $documentId]);
                if($userFiles->getDocReminder() !== NULL) {
                    $reminder = $userFiles->getDocReminder()->format("Y-m-d");
                    $jsonData = array(
                        "docName" => $userFiles->getDocName(),
                        "docDate" => $userFiles->getDocDate()->format("Y-m-d"),
                        "docExpires" => $userFiles->getDocExpires()->format("Y-m-d"),
                        "docReminder" => $reminder,
                        "docCategory" => $userFiles->getCategoryId(),
                    );
                } else {
                    $jsonData = array(
                        "docName" => $userFiles->getDocName(),
                        "docDate" => $userFiles->getDocDate()->format("Y-m-d"),
                        "docExpires" => $userFiles->getDocExpires()->format("Y-m-d"),
                        "docCategory" => $userFiles->getCategoryId(),
                    );
                }
                return new JsonResponse($jsonData);
            }

            $form = $this->newForm();
            $form->handleRequest($request);

            $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
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
                'files' => $user->getDocuments(),
                'categories' => $categories,
                'form' => $form->createView(),
                'tags' => null,
                'reminders' => $reminders
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

            if ($request->isXmlHttpRequest()) {
                $documentId = $request->request->get('id');
                $userFiles = $this->getDoctrine()->getRepository(Document::class)->findOneBy(["id" => $documentId]);
                if($userFiles->getDocReminder() !== NULL) {
                    $reminder = $userFiles->getDocReminder()->format("Y-m-d");
                    $jsonData = array(
                        "docName" => $userFiles->getDocName(),
                        "docDate" => $userFiles->getDocDate()->format("Y-m-d"),
                        "docExpires" => $userFiles->getDocExpires()->format("Y-m-d"),
                        "docReminder" => $reminder,
                        "docCategory" => $userFiles->getCategoryId(),
                    );
                } else {
                    $jsonData = array(
                        "docName" => $userFiles->getDocName(),
                        "docDate" => $userFiles->getDocDate()->format("Y-m-d"),
                        "docExpires" => $userFiles->getDocExpires()->format("Y-m-d"),
                        "docCategory" => $userFiles->getCategoryId(),
                    );
                }
                return new JsonResponse($jsonData);
            }

            $form = $this->newForm();
            $form->handleRequest($request);

            $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
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
                'files' => $reminders,
                'categories' => $categories,
                'form' => $form->createView(),
                'tags' => null
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

            if ($request->isXmlHttpRequest()) {
                $documentId = $request->request->get('id');
                $userFiles = $this->getDoctrine()->getRepository(Document::class)->findOneBy(["id" => $documentId]);
                if($userFiles->getDocReminder() !== NULL) {
                    $reminder = $userFiles->getDocReminder()->format("Y-m-d");
                    $jsonData = array(
                        "docName" => $userFiles->getDocName(),
                        "docDate" => $userFiles->getDocDate()->format("Y-m-d"),
                        "docExpires" => $userFiles->getDocExpires()->format("Y-m-d"),
                        "docReminder" => $reminder,
                        "docCategory" => $userFiles->getCategoryId(),
                    );
                } else {
                    $jsonData = array(
                        "docName" => $userFiles->getDocName(),
                        "docDate" => $userFiles->getDocDate()->format("Y-m-d"),
                        "docExpires" => $userFiles->getDocExpires()->format("Y-m-d"),
                        "docCategory" => $userFiles->getCategoryId(),
                    );
                }
                return new JsonResponse($jsonData);
            }

            $form = $this->newForm();
            $form->handleRequest($request);

            $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();
            $reminders = $this->getDoctrine()->getRepository(Document::class)->reminderDates($this->getUser());
            $category = $this->getDoctrine()->getRepository(Category::class)->findOneBy(["id" => $kategorija]);
            $categoryFiles = $this->getDoctrine()->getRepository(Document::class)->categoryFiles($category, $user);

            if($form->isSubmitted() && $form->isValid()) {
                $article = $form->getData();
                $article->setUser($this->getUser());
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('index');
            }

            return $this->render('home/home.html.twig', [
                'files' => $categoryFiles,
                'categories' => $categories,
                'form' => $form->createView(),
                'tags' => null,
                'reminders' => $reminders
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
