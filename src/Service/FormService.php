<?php
/**
 * Created by PhpStorm.
 * User: dangis
 * Date: 18.6.2
 * Time: 17.38
 */

namespace App\Service;

use App\Entity\Tag;
use App\Service\Google\DriveService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * @property DriveService drive
 */
class FormService
{

    /**
     * FormService constructor.
     * @param DriveService $driveService
     * @param TokenStorageInterface $tokenStorage
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(DriveService $driveService, TokenStorageInterface $tokenStorage, EntityManagerInterface $entityManager)
    {
        $this->em = $entityManager;
        $this->drive = $driveService;
        $this->tokenStorage = $tokenStorage;
    }

    /**
     * @param $document
     * @param $form
     */
    public function validateForm($document, $form)
    {
        $document->setDocumentName($form["documentName"]->getData());
        $document->setDocumentDate($form["documentDate"]->getData());
        $document->setDocumentReminder($form["documentReminder"]->getData());
        $document->setDocumentExpires($form["documentExpires"]->getData());
        $document->setDocumentNotes($form["documentNotes"]->getData());
        $document->setUser($this->tokenStorage->getToken()->getUser());
        $document->setCategory($form["category"]->getData());

        $tags = $form["tag"]->getData();
        foreach ($tags as $tagInd) {
            $this->addTags($document, $tagInd);
        }

        if (sizeof($form["files"]->getData()) > 0) {
            $images = $form["files"]->getData();
            $this->drive->storageInit();
            foreach ($images as $image) {
                $fileName = $image->getfileName();
                $filePath = $image->getpathName();
                $this->drive->saveFiles($filePath, $fileName, $form["documentName"]->getData());

                //                    $file = New Files;
                //                    $file->setDocument($document);
                //                    $file->setFileAttach($image->getfileName());
                //                    $document->addFile($file);
            }
            $document->setDocumentPath($this->drive->getFolderLink($form["documentName"]->getData()));
        }
        $this->addDocument($document);
    }

    public function addTags($document, $tagInd)
    {
        $entityManager = $this->em;
        $user = $entityManager
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

    /**
     * @param $document
     */
    public function addDocument($document)
    {
        $entityManager = $this->em;
        $entityManager->persist($document);
        $entityManager->flush();
    }
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