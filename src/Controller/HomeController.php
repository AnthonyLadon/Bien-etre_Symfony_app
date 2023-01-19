<?php

namespace App\Controller;

use App\Entity\Prestataire;
use App\Entity\CategorieService;
use App\Form\PrestataireSearchType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController
{
    /**
     * @Route("/",name="home")
     */

    public function index(EntityManagerInterface $entityManager ,Request $request){

        $form = $this->createForm(PrestataireSearchType::class);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $form->getData(); // holds the submitted values
            // but, the original `$prestataires` variable has also been updated

            return $this->redirectToRoute('listePrestataires');
        }
        
        $repository = $entityManager->getRepository(CategorieService::class);
        $repository2 = $entityManager->getRepository(Prestataire::class);
        // Permet de récupérer la liste des services en avant (limité a 1 résultat)
        $highlightServices = $repository->findHighlightService();
        // Récupère les prestataires a rangés a partir du plus grand ID et limite a 4 resultats
        $lastPrestataires = $repository2->findLastPrestataires();

        return $this->render('home/index.html.twig', [
            "highlightServices" => $highlightServices,
            "lastPrestataires" => $lastPrestataires,
            'form' => $form->createView()
        ]);
    }


    // public function prestataireSearch(Request $request): Response
    // {

    //     $form = $this->createForm(PrestataireSearchType::class);

    //     $form->handleRequest($request);
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $form->getData(); // holds the submitted values
    //         // but, the original `$prestataires` variable has also been updated

    //         return $this->redirectToRoute('listePrestataires');
    //     }

    //     return $this->render('home/index.html.twig', [
    //         'form' => $form->createView()
    //     ]);
    // }
}