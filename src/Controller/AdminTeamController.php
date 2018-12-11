<?php

namespace App\Controller;

use App\Entity\Team;
use App\Form\TeamType;
use App\Repository\TeamRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class AdminTeamController extends AbstractController
{
    /**
     * @Route("/admin/team", name="admin_team")
     */
    public function index(TeamRepository $teamRepository)
    {
        $results = $teamRepository->findAll();

        return $this->render('admin_team/index.html.twig', [
            'results' => $results,
        ]);
    }

    /**
     * @Route("/admin/team/add", name="admin_team_add")
     */
    public function add(Request $request, ObjectManager $objectManager, EntityManagerInterface $entityManager) {

        $team = new Team();

        $form = $this->createForm(TeamType::class, $team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $objectManager->persist($team);
            $objectManager->flush();

            return $this->redirectToRoute('admin_team');
            //return $this->redirectToRoute('admin_team_edit',['id' => $team->getId()]);
        }
        return $this->render('admin_team/add.html.twig', ['form' => $form->createView(),]);
    }

    /**
     * @Route("/admin/team/{id}/edit", name="admin_team_edit")
     */
    public function edit(Team $team, Request $request, ObjectManager $objectManager) {

        $form = $this->createForm(TeamType::class, $team);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $objectManager->persist($team);
            $objectManager->flush();
        }

        return $this->render('admin_team/edit.html.twig', [
            'form' => $form->createView(),
            'name' => $team->getFullName(),
        ]);

    }
}
