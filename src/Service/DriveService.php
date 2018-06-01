<?php
/**
 * Created by PhpStorm.
 * User: dangis
 * Date: 18.5.30
 * Time: 15.25
 */

namespace App\Service;

use Google_Client;
use Google_Service_Drive;
use Google_Service_Drive_DriveFile;
use Google_Service_Drive_Permission;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

/**
 * @property Google_Service_Drive service
 * @property TokenStorageInterface tokenStorage
 */
class DriveService
{

    private $user;

    private $folderId;

    private $folderName;

    /**
     * DriveService constructor.
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(TokenStorageInterface $tokenStorage)
    {

        $this->tokenStorage = $tokenStorage;

        //Set Storage Name
        $this->folderName = "Nagido-Files";
    }

    public function storageInit()
    {
        //Get User
        $user = $this->tokenStorage->getToken()->getUser();

        //Create google client
        $client = new Google_Client();
        $client->setAccessToken($user->getGoogleAccessToken());

        //Set Drive Service
        $this->service = new Google_Service_Drive($client);

        $listFolder = $this->service->files->listFiles(['q' => "name='$this->folderName'"]);
        if (empty($listFolder->getFiles())) {
            //Create new folder
            $fileMetadata = new Google_Service_Drive_DriveFile(array(
                'name' => $this->folderName,
                'mimeType' => 'application/vnd.google-apps.folder',
                'folderColorRgb' => '#ff7f2a'
            ));
            //Insert folder
            $newFolder = $this->service->files->create($fileMetadata, array(
                'fields' => 'id'));
            $newFolder->setFolderColorRgb("#ff7f2a");
            $this->folderId = $newFolder->getId();

            $newPermission = new Google_Service_Drive_Permission();
            $newPermission->setType('anyone');
            $newPermission->setRole('reader');
            $this->service->permissions->create($this->folderId, $newPermission);
        } else {
            $this->folderId = $listFolder->getFiles()[0]->getId();
        }

    }

    public function saveFiles($filePath, $fileName, $documentName)
    {
        $Id = $this->createFolder($documentName);

        //Get file mimeType
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        //$file_path = '../public/uploads/brochures/'.$fileName;
        $mime_type = finfo_file($finfo, $filePath);

        //New file
        $file = new Google_Service_Drive_DriveFile(array(
            'name' => $fileName,
            'mimeType' => $mime_type,
            'description' => 'This is a '.$mime_type.' document',
            'parents' => array($Id)
        ));
        //Insert new file
        $this->service->files->create($file, array(
            'data' => file_get_contents($filePath),
            'mimeType' => $mime_type
        ));
    }

    public function createFolder($folderName)
    {
        $listFolder = $this->service->files->listFiles(['q' => "name='$folderName'"]);
        if (empty($listFolder->getFiles())) {
            //Create new folder
            $fileMetadata = new Google_Service_Drive_DriveFile(array(
                'name' => $folderName,
                'mimeType' => 'application/vnd.google-apps.folder',
                'folderColorRgb' => '#ff7f2a',
                'parents' => array($this->folderId)
            ));
            //Insert folder
            $newFolder = $this->service->files->create($fileMetadata, array(
                'fields' => 'id'));
            $newFolder->setFolderColorRgb("#ff7f2a");
            return $newFolder->getId();
        } else {
            return $listFolder->getFiles()[0]->getId();
        }
    }

    public function getFolderLink($documentName)
    {
            $listFolder = $this->service->files->listFiles(['q' => "name='$documentName'"]);
            $link = "https://drive.google.com/drive/folders/" . $listFolder->getFiles()[0]->getId();
            return $link;
    }

    public function deleteFiles()
    {

    }

}