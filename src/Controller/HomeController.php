<?php

namespace App\Controller;


use App\Entity\Images;
use App\Form\ImagesType;
use App\Entity\Prestataire;
use App\Entity\CategorieService;
use App\Services\UploaderHelper;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{

    // ----------------------------------------------------------------
    // Afficher page HOME
    // formulaire de recherche de prestataires, derniers prestataires 
    // inscrits et le service à la une
    // ----------------------------------------------------------------
    /**
     * @Route("/",name="home")
     */

    public function homeAndSearchForm(EntityManagerInterface $entityManager ,Request $request, PaginatorInterface $paginator){


        if (isset($_GET['submit'])){
            // Récupération des données envoyées en GET par le formulaire + filtrage des données entrées par l'utilisateur
            ($request->query->all()['nom'])!== "" ? $nom = filter_var(($request->query->all()['nom']), FILTER_SANITIZE_SPECIAL_CHARS) : $nom = null;
            ($request->query->all()['categorie'])!== "" ? $categorie = filter_var(($request->query->all()['categorie']), FILTER_SANITIZE_SPECIAL_CHARS) : $categorie = null;
            ($request->query->all()['localite'])!== "" ? $localite = filter_var(($request->query->all()['localite']), FILTER_SANITIZE_SPECIAL_CHARS) : $localite = null;
            ($request->query->all()['commune'])!== "" ? $commune = filter_var(($request->query->all()['commune']), FILTER_SANITIZE_SPECIAL_CHARS) : $commune = null;
            ($request->query->all()['codePostal'])!== "" ? $codePostal = filter_var(($request->query->all()['codePostal']), FILTER_SANITIZE_NUMBER_INT) : $codePostal = null;

            $repositoryPrestataires = $entityManager->getRepository(Prestataire::class);
            $partenaires = $repositoryPrestataires->SearchBar($nom, $categorie, $localite, $codePostal, $commune);
            
            $pagination = $paginator->paginate(
                $partenaires,
                $request->query->getInt('page', 1), //numéro de page
                5 // Définition de la limite d'items par page
            );

            // envoi les données reçues par la DB à la vue liste de prestataires
            return $this->render('partenaire/liste.html.twig', [
                'pagination' => $pagination,
                'partenaires' => $partenaires,
            ]);
        }


        $repositoryCategorie = $entityManager->getRepository(CategorieService::class);
        $repositoryPrestataires = $entityManager->getRepository(Prestataire::class);
        // Récupère le service qui a le champ en avant = 1
        // n'en affiche qu'un seul meme si d'autres ont le statut 'en avant')
        $highlightService = $repositoryCategorie->findOneBy(['enAvant' => 1]);
        // Récupère les derniers prestataires depuis l'ID le plus grand, max 4 resultats
        $lastPrestataires = $repositoryPrestataires->lastRegisteredPrestataires();

        return $this->render('home/index.html.twig', [
            "highlightService" => $highlightService,
            "lastPrestataires" => $lastPrestataires,
        ]);
    }
}