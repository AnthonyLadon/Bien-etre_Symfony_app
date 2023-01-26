<?php

namespace App\Controller;

use App\Entity\Prestataire;
use App\Entity\CategorieService;
use App\Entity\CodePostal;
use App\Form\PrestataireSearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Validator\Constraints\NotNull;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="home")
     */

    public function homeAndSearchForm(EntityManagerInterface $entityManager ,Request $request){

        // creation du formulaire
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
            $codePostal= $receivedDatas['cp'];
            $commune = strtoupper($receivedDatas['commune']);
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
        
        $repositoryCategorie = $entityManager->getRepository(CategorieService::class);
        $repositoryPrestataires = $entityManager->getRepository(Prestataire::class);
        // Permet de récupérer le service qui a le champ en avant = 1
        $highlightService = $repositoryCategorie->findOneBy(['enAvant' => 1]);
        // Récupère les derniers prestataires à partir du plus grand ID et limite à 4 resultats
        $lastPrestataires = $repositoryPrestataires->findLastPrestataires();

        return $this->render('home/index.html.twig', [
            "highlightService" => $highlightService,
            "lastPrestataires" => $lastPrestataires,
            'form' => $formView
        ]);
    }

}