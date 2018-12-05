<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Form\TagType;
use App\Repository\ImageRepository;
use App\Repository\TagRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminTagController extends AbstractController
{
    /**
     * @Route("/admin/tag", name="admin_tag")
     */
    public function index(TagRepository $tagRepository)
    {
        $results = $tagRepository->findAll();

        return $this->render('admin_tag/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/tag/add", name="admin_tag_add")
     */
    public function add(Request $request, ObjectManager $objectManager) {
        $tag = new Tag();
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($tag);
            $objectManager->flush();

            return $this->redirectToRoute('admin_tag');
        }

        return $this->render('admin_tag/add.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/tag/{id}/edit", name="admin_tag_edit")
     */
    public function edit(Tag $tag, Request $request, ObjectManager $objectManager) {
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($tag);
            $objectManager->flush();

            return $this->redirectToRoute('admin_tag');
        }

        return $this->render('admin_tag/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/tag/{id}/{slug}/delete", name="admin_tag_delete")
     */
    public function delete(Tag $tag, ObjectManager $objectManager, Request $request) {

        $objectManager->remove($tag);
        $objectManager->flush();

       // dump($request->getRequestUri());

        return $this->redirectToRoute('admin_tag');

        // return $this->render('admin_tag/delete.html.twig');
    }

    /**
     * @Route("/admin/tag/{id}/show", name="admin_tag_show")
     */
    public function show(Tag $tag) {

        $images = $tag->getImages();

        $results = new ArrayCollection();

        foreach ($images->getValues() as $key => $value) {
            //echo 'key ='.$key;
            //echo 'value ='.$value->getId();
            $results->set($key, $value);
        }

        dump($results);

        return $this->render('admin_tag/show.html.twig',[
            'results' => $results,
            'name' => $tag->getName()
        ]);
    }
}
