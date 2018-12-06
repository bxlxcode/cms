<?php

namespace App\Controller;

use App\Entity\Gallery;
use App\Form\GalleryType;
use App\Repository\ImageRepository;
use App\Repository\GalleryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminGalleryController extends AbstractController
{
    /**
     * @Route("/admin/gallery", name="admin_gallery")
     */
    public function index(GalleryRepository $galleryRepository)
    {
        $results = $galleryRepository->findAll();

        return $this->render('admin_gallery/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/gallery/add", name="admin_gallery_add")
     */
    public function add(Request $request, ObjectManager $objectManager) {
        $gallery = new Gallery();
        $form = $this->createForm(GalleryType::class, $gallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($gallery);
            $objectManager->flush();

            return $this->redirectToRoute('admin_gallery');
        }

        return $this->render('admin_gallery/add.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/gallery/{id}/edit", name="admin_gallery_edit")
     */
    public function edit(Gallery $gallery, Request $request, ObjectManager $objectManager) {
        $form = $this->createForm(GalleryType::class, $gallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($gallery);
            $objectManager->flush();

            return $this->redirectToRoute('admin_gallery');
        }

        return $this->render('admin_gallery/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/gallery/{id}/{slug}/delete", name="admin_gallery_delete")
     */
    public function delete(Gallery $gallery, ObjectManager $objectManager, Request $request) {

        $objectManager->remove($gallery);
        $objectManager->flush();

       // dump($request->getRequestUri());

        return $this->redirectToRoute('admin_gallery');

        // return $this->render('admin_tag/delete.html.twig');
    }

    /**
     * @Route("/admin/gallery/{id}/show", name="admin_gallery_show")
     */
    public function show(Gallery $gallery) {

        $images = $gallery->getImages();

        $results = new ArrayCollection();

        foreach ($images->getValues() as $key => $value) {
            //echo 'key ='.$key;
            //echo 'value ='.$value->getId();
            $results->set($key, $value);
        }

        dump($results);

        return $this->render('admin_gallery/show.html.twig',[
            'results' => $results,
            'name' => $gallery->getName()
        ]);
    }
}
