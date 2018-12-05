<?php

namespace App\Controller;

use App\Entity\Image;
use App\Form\ImageType;
use App\Repository\ImageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminImageController extends AbstractController
{
    /**
     * @Route("/admin/image", name="admin_image")
     */
    public function index(ImageRepository $imageRepository)
    {
        $results = $imageRepository->findAll();

        return $this->render('admin_image/index.html.twig',[
            'results' => $results
        ]);
    }


    /**
     * @Route("/admin/image/upload", name="admin_image_upload")
     */
    public function upload() {
        return $this->render('admin_image/upload.html.twig');
    }

    /**
     * @Route("/admin/image/{id}/edit", name="admin_image_edit")
     */

    public function edit(Image $image, Request $request, ObjectManager $objectManager) {

        $form = $this->createForm(ImageType::class, $image);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($image);
            $objectManager->flush();
        }

        return $this->render('admin_image/edit.html.twig', [
            'form' => $form->createView(),
            'url' => $image->getUrl()
        ]);
    }


    /**
     * @Route("/admin/image/{id}/delete", name="admin_image_delete")
     */

    public function delete(Image $image, ObjectManager $objectManager) {

        $rul = $this->getParameter('pictures_directory').'/'.$image->getUrl();

        $filesystem = new Filesystem();
        $filesystem->remove($rul);

        $objectManager->remove($image);
        $objectManager->flush();

        return $this->redirectToRoute('admin_image');

        // return $this->render('admin_image/delete.html.twig');
    }

}
