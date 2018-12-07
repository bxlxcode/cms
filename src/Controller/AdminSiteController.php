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

            // gérer les traductions ici
            $site->setTranslatableLocale('en');
            $objectManager->persist($site);
            $objectManager->flush();

            $siteTranslation = $site;

            // création de traduction
            foreach ($site->getLanguage() as $key => $value) {

                if ($value->getIso() != 'fr') {
                    if ($value->getIso() != 'en') {

                        $siteTranslation->setName('nom en ' . $value->getIso())
                        ->setLogo('logo en ' . $value->getIso())
                        ->setDescription('description en ' . $value->getIso())
                        ->setTranslatableLocale($value->getIso()); // change locale

                   $objectManager->persist($siteTranslation);
                   $objectManager->flush();
                    }
                }
            }

           return $this->redirectToRoute('admin_site');
        }

        return $this->render('admin_site/add.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/admin/site/{id}/edit", name="admin_site_edit")
     */
    public function edit(Site $site, Request $request, ObjectManager $objectManager, EntityManagerInterface $entityManager) {

        // gérer les traductions ici
        $form = $this->createForm(SiteType::class, $site);
        $form->handleRequest($request);

        // récupérer les traductions
        $repository = $objectManager->getRepository('Gedmo\Translatable\Entity\Translation');
        $translations = $repository->findTranslations($site);

        $forms = [];

        foreach ($translations as $key => $value) {
            $translationbis = new SiteTranslationBis();
            $translationbis->setKey($key);
            $translationbis->setName($value['name']);
            $translationbis->setDescription($value['description']);
            $translationbis->setLogo($value['logo']);
            $forms[$key] = $this->container->get('form.factory')->createNamed('form' . $key, SiteTranslationType::class, $translationbis);
        }

        if ($form->isSubmitted() && $form->isValid()) {

            // gérer les traductions ici

            // afficher les modifications qui sont faites dans des bêtes champs, mais pas dans la relation
            $uow = $entityManager->getUnitOfWork();
            $uow->computeChangeSets();
            $origine = $uow->getEntityChangeSet($site);
            dump($origine);

            // affiche les modifications qui sont faites dans la reation
            $second = ($uow->getScheduledCollectionUpdates());
            dump($second);

            // fin de la gestion des traductions

            $objectManager->persist($site);
            $objectManager->flush();

           return $this->redirectToRoute('admin_site');
        }

        return $this->render('admin_site/edit.html.twig', [
            'form' => $form->createView(),
            // envoyer les formulaires chargées en traduction
            'formen' => $forms['en']->createView(),
            'formnl' => $forms['nl']->createView(),
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
