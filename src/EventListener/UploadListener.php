<?php

namespace App\EventListener;

use App\Entity\Image;
use App\Entity\Language;
use App\Entity\Picture;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\PostUpdate;
use Oneup\UploaderBundle\Event\PostPersistEvent;
use Oneup\UploaderBundle\Event\PostUploadEvent;
use Oneup\UploaderBundle\Event\PreUploadEvent;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class UploadListener
{
    /**
     * @var EntityManager
     */
    private $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }


    /*
    public function onUpload(PreUploadEvent $event) {

        $file = $event->getFile();
        $res = $file->getPathName();


        $language = new Language();
        $language->setCreatedAt(new \DateTime('now'));
        $language->setUpdatedAt(new \DateTime('now'));
        $language->setName("onUpload");
        $language->setIsPublish(true);
        $language->setIcon($res);
        $language->setIso('fr');

        $this->entityManager->persist($language);
        $this->entityManager->flush();
    }
*/

    public function onPostUpload(PostUploadEvent $event) {

        $file = $event->getFile();
        $url = basename($file->getPathName());

        $image = new Image();
        $image->setName('')
            ->setIsPublish(true)
            ->setUrl($url)
            ->setCopyright('');

        /*

        $language = new Language();
        $language->setCreatedAt(new \DateTime('now'));
        $language->setUpdatedAt(new \DateTime('now'));
        $language->setName("onPostUpload");
        $language->setIsPublish(true);
        $language->setIcon($res);
        $language->setIso('fr');
        */

        $this->entityManager->persist($image);
        $this->entityManager->flush();

        /*

        $fileSystem = new Filesystem();

        // Move the file to the directory where brochures are stored
        try {
            $file->move(
                $this->getParameter('%kernel.root_dir%/../data/uploads/'),
                $file
            );
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        */

    }


/*
    public function toto(PostPersistEvent $event) {

        $file = $event->getFile();
        $res = $file->getPathName();

        $language = new Language();
        $language->setCreatedAt(new \DateTime('now'));
        $language->setUpdatedAt(new \DateTime('now'));
        $language->setName("toto");
        $language->setIsPublish(true);
        $language->setIcon($res);
        $language->setIso('fr');

        $this->entityManager->persist($language);
        $this->entityManager->flush();
    }
*/
}