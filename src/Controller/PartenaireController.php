<?php

namespace App\Controller;

use App\Entity\Prestataire;
use App\Form\PrestataireSearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PartenaireController extends AbstractController
{
    // Affichage de tous les Prestataires

    /**
     * @Route("/partenaires",name="listePartenaires")
     */
    public function listePrestataires(EntityManagerInterface $entityManager, Request $request): Response
    {

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
            
        $repository = $entityManager->getRepository(Prestataire::class);
        $partenaires = $repository->findAll();

        return $this->render('partenaire/liste.html.twig', [
            'partenaires' => $partenaires,
            'form' => $formView
        ]);
    }

    // Affichage detail d'un Prestataire

    /**
     * @Route("partenaires/detail/{id}", name="detailPartenaire")
     */

    public function detailPrestataire($id, EntityManagerInterface $entityManager, Request $request)
    {
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


        $repository = $entityManager->getRepository(Prestataire::class);
        $partenaire = $repository->find($id);

        return $this->render('partenaire/detail.html.twig', [
            'partenaire' => $partenaire,
            'form' => $formView
        ]);
    }
}
