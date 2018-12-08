<?php

namespace App\Controller;

use App\Entity\Site;
use App\Entity\SiteTranslation;
use App\Entity\SiteTranslationBis;
use App\Form\SiteTranslationType;
use App\Form\SiteType;
use App\Repository\SiteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminSiteController extends AbstractController {

    /**
     * @Route("/admin/site", name="admin_site")
     */
    public function index(SiteRepository $siteRepository)
    {
        $results = $siteRepository->findAll();

        foreach ( $results as $key => $value) {
            foreach ($value->getTranslations() as $key => $value) {
                dump($value);
            }
        }

        return $this->render('admin_site/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/site/add", name="admin_site_add")
     */
    public function add(Request $request, ObjectManager $objectManager, EntityManagerInterface $entityManager) {

        $site = new Site();

        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $objectManager->persist($site);
            $objectManager->flush();

           return $this->redirectToRoute('admin_site_edit',['id' => $site->getId()]);
        }
        return $this->render('admin_site/add.html.twig', ['form' => $form->createView(),]);
    }

    /**
     * @Route("/admin/site/{id}/edit", name="admin_site_edit")
     */
    public function edit(Site $site, Request $request, ObjectManager $objectManager) {

        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);

        dump($site->getTranslations());

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($site);
            $objectManager->flush();
        }

        return $this->render('admin_site/edit.html.twig', [
            'form' => $form->createView(),
            'name' => $site->getId(),
        ]);

    }

    /**
     * @Route("/admin/site/{id}/show", name="admin_site_show")
     */

    public function show(Site $site, ObjectManager $objectManager) {
        $article = $objectManager->find(Site::class, $site->getId());
        $repository = $objectManager->getRepository('Gedmo\Translatable\Entity\Translation');
        $translations = $repository->findTranslations($article);
        dump($translations);

        return $this->render('admin_site/show.html.twig');
    }

}
