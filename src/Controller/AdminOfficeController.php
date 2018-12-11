<?php

namespace App\Controller;

use App\Entity\Office;
use App\Form\OfficeType;
use App\Repository\OfficeRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminOfficeController extends AbstractController
{

    /*
    @Route("/admin/office", name="admin_office")

    public function index()
    {
        return $this->render('admin_office/index.html.twig', [
            'controller_name' => 'AdminOfficeController',
        ]);
    }

    */


    /**
     * @Route("/admin/office", name="admin_office")
     */
    public function index(OfficeRepository $officeRepository)
    {
        $results = $officeRepository->findAll();

        return $this->render('admin_office/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/office/add", name="admin_office_add")
     */
    public function add(Request $request, ObjectManager $objectManager, EntityManagerInterface $entityManager) {

        $office = new Office();

        $form = $this->createForm(OfficeType::class, $office);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $objectManager->persist($office);
            $objectManager->flush();

            return $this->redirectToRoute('admin_office_edit',['id' => $office->getId()]);
        }
        return $this->render('admin_office/add.html.twig', ['form' => $form->createView(),]);
    }

    /**
     * @Route("/admin/office/{id}/edit", name="admin_office_edit")
     */
    public function edit(Office $office, Request $request, ObjectManager $objectManager) {

        $form = $this->createForm(OfficeType::class, $office);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($office);
            $objectManager->flush();
        }

        return $this->render('admin_office/edit.html.twig', [
            'form' => $form->createView(),
            'name' => $office->getName(),
        ]);

    }
}
