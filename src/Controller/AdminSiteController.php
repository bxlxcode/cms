<?php

namespace App\Controller;

use App\Entity\Site;
use App\Form\SiteType;
use App\Repository\SiteRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminSiteController extends AbstractController
{
    /**
     * @Route("/admin/site", name="admin_site")
     */
    public function index(SiteRepository $siteRepository)
    {
        $results = $siteRepository->findAll();

        return $this->render('admin_site/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/site/add", name="admin_site_add")
     */
    public function add(Request $request, ObjectManager $objectManager) {

        // gérer les traductions ici

        $site = new Site();
        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($site);
            $objectManager->flush();

            return $this->redirectToRoute('admin_site');
        }

        return $this->render('admin_site/add.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/admin/site/{id}/edit", name="admin_site_edit")
     */
    public function edit(Site $site, Request $request, ObjectManager $objectManager) {

        // gérer les traductions ici

        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($site);
            $objectManager->flush();

            return $this->redirectToRoute('admin_site');
        }

        return $this->render('admin_site/edit.html.twig', [
            'form' => $form->createView(),
        ]);

    }
}
