<?php

namespace App\Controller;

use App\Entity\Slider;
use App\Form\SliderType;
use App\Repository\SliderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminSliderController extends AbstractController
{
    /**
     * @Route("/admin/slider", name="admin_slider")
     */
    public function index(SliderRepository $sliderRepository)
    {
        $results = $sliderRepository->findAll();

        return $this->render('admin_slider/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/slider/add", name="admin_slider_add")
     */
    public function add(Request $request, ObjectManager $objectManager) {
        $slider = new Slider();
        $form = $this->createForm(SliderType::class, $slider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($slider);
            $objectManager->flush();

            return $this->redirectToRoute('admin_slider');
        }

        return $this->render('admin_slider/add.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/slider/{id}/edit", name="admin_slider_edit")
     */
    public function edit(Slider $slider, Request $request, ObjectManager $objectManager) {
        $form = $this->createForm(SliderType::class, $slider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($slider);
            $objectManager->flush();

            return $this->redirectToRoute('admin_slider');
        }

        return $this->render('admin_slider/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/slider/{id}/{slug}/delete", name="admin_slider_delete")
     */
    public function delete(Slider $slider, ObjectManager $objectManager, Request $request) {

        $objectManager->remove($slider);
        $objectManager->flush();

        // dump($request->getRequestUri());

        return $this->redirectToRoute('admin_slider');

        // return $this->render('admin_tag/delete.html.twig');
    }

    /**
     * @Route("/admin/slider/{id}/show", name="admin_slider_show")
     */
    public function show(Slider $slider) {

        $images = $slider->getImages();

        $results = new ArrayCollection();

        foreach ($images->getValues() as $key => $value) {
            //echo 'key ='.$key;
            //echo 'value ='.$value->getId();
            $results->set($key, $value);
        }

        dump($results);

        return $this->render('admin_slider/show.html.twig',[
            'results' => $results,
            'name' => $slider->getName()
        ]);
    }

}
