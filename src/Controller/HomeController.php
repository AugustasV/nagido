<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Document;
use App\Form\DocumentType;
use Google_Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//Form
use App\Entity\Documents;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends Controller
{
    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $session = $request->getSession();
        $session->start();
        $tokens = $session->get("accessToken");

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

        if (isset($tokens) && $tokens) {
            $client = new Google_Client();
            try {
                $client->setAuthConfig('../config/client_secrets.json');
            } catch (\Google_Exception $e) {
                $client = null;
            }
            $client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
            $id = $session->get("id");
            $client->setAccessToken($tokens);

            $userFiles = $this->getDoctrine()->getRepository(Document::class)->findBy(["user" => $id]);
            $categories = $this->getDoctrine()->getRepository(Category::class)->findAll();

            $form = $this->newForm();
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {

                $article = $form->getData();
                $article->setUser($id);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('index');
            }
            return $this->render('home/home.html.twig', [
                'files' => $userFiles,
                'categories' => $categories,
                'form' => $form->createView()
            ]);
        } else {
            return $this->render('home/index.html.twig', [
            ]);
        }
    }

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function reminder(Request $request)
    {
        $session = $request->getSession();
        $session->start();
        $tokens = $session->get("accessToken");

        if (isset($tokens) && $tokens) {
            $client = new Google_Client();
            try {
                $client->setAuthConfig('../config/client_secrets.json');
            } catch (\Google_Exception $e) {
                $client = null;
            }
            $client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
            $id = $session->get("id");
            $client->setAccessToken($tokens);

            $userFiles = $this->getReminderDates($id);
            //$categories = $this->getDoctrine()->getRepository(Categories::class)->findAll();
            $categories = null;

            $form = $this->newForm();
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $article = $form->getData();
                //$article->setUserId($id);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('index');
            }
            return $this->render('home/home.html.twig', [
                'files' => $userFiles,
                'categories' => $categories,
                'form' => $form->createView()
            ]);
        } else {
            return $this->render('home/index.html.twig', [
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
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|Response
     */
    public function categories(request $request, $kategorija)
    {
        $session = $request->getSession();
        $session->start();
        $tokens = $session->get("accessToken");

        if ($request->isXmlHttpRequest()) {
            $documentId = $request->request->get('id');
            $userFiles = $this->getDoctrine()->getRepository(Documents::class)->findOneBy(["id" => $documentId]);
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

        if (isset($tokens) && $tokens) {
            $client = new Google_Client();
            try {
                $client->setAuthConfig('../config/client_secrets.json');
            } catch (\Google_Exception $e) {
                $client = null;
            }
            $client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
            $id = $session->get("id");
            $client->setAccessToken($tokens);
            $kategorija = $kategorija - 1;
            $userFiles = $this->getDoctrine()->getRepository(Documents::class)->findBy(["userId" => $id, "categoryId" => $kategorija]);
            $categories = $this->getDoctrine()->getRepository(Categories::class)->findAll();

            $form = $this->newForm();
            $form->handleRequest($request);

            if($form->isSubmitted() && $form->isValid()) {
                $article = $form->getData();
                $article->setUserId($id);
                $article->setCategoryId(1);
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($article);
                $entityManager->flush();
                return $this->redirectToRoute('index');
            }

            return $this->render('home/home.html.twig', [
                'files' => $userFiles,
                'categories' => $categories,
                'form' => $form->createView()
            ]);
        } else {
            return $this->render('home/index.html.twig', [
            ]);
        }
    }

    /**
     * @param $id
     * @return mixed
     */
    public function getReminderDates($id)
    {
        $em = $this->getDoctrine()->getManager()->getRepository(Document::class);
        $qb = $em->createQueryBuilder("e");
        $qb
            ->andWhere('e.documentReminder IS NOT NULL AND e.user = :id')
            ->setParameter('id', $id)
        ;
        $result = $qb->getQuery()->getResult();
        return $result;
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
