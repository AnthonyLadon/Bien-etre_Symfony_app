<?php

namespace App\Controller;

use App\Entity\CategorieService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServiceController extends AbstractController
{
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
}
