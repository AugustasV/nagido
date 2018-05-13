<?php

namespace App\accSystem;

use App\Entity\Documents;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;

class formBuilder extends Controller
{
    public function form(Request $request, $id)
    {
        $file = new Documents();

        $form = $this->createFormBuilder($file)
            ->add("docName", TextType::class, array('attr' => array("class" => "form-control")))
            ->add("docDate", DateType::class, array('attr' => array("class" => "form-control")))
            ->add("docExpires", DateType::class, array('attr' => array("class" => "form-control")))
            ->add("docReminder", DateType::class, array('attr' => array("class" => "form-control")))
            ->add("save", SubmitType::class, array( "label" => "Add" ))
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

        return $form;
    }
}