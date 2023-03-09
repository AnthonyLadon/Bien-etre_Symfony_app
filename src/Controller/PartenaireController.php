<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Prestataire;
use App\Entity\Utilisateur;
use App\Form\CommentaireType;
use OpenCage\Geocoder\Geocoder;
use App\Form\PrestataireRegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
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
    public function listePrestataires(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {

        $repository = $entityManager->getRepository(Prestataire::class);
        $partenaires = $repository->findAll();

        // Utilise le bundle de pagination => https://github.com/KnpLabs/KnpPaginatorBundle
        $pagination = $paginator->paginate(
            $partenaires, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            5 // Définition de la limite d'items par page
        );

        return $this->render('partenaire/liste.html.twig', [
            'partenaires' => $partenaires,
            'pagination' => $pagination
        ]);
    }

    // Affichage detail d'un Prestataire + commentaire (si authentifié en tant qu'User)

    /**
     * @Route("partenaires/detail/{id}", name="detailPartenaire")
     */

     // userInterface permet de récupérer l'utilisateur actuellemnt authentifié
    public function detailPrestataire($id, EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator)
    {

        $repository = $entityManager->getRepository(Prestataire::class);
        $partenaire = $repository->find($id);


      $rue = $partenaire->getUtilisateur()->getAdresseRue();
      $num = $partenaire->getUtilisateur()->getAdresseNum();
      $commune= $partenaire->getUtilisateur()->getCommune()->getCommune();
      $codePostal= $partenaire->getUtilisateur()->getCodePostal()->getCodePostal();
      $adresse= ($rue." ".$num." ".$codePostal." ".$commune);

        // Appel de l'API Geocoder opencagedata.com
        $geocoder = new Geocoder('b091b28cf9ff4f33acbedc0c90166f8c');
        // récupération des données de latitude et longitude
        $result = $geocoder->geocode($adresse);
        if(isset($result)){
            $lat = $result['results'][0]['geometry']['lat'];
            $lng = $result['results'][0]['geometry']['lng'];
        }else{
            $lat = null;
            $lng = null;
        }


        $commentaire = new Commentaire;
        $form = $this->createForm(CommentaireType::class, $commentaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $form = $form->getData();
            $commentaire->setTitre($form->getTitre());
            $commentaire->setContenu($form->getContenu());
            $commentaire->setDateEncodage(new \DateTime);
            $commentaire->setPrestataire($partenaire);
            $utilisateur = $partenaire->getUtilisateur();
            $commentaire->setInternaute($utilisateur->getInternautes());


            $entityManager->persist($commentaire);
            $entityManager->flush();

            $this->addFlash('success', 'Votre commentaire a bien été envoyé');


            return $this->redirectToRoute('detailPartenaire',  [
                'id' => $partenaire->getId(),
            ]);
        }


        return $this->render('partenaire/detail.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form->createView(),
            "lat" => $lat,
            "lng" => $lng,
        ]);
    }

}
