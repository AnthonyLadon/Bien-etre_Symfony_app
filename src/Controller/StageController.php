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
}
