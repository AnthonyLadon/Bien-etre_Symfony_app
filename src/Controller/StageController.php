<?php

namespace App\Controller;

use App\Entity\Stage;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class StageController extends AbstractController
{
    /**
     * @Route("/stages",name="listeStages")
     */
    public function Stages(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Stage::class);
        $stages = $repository->findAll();
        return $this->render('stage/liste.html.twig', [
            "stages" => $stages
        ]);
    }

    /**
     * @Route("stages/detail/{id}", name="detailStage")
     */

     public function detailStage($id, EntityManagerInterface $entityManager)
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
