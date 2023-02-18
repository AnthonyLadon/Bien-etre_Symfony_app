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
            // creation du formulaire de recherche de prestataire
            $form = $this->createForm(PrestataireSearchType::class, null, [
                'method' => 'GET',
                // retire le token de l'url généré (GET)
                'csrf_protection' => false
            ]);
    
            $formView = $form->createView();
    
            $form->handleRequest($request);
            if ($form->isSubmitted() && $form->isValid()) {
                $form->getData(); // stocke les valeurs envoyées
    
                $receivedDatas = $form->getData('viewData');
    
                // récupération des données envoyées via le formulaire
                $nomPrestataire = $receivedDatas['prestataire'];
    
                // pour ne pas executer de ->get() si la valeur récupérée vaut null
                !is_null($receivedDatas['categorie']) ? $categorieId = $receivedDatas['categorie']->getId(): $categorieId = null;
                !is_null($receivedDatas['localite']) ? $localite = $receivedDatas['localite']->getId(): $localite = null;
                !is_null($receivedDatas['cp']) ? $codePostal = $receivedDatas['cp']->getCodePostal(): $codePostal = null;
                !is_null($receivedDatas['commune']) ? $commune = $receivedDatas['commune']->getCommune(): $commune = null;
                //verif des données envoyées au repository
                //dd($nomPrestataire, $categorieId, $localite, $codePostal, $commune);
    
                $repositoryPrestataires = $entityManager->getRepository(Prestataire::class);
                $partenaires = $repositoryPrestataires->SearchBar($nomPrestataire, $categorieId, $localite, $codePostal, $commune);
                // verif des données recues de la DB
                //dd($partenaires);
    
                // envoi les données reçues par la DB à la vue liste de prestataires
                return $this->render('partenaire/liste.html.twig', [
                    'partenaires' => $partenaires,
                    'form' => $formView
                ]);
            }
                
        // récupération de la liste de toutes les catégories présentes dans la DB
        $repository = $entityManager->getRepository(CategorieService::class);
        $categories = $repository->findAll();

        // Utilise le bundle de pagination => https://github.com/KnpLabs/KnpPaginatorBundle
        $pagination = $paginator->paginate(
            $categories, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit par page*/
        );

        return $this->render('service/liste.html.twig', [
            "categories" => $categories,
            'form' => $formView,
            "pagination" => $pagination
        ]);
    }



    // Affichage detail d'un Service

    /**
     * @Route("services/detail/{id}", name="detailService")
     */

    public function detailcategorieService($id, EntityManagerInterface $entityManager, Request $request)
    {

        // creation du formulaire de recherche de prestataire
        $form = $this->createForm(PrestataireSearchType::class, null, [
            'method' => 'GET',
            // retire le token de l'url généré (GET)
            'csrf_protection' => false
        ]);

        $formView = $form->createView();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData(); // stocke les valeurs envoyées

            $receivedDatas = $form->getData('viewData');

            // récupération des données envoyées via le formulaire
            $nomPrestataire = $receivedDatas['prestataire'];

            // pour ne pas executer de ->get() si la valeur récupérée vaut null
            !is_null($receivedDatas['categorie']) ? $categorieId = $receivedDatas['categorie']->getId(): $categorieId = null;
            !is_null($receivedDatas['localite']) ? $localite = $receivedDatas['localite']->getId(): $localite = null;
            !is_null($receivedDatas['cp']) ? $codePostal = $receivedDatas['cp']->getCodePostal(): $codePostal = null;
            !is_null($receivedDatas['commune']) ? $commune = $receivedDatas['commune']->getCommune(): $commune = null;
            //verif des données envoyées au repository
            //dd($nomPrestataire, $categorieId, $localite, $codePostal, $commune);

            $repositoryPrestataires = $entityManager->getRepository(Prestataire::class);
            $partenaires = $repositoryPrestataires->SearchBar($nomPrestataire, $categorieId, $localite, $codePostal, $commune);
            // verif des données recues de la DB
            //dd($partenaires);

            // envoi les données reçues par la DB à la vue liste de prestataires
            return $this->render('partenaire/liste.html.twig', [
                'partenaires' => $partenaires,
                'form' => $formView
            ]);
        }


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
                'form' => $formView
            ]
        );
    }
}
