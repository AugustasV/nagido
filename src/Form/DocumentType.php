<?php
/**
 * Created by PhpStorm.
 * User: dangis
 * Date: 18.5.19
 * Time: 15.43
 */

namespace App\Form;

use App\Entity\Category;
use App\Entity\Document;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class DocumentType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("documentName", TextType::class, array(
                'attr' => array()
            ))
            ->add("documentDate", DateType::class, array(
                "html5" => true,
                'widget' => 'single_text',
                'attr' => array(),
                'required' => true
            ))
            ->add("documentExpires", DateType::class, array(
                'widget' => 'single_text',
                'attr' => array(),
                'required' => false
            ))
            ->add("documentReminder", DateType::class, array(
                'widget' => 'single_text',
                'attr' => array(),
                'required' => false
            ))
//            ->add('tag', CollectionType::class, array(
//                'entry_type' => TagType::class,
//                'entry_options' => array('label' => false),
//            ))
            ->add("documentNotes", TextareaType::class, array(
                'attr' => array(),
                'required' => false
            ))
            ->add('category', EntityType::class, array(
                'class' => Category::class,
                'choice_label' => 'categoryName',
            ))
            ->add("save", SubmitType::class, array(
                "label" => "Pridėti",
                'attr' => array('style' => 'float: left')
            ))
            ->add("cancel", ButtonType::class, array(
                'attr' => array("onClick" => "goBack()")
            ))
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => Document::class,
        ));
    }
}