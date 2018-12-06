<?php

namespace App\Controller;

use App\Entity\Home;
use App\Form\HomeType;
use App\Repository\HomeRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminHomeController extends AbstractController
{
    /**
     * @Route("/admin/home", name="admin_home")
     */
    public function index(HomeRepository $homeRepository)
    {
        $results = $homeRepository->findAll();

        return $this->render('admin_home/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/home/add", name="admin_home_add")
     */
    public function add(Request $request, ObjectManager $objectManager) {
        $home = new Home();
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($home);
            $objectManager->flush();

            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin_home/add.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/home/{id}/edit", name="admin_home_edit")
     */
    public function edit(Home $home, Request $request, ObjectManager $objectManager) {
        $form = $this->createForm(HomeType::class, $home);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($home);
            $objectManager->flush();

            return $this->redirectToRoute('admin_home');
        }

        return $this->render('admin_home/edit.html.twig',[
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/admin/home/{id}/{slug}/delete", name="admin_home_delete")
     */
    public function delete(Home $home, ObjectManager $objectManager, Request $request) {

        $objectManager->remove($home);
        $objectManager->flush();

        // dump($request->getRequestUri());

        return $this->redirectToRoute('admin_home');

        // return $this->render('admin_tag/delete.html.twig');
    }
}
