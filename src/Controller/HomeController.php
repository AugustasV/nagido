<?php

namespace App\Controller;

use App\Entity\Category;
use App\Entity\Document;
use App\Entity\Tag;

use App\Form\DocumentType;
use App\Service\Google\CalendarService;
use App\Service\SaveDocument;
use DateInterval;
use DateTime;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Security\Core\Authorization\AuthorizationCheckerInterface;

class HomeController extends Controller
{

    /**
     * @param Request $request
     * @param AuthorizationCheckerInterface $authChecker
     * @param SaveDocument $saveDocument
     * @param CalendarService $calendarService
     * @return Response
     */
    public function index(Request $request, AuthorizationCheckerInterface $authChecker, SaveDocument $saveDocument, CalendarService $calendarService) : Response
    {
        if (false === $authChecker->isGranted('ROLE_USER')) {
            return $this->render('home/index.html.twig', []);
        } else {
            $user = $this->getUser();

            $category = $this->getDoctrine()->getRepository(Category::class)
                ->findAll();
            $documentCount = $this->getDoctrine()->getRepository(Document::class)
                ->countDocuments($user, false);
            $reminderCount = $this->getDoctrine()->getRepository(Document::class)
                ->countDocuments($user, true);
            $tags = $this->getDoctrine()->getRepository(Tag::class)
                ->tagFiles($user);


            /* Form */
            $document = new Document();
            $form = $this->createForm(DocumentType::class, $document);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $saveDocument->createDocument($form, $user);
                return $this->redirect("/");
            }

            return $this->render('home/home.html.twig', [
                'form' => $form->createView(),
                'files' => $user->getDocuments(),
                'categories' => $category,
                'tags' => $tags,
                'documentCount' => $documentCount[0][1],
                'reminderCount' => $reminderCount[0][1]
            ]);
        }
    }
}
