<?php

namespace App\Controller;

use Google_Client;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
//Form
use App\Entity\Documents;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $session = new Session();
        $session->start();
        $tokens = $session->get("accessToken");

        if (isset($tokens) && $tokens) {
            $client = new Google_Client();
            try {
                $client->setAuthConfig('client_secrets.json');
            } catch (\Google_Exception $e) {
                $client = null;
            }
            $client->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");
            $id = $session->get("id");
            $client->setAccessToken($tokens);

            $userFiles = $this->getDoctrine()->getRepository(Documents::class)->findBy(["userId" => $id]);

            $file = new Documents();

            $form = $this->createFormBuilder($file)
                ->add("docName", TextType::class, array('attr' => array()))
                ->add("docDate", DateType::class, array(
                    "html5" => true,
                    'widget' => 'single_text',
                    'attr' => array()))
                ->add("docExpires", DateType::class, array(
                    'widget' => 'single_text',
                    'attr' => array()))
                ->add("docReminder", DateType::class, array(
                    'widget' => 'single_text',
                    'attr' => array()))
                ->add("save", SubmitType::class, array(
                    "label" => "Add",
                    'attr' => array('style' => 'float: left')
                ))
                ->add("cancel", ButtonType::class, array('attr' => array("onClick" => "goBack()")))
                ->getForm();

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
                'form' => $form->createView()
            ]);
        } else {
            return $this->render('home/index.html.twig', [
            ]);
        }
    }
}
