<?php

namespace App\Controller;

use App\Entity\Stage;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StageController extends AbstractController
{

    // ----------------------------------------------------------------
    // Affichage liste des stages
    // ----------------------------------------------------------------
    /**
     * @Route("/stages",name="listeStages")
     */
    public function Stages(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {

        $repository = $entityManager->getRepository(Stage::class);
        $stages = $repository->findAll();

        // Utilise le bundle de pagination => https://github.com/KnpLabs/KnpPaginatorBundle
        $pagination = $paginator->paginate(
            $stages, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            4 /*limit par page*/
        );

        return $this->render('stage/liste.html.twig', [
            "stages" => $stages,
            "pagination" => $pagination
        ]);
    }


    // ----------------------------------------------------------------
    // Affichage detail stage
    // ----------------------------------------------------------------
    /**
     * @Route("stages/detail/{id}", name="detailStage")
     */
     public function detailStage($id, EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator)
     {

         $repository = $entityManager->getRepository(Stage::class);
         $stage = $repository->find($id);
 
         return $this->render(
             'stage/detail.html.twig',
             [
                 'stage' => $stage,
             ]
         );
     }

}
