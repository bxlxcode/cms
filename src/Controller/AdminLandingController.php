<?php

namespace App\Controller;

use App\Entity\Landing;
use App\Form\LandingType;
use App\Repository\LandingRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminLandingController extends AbstractController
{

    /**
     * @Route("/admin/landing", name="admin_landing")
     */
    public function index(LandingRepository $landingRepository)
    {
        $results = $landingRepository->findAll();

        return $this->render('admin_landing/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/landing/add", name="admin_landing_add")
     */
    public function add(Request $request, ObjectManager $objectManager) {
        $landing = new Landing();

        $form = $this->createForm(LandingType::class, $landing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($landing);
            $objectManager->flush();

            return $this->redirectToRoute('admin_landing');
        }

        return $this->render('admin_landing/add.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/landing/{id}/edit", name="admin_landing_edit")
     */
    public function edit(Landing $landing, Request $request, ObjectManager $objectManager) {
        $form = $this->createForm(LandingType::class, $landing);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($landing);
            $objectManager->flush();

            return $this->redirectToRoute('admin_landing');
        }

        return $this->render('admin_landing/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/landing/{id}/{slug}/delete", name="admin_landing_delete")
     */
    public function delete(Landing $landing, ObjectManager $objectManager, Request $request) {

        $objectManager->remove($landing);
        $objectManager->flush();

        // dump($request->getRequestUri());

        return $this->redirectToRoute('admin_landing');

        // return $this->render('admin_tag/delete.html.twig');
    }

}
