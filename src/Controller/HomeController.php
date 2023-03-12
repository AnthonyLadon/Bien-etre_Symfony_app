<?php

namespace App\Controller;


use App\Entity\Prestataire;
use App\Entity\CategorieService;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{

    // ----------------------------------------------------------------
    // Afficher page home -> formulaire de recherche de prestataires, 
    // derniers prestataires inscrits et le service à la une
    // ----------------------------------------------------------------
    /**
     * @Route("/",name="home")
     */

    public function homeAndSearchForm(EntityManagerInterface $entityManager ,Request $request, PaginatorInterface $paginator){


        if (isset($_GET['submit'])){
            // Récupération des données envoyées en GET par le formulaire html
            // Les données sont filtrées par sécurité
            ($request->query->all()['nom'])!== "" ? $nom = filter_var(($request->query->all()['nom']), FILTER_SANITIZE_SPECIAL_CHARS) : $nom = null;
            ($request->query->all()['categorie'])!== "" ? $categorie = filter_var(($request->query->all()['categorie']), FILTER_SANITIZE_SPECIAL_CHARS) : $categorie = null;
            ($request->query->all()['localite'])!== "" ? $localite = filter_var(($request->query->all()['localite']), FILTER_SANITIZE_SPECIAL_CHARS) : $localite = null;
            ($request->query->all()['commune'])!== "" ? $commune = filter_var(($request->query->all()['commune']), FILTER_SANITIZE_SPECIAL_CHARS) : $commune = null;
            ($request->query->all()['codePostal'])!== "" ? $codePostal = filter_var(($request->query->all()['codePostal']), FILTER_SANITIZE_NUMBER_INT) : $codePostal = null;
            dump($nom, $categorie, $localite, $commune, $codePostal);

            $repositoryPrestataires = $entityManager->getRepository(Prestataire::class);
            $partenaires = $repositoryPrestataires->SearchBar($nom, $categorie, $localite, $codePostal, $commune);
            dump($partenaires);
            
            $pagination = $paginator->paginate(
                $partenaires, /* query NOT result */
                $request->query->getInt('page', 1), /*page number*/
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
        // Permet de récupérer le service qui a le champ en avant = 1 (et de s'assurer d'en récupérer qu'un seul
        // meme si d'autres on le statut 'en avant')
        $highlightService = $repositoryCategorie->findOneBy(['enAvant' => 1]);
        // Récupère les derniers prestataires à partir du plus grand ID et limite à 4 resultats
        $lastPrestataires = $repositoryPrestataires->lastRegisteredPrestataires();

        return $this->render('home/index.html.twig', [
            "highlightService" => $highlightService,
            "lastPrestataires" => $lastPrestataires,
        ]);
    }

}
