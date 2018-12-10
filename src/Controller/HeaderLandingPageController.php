<?php

namespace App\Controller;

use App\Entity\HeaderLandingPage;
use App\Form\HeaderLandingPageType;
use App\Repository\HeaderLandingPageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class HeaderLandingPageController extends AbstractController
{

    /**
     * @Route("/admin/headerlandingpage", name="admin_headerlandingpage")
     */
    public function index(HeaderLandingPageRepository $headerLandingPageRepository)
    {
        $results = $headerLandingPageRepository->findAll();

        foreach ( $results as $key => $value) {
            foreach ($value->getTranslations() as $key => $value) {
                dump($value);
            }
        }

        return $this->render('admin_header_landing_page/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/headerlandingpage/add", name="admin_headerlandingpage_add")
     */
    public function add(Request $request, ObjectManager $objectManager, EntityManagerInterface $entityManager) {

        $site = new HeaderLandingPage();

        $form = $this->createForm(HeaderLandingPageType::class, $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $objectManager->persist($site);
            $objectManager->flush();

            return $this->redirectToRoute('admin_headerlandingpage_edit',['id' => $site->getId()]);
        }
        return $this->render('admin_header_landing_page/add.html.twig', ['form' => $form->createView(),]);
    }

    /**
     * @Route("/admin/headerlandingpage/{id}/edit", name="admin_headerlandingpage_edit")
     */
    public function edit(HeaderLandingPage $headerLandingPage, Request $request, ObjectManager $objectManager) {

        $form = $this->createForm(HeaderLandingPageType::class, $headerLandingPage);
        $form->handleRequest($request);

        dump($headerLandingPage->getTranslations());

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($headerLandingPage);
            $objectManager->flush();
        }

        return $this->render('admin_header_landing_page/edit.html.twig', [
            'form' => $form->createView(),
            'name' => $headerLandingPage->getId(),
        ]);

    }

    /**
     * @Route("/admin/headerlandingpage/{id}/show", name="admin_headerlandingpage_show")
     */

    public function show(HeaderLandingPage $headerLandingPage, ObjectManager $objectManager) {
        $article = $objectManager->find(HeaderLandingPage::class, $headerLandingPage->getId());
        $repository = $objectManager->getRepository('Gedmo\Translatable\Entity\Translation');
        $translations = $repository->findTranslations($article);
        dump($translations);

        return $this->render('admin_header_landing_page/show.html.twig');
    }
}
