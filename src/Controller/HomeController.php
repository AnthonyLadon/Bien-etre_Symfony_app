<?php

namespace App\Controller;

use PDO;
use Exception;
use App\Entity\Commune;
use App\Entity\Localite;
use App\Entity\CodePostal;
use App\Entity\Prestataire;
use App\Entity\CategorieService;
use App\Form\PrestataireSearchType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomeController extends AbstractController
{
    /**
     * @Route("/",name="home")
     */

    public function homeAndSearchForm(EntityManagerInterface $entityManager ,Request $request, PaginatorInterface $paginator){

        // creation du formulaire
        $form = $this->createForm(PrestataireSearchType::class, null, [
            'method' => 'GET',
            // retire le token de l'url généré (GET)
            'csrf_protection' => false
        ]);

        //dd($form);
        $formView = $form->createView();
        //dd($formView);


        $form->handleRequest($request);
        //dd($request);

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
                'pagination' => $pagination,
                'partenaires' => $partenaires,
                'form' => $formView,
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
