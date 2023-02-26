<?php

namespace App\Controller;

use App\Entity\Commentaire;
use App\Entity\Prestataire;
use App\Form\CommentaireType;
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
            8 /*limit par page*/
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
            //dd($utilisateur);
            $commentaire->setInternaute($utilisateur->getInternautes());


            $entityManager->persist($commentaire);
            $entityManager->flush();


            return $this->redirectToRoute('detailPartenaire',  [
                'id' => $partenaire->getId(),
            ]);
        }


        return $this->render('partenaire/detail.html.twig', [
            'partenaire' => $partenaire,
            'form' => $form->createView(),
        ]);
    }
    

}
