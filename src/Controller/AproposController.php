<?php

namespace App\Controller;

use App\Entity\Prestataire;
use App\Form\PrestataireSearchType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AproposController extends AbstractController
{
    /**
     * @Route("/apropos",name="aPropos")
     */
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
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

            $repositoryPrestataires = $entityManager->getRepository(Prestataire::class);
            $partenaires = $repositoryPrestataires->SearchBar($nomPrestataire, $categorieId, $localite, $codePostal, $commune);

            // Utilise le bundle de pagination => https://github.com/KnpLabs/KnpPaginatorBundle
            $pagination = $paginator->paginate(
                $partenaires, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
                8 /*limit par page*/
            );

            // envoi les données reçues par la DB à la vue liste de prestataires
            return $this->render('partenaire/liste.html.twig', [
                'partenaires' => $partenaires,
                "form" => $formView,
                'pagination' => $pagination

            ]);
        }
                
                $repositoryPrestataires = $entityManager->getRepository(Prestataire::class);
        
        
                return $this->render('apropos/index.html.twig', [
                    'form' => $formView
                ]);

    }
}
