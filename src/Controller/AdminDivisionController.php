<?php

namespace App\Controller;

use App\Entity\Division;
use App\Form\DivisionType;
use App\Repository\DivisionRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminDivisionController extends AbstractController
{
    /**
     * @Route("/admin/division", name="admin_division")
     */
    public function index(DivisionRepository $divisionRepository)
    {
        $results = $divisionRepository->findAll();

        return $this->render('admin_division/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/division/add", name="admin_division_add")
     */
    public function add(Request $request, ObjectManager $objectManager, EntityManagerInterface $entityManager) {

        $division = new Division();

        $form = $this->createForm(DivisionType::class, $division);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $objectManager->persist($division);
            $objectManager->flush();

            return $this->redirectToRoute('admin_division_edit',['id' => $division->getId()]);
        }
        return $this->render('admin_division/add.html.twig', ['form' => $form->createView(),]);
    }

    /**
     * @Route("/admin/division/{id}/edit", name="admin_division_edit")
     */
    public function edit(Division $division, Request $request, ObjectManager $objectManager) {

        $form = $this->createForm(DivisionType::class, $division);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($division);
            $objectManager->flush();
        }

        return $this->render('admin_division/edit.html.twig', [
            'form' => $form->createView(),
            'name' => $division->getName(),
        ]);

    }

}
