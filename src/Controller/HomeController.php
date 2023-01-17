<?php

namespace App\Controller;

use App\Entity\CategorieService;
use App\Entity\Prestataire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="home")
     */

    public function index(EntityManagerInterface $entityManager){
        
        $repository = $entityManager->getRepository(CategorieService::class);
        $repository2 = $entityManager->getRepository(Prestataire::class);
        // Permet de récupérer la liste des services en avant (limité a un résultat)
        $highlightServices = $repository->findHighlightService();
        $lastPrestataires = $repository2->findLastPrestataires();

        return $this->render('home/index.html.twig', [
            "highlightServices" => $highlightServices,
            "lastPrestataires" => $lastPrestataires
        ]);
    }

}