<?php

namespace App\Controller;

use App\Entity\IntrdocutionLandingPage;
use App\Form\IntrdocutionLandingPageType;
use App\Repository\IntrdocutionLandingPageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminIntrdocutionLandingPageController extends AbstractController
{
    /**
     * @Route("/admin/introductionlandingpage", name="admin_introductionlandingpage")
     */
    public function index(IntrdocutionLandingPageRepository $intrdocutionLandingPageRepository)
    {
        $results = $intrdocutionLandingPageRepository->findAll();

        foreach ( $results as $key => $value) {
            foreach ($value->getTranslations() as $key => $value) {
                dump($value);
            }
        }

        return $this->render('admin_introduction_landing_page/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/introductionlandingpage/add", name="admin_introductionlandingpage_add")
     */
    public function add(Request $request, ObjectManager $objectManager) {

        $introductionlandingpage = new IntrdocutionLandingPage();

        $form = $this->createForm(IntrdocutionLandingPageType::class, $introductionlandingpage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $objectManager->persist($introductionlandingpage);
            $objectManager->flush();

            return $this->redirectToRoute('admin_introductionlandingpage_edit',['id' => $introductionlandingpage->getId()]);
        }
        return $this->render('admin_introduction_landing_page/add.html.twig', ['form' => $form->createView(),]);
    }

    /**
     * @Route("/admin/introductionlandingpage/{id}/edit", name="admin_introductionlandingpage_edit")
     */
    public function edit(IntrdocutionLandingPage $intrdocutionLandingPage, Request $request, ObjectManager $objectManager) {

        $form = $this->createForm(IntrdocutionLandingPageType::class, $intrdocutionLandingPage);
        $form->handleRequest($request);

        dump($intrdocutionLandingPage->getTranslations());

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($intrdocutionLandingPage);
            $objectManager->flush();
        }

        return $this->render('admin_introduction_landing_page/edit.html.twig', [
            'form' => $form->createView(),
            'name' => $intrdocutionLandingPage->getTranslations()->get('fr')->getTitle(),
        ]);

    }

    /**
     * @Route("/admin/introductionlandingpage/{id}/show", name="admin_introductionlandingpage_show")
     */

    public function show(IntrdocutionLandingPage $intrdocutionLandingPage, ObjectManager $objectManager) {
        $article = $objectManager->find(IntrdocutionLandingPageType::class, $intrdocutionLandingPage->getId());
        $repository = $objectManager->getRepository('Gedmo\Translatable\Entity\Translation');
        $translations = $repository->findTranslations($article);
        dump($translations);

        return $this->render('admin_introduction_landing_page/show.html.twig');
    }


}
