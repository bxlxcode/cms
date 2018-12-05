<?php

namespace App\Controller;

use App\Entity\Language;
use App\Form\LanguageType;
use App\Repository\LanguageRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminLanguageController extends AbstractController
{
    /**
     * @Route("/admin/language", name="admin_language")
     */
    public function index(LanguageRepository $languageRepository)
    {
        $results = $languageRepository->findAll();

        return $this->render('admin_language/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/language/add", name="admin_language_add")
     */
    public function add(Request $request, ObjectManager $objectManager) {

        $language = new Language();
        $form = $this->createForm(LanguageType::class, $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($language);
            $objectManager->flush();

            return $this->redirectToRoute('admin_language');
        }

        return $this->render('admin_language/add.html.twig', [
            'form' => $form->createView(),
        ]);

    }

    /**
     * @Route("/admin/language/{id}/edit", name="admin_language_edit")
     */
    public function edit(Language $language, Request $request, ObjectManager $objectManager) {

        $form = $this->createForm(LanguageType::class, $language);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($language);
            $objectManager->flush();

            return $this->redirectToRoute('admin_language');
        }

        return $this->render('admin_language/edit.html.twig', [
            'form' => $form->createView(),
        ]);

    }

}
