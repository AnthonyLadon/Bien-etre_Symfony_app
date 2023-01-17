<?php

namespace App\Controller;

use App\Entity\CategorieService;
use App\Entity\Prestataire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use function Symfony\Component\DependencyInjection\Loader\Configurator\service;

class ServiceController extends AbstractController
{

    // Affichage liste des services

    /**
     * @Route("/services",name="listeServices")
     */
    public function Categories(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(CategorieService::class);
        $categories = $repository->findAll();

        return $this->render('service/liste.html.twig', [
            "categories" => $categories,
        ]);
    }



    // Affichage detail d'un Service

    /**
     * @Route("services/detail/{id}", name="detailService")
     */

    public function detailArticles($id, EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(CategorieService::class);
        $service = $repository->find($id);
        
        $lastPrestataires = $repository->last4Prestataires($id);

        return $this->render(
            'service/detail.html.twig',
            [
                'service' => $service,
                'lastPrestataires' => $lastPrestataires
            ]
        );
    }
}
