<?php

namespace App\Controller;

use App\Entity\Prestataire;
use App\Entity\CategorieService;
use App\Form\PrestataireSearchType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;

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
    public function listeCategoriesService(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {

        // récupération de la liste de toutes les catégories présentes dans la DB
        $repository = $entityManager->getRepository(CategorieService::class);
        $categories = $repository->findAll();

        // Utilise le bundle de pagination => https://github.com/KnpLabs/KnpPaginatorBundle
        $pagination = $paginator->paginate(
            $categories, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            4 /*limit par page*/
        );

        return $this->render('service/liste.html.twig', [
            "categories" => $categories,
            "pagination" => $pagination
        ]);
    }



    // Affichage detail d'un Service

    /**
     * @Route("services/detail/{id}", name="detailService")
     */

    public function detailcategorieService($id, EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator)
    {

        // trouve le detail catégorie
        $repository = $entityManager->getRepository(CategorieService::class);
        $categorie = $repository->find($id);

        // récupére les 4 derniers presatataires inscrits dans cette catégorie
        $repository = $entityManager->getRepository(Prestataire::class);
        $lastPrestataires = $repository->last4Prestataires($id);

        return $this->render(
            'service/detail.html.twig',
            [
                'categorie' => $categorie,
                'lastPrestataires' => $lastPrestataires,
            ]
        );
    }
}
