<?php

namespace App\Controller;

use App\Entity\LandignPage;
use App\Repository\ImageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class LandingPageController extends AbstractController
{

    // Ajouter un lien depuis l'administration vers la page en production

    /**
     * @Route("/landingpage/{id}/show", name="landingpage_show")
     */

    public function show(LandignPage $landignPage, ObjectManager $objectManager, ImageRepository $imageRepository) {

        $landing = $objectManager->find(LandignPage::class, $landignPage->getId());
        $repository = $objectManager->getRepository('Gedmo\Translatable\Entity\Translation');
        $translations = $repository->findTranslations($landing);


        // il faut aller chercher les informations sur la landing page
        // id = $landignPage->getId()

        // ses zones == id des zones
        foreach ($landignPage->getLandingZone() as $key => $value) {
            // echo $value->getId();
        }

        // ses langues = id des langues
        // ses zones == id des zones
        foreach ($landignPage->getLanguage() as $key => $value) {
            //echo $value->getId();
        }


        // ses traductions
        foreach ($landignPage->getTranslations() as $key => $value) {
            //echo $key;
            // echo $value->getName();
            // echo '</br>';
        }


        // image du header
        $result = $imageRepository->find($landignPage->getHeaderLandingPage()->getImage());
        $url = $result->getUrl();


        foreach ($landignPage->getHeaderLandingPage()->getTranslations() as $key => $value) {
            echo $value->getTitle();
            dump($value);
        }

        // son header
        foreach ($landignPage->getHeaderLandingPage() as $key => $value) {
            dump($landignPage->getHeaderLandingPage());
        }


        return $this->render('landing_page/show.html.twig',[
            'landingpage' => $landignPage->getLandingZone(),
            'url' => $url,
        ]);
    }


}
