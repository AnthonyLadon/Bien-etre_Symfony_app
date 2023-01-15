<?php

namespace App\Controller;

use App\Entity\CategorieService;
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
        // Permet de récupérer la liste des services en avant (limité a un résultat)
        $highlightServices = $repository->findHighlightService();

        return $this->render('home/index.html.twig', [
            "highlightServices" => $highlightServices
        ]);
    }

}