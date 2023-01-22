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
            // pour ne pas executer ->getLocalites() si la valeur récupérée vaut null
            !is_null($receivedDatas['localite']) ? $localite = $receivedDatas['localite']->getLocalite(): $localite = null;
            // pour envoyer l'id de la catégorie au repository
            !is_null($receivedDatas['categorie']) ? $categorieId = $receivedDatas['categorie']->getId(): $categorieId = null;
            $codePostal = $form->getData('CodePostal');
            $commune = $form->getData('commune');
            // pour verifier les données recues du form
                 //dd($form->getData());

            $repositoryPrestataires = $entityManager->getRepository(Prestataire::class);
            $partenaires = $repositoryPrestataires->SearchBar($nomPrestataire, $categorieId);
            //dd($partenaires);

            // envoi les données reçues par la DB à la vue liste de prestataires
            return $this->render('partenaire/liste.html.twig', [
                'partenaires' => $partenaires,
            ]);
        }
        
        $repositoryCategorie = $entityManager->getRepository(CategorieService::class);
        $repositoryPrestataires = $entityManager->getRepository(Prestataire::class);
        // Permet de récupérer la liste des services en avant (limité a 1 résultat)
        $highlightServices = $repositoryCategorie->findHighlightService();
        // Récupère les derniers prestataires à partir du plus grand ID et limite à 4 resultats
        $lastPrestataires = $repositoryPrestataires->findLastPrestataires();

        return $this->render('home/index.html.twig', [
            "highlightServices" => $highlightServices,
            "lastPrestataires" => $lastPrestataires,
            'form' => $formView
        ]);
    }

}