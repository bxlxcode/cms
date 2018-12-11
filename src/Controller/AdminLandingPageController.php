<?php

namespace App\Controller;

use App\Entity\LandignPage;
use App\Form\LandingPageType;
use App\Repository\LandignPageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminLandingPageController extends AbstractController
{

    /**
     * @Route("/admin/landingpage", name="admin_landingpage")
     */
    public function index(LandignPageRepository $landignPageRepository)
    {
        $results = $landignPageRepository->findAll();

        foreach ( $results as $key => $value) {
            foreach ($value->getTranslations() as $key => $value) {
                dump($value);
            }
        }

        return $this->render('admin_landing_page/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/landingpage/add", name="admin_landingpage_add")
     */
    public function add(Request $request, ObjectManager $objectManager, EntityManagerInterface $entityManager) {

        $landingPage = new LandignPage();

        $form = $this->createForm(LandingPageType::class, $landingPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $objectManager->persist($landingPage);
            $objectManager->flush();

            return $this->redirectToRoute('admin_landingpage_edit',['id' => $landingPage->getId()]);
        }
        return $this->render('admin_landing_page/add.html.twig', ['form' => $form->createView(),]);
    }

    /**
     * @Route("/admin/landingpage/{id}/edit", name="admin_landingpage_edit")
     */
    public function edit(LandignPage $landignPage, Request $request, ObjectManager $objectManager) {

        $form = $this->createForm(LandingPageType::class, $landignPage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($landignPage);
            $objectManager->flush();

            return $this->redirectToRoute('admin_landingpage');
        }

        return $this->render('admin_landing_page/edit.html.twig', [
            'form' => $form->createView(),
            'name' => $landignPage->getTranslations()->get('fr')->getName(),
        ]);

    }
}
