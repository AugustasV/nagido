<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Document;
use App\Entity\Tag;
use App\Entity\User;

//Form
use App\Form\DocumentType;

use App\Service\FormService;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class HomeController extends Controller
{

    /**
     * @param Request $request
     * @param AuthorizationCheckerInterface $authChecker
     * @param FormService $formService
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request, AuthorizationCheckerInterface $authChecker, FormService $formService)
    {
        if (false === $authChecker->isGranted('ROLE_USER')) {
            return $this->render('home/index.html.twig', []);
        } else {
            /* Data */
            $user = $this->getDoctrine()->getRepository(User::class)
                ->find($this->getUser());
            $category = $this->getDoctrine()->getRepository(Category::class)
                ->findAll();
            $documentCount = $this->getDoctrine()->getRepository(Document::class)
                ->countDocuments($this->getUser(), false);
            $reminderCount = $this->getDoctrine()->getRepository(Document::class)
                ->countDocuments($this->getUser(), true);
            $tags = $this->getDoctrine()->getRepository(Tag::class)
                ->tagFiles($user);

            /* Form */
            $document = new Document();
            $form = $this->createForm(DocumentType::class, $document);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $formService->validateForm($document, $form);
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
}
