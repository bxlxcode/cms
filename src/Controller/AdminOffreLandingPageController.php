<?php

namespace App\Controller;

use App\Entity\OffreLandingPage;
use App\Form\OffreLandingPageType;
use App\Repository\OffreLandingPageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminOffreLandingPageController extends AbstractController
{
    /**
     * @Route("/admin/offrelandingpage", name="admin_offrelandingpage")
     */
    public function index(OffreLandingPageRepository $offreLandingPageRepository)
    {
        $results = $offreLandingPageRepository->findAll();

        foreach ( $results as $key => $value) {
            foreach ($value->getTranslations() as $key => $value) {
                dump($value);
            }
        }

        return $this->render('admin_offre_landing_page/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/offrelandingpage/add", name="admin_offrelandingpage_add")
     */
    public function add(Request $request, ObjectManager $objectManager) {

        $offre = new OffreLandingPage();

        dump($offre);

        $form = $this->createForm(OffreLandingPageType::class, $offre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            dump($offre);

            $objectManager->persist($offre);
            $objectManager->flush();

            return $this->redirectToRoute('admin_offrelandingpage_edit',['id' => $offre->getId()]);
        }
        return $this->render('admin_offre_landing_page/add.html.twig', ['form' => $form->createView(),]);
    }

    /**
     * @Route("/admin/offrelandingpage/{id}/edit", name="admin_offrelandingpage_edit")
     */
    public function edit(OffreLandingPage $offreLandingPage, Request $request, ObjectManager $objectManager) {

        $form = $this->createForm(OffreLandingPageType::class, $offreLandingPage);
        $form->handleRequest($request);

        dump($offreLandingPage->getTranslations());

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($offreLandingPage);
            $objectManager->flush();
        }

        return $this->render('admin_offre_landing_page/edit.html.twig', [
            'form' => $form->createView(),
            'name' => $offreLandingPage->getTranslations()->get('fr')->getTitle(),
        ]);

    }

    /**
     * @Route("/admin/offrelandingpage/{id}/show", name="admin_offrelandingpage_show")
     */

    public function show(OffreLandingPage $offreLandingPage, ObjectManager $objectManager) {
        $article = $objectManager->find(OffreLandingPageType::class, $offreLandingPage->getId());
        $repository = $objectManager->getRepository('Gedmo\Translatable\Entity\Translation');
        $translations = $repository->findTranslations($article);
        dump($translations);

        return $this->render('admin_offre_landing_page/show.html.twig');
    }
}
