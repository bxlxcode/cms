<?php

namespace App\Controller;

use App\Entity\Category;
use App\Form\CategoryType;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormView;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminCategoryController extends AbstractController
{
    /**
     * @Route("/admin/category/add", name="admin_category_add")
     */
    public function add(Request $request, ObjectManager $objectManager)
    {
        $category = new Category();
        $form = $this->createForm(CategoryType::class, $category);
        $form->handleRequest($request);

        foreach ($form->createView()->children as $key => $value) {
            //$form->remove('pt');

            foreach ($value->children as $toto => $valis) {
                dump($form->createView());
                $form->remove('pt');
            }
        }


        if ($form->isSubmitted() && $form->isValid()) {
            //$em = $this->getDoctrine()->getManager();
            $objectManager->persist($category);
            $objectManager->flush();

            //$this->addFlash('success', 'Created!');

        }

        return $this->render('admin_category/index.html.twig',[
            'category' => $category,
            'form' => $form->createView(),
        ]);
    }
}
