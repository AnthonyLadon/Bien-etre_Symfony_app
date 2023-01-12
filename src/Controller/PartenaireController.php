<?php

namespace App\Controller;

use App\Entity\Prestataire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PartenaireController extends AbstractController
{
    // Affichage de tous les Prestataires

    /**
     * @Route("/partenaires",name="listePartenaires")
     */
    public function Partenaires(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Prestataire::class);
        $partenaires = $repository->findAll();

        return $this->render('partenaire/liste.html.twig', [
            'partenaires' => $partenaires,
        ]);
    }

    // Affichage detail d'un Prestataire

    /**
     * @Route("partenaires/detail/{id}", name="detailPartenaire")
     */

    public function detailArticles($id, EntityManagerInterface $entityManager)
    {
        $repository = $entityManager->getRepository(Prestataire::class);
        $partenaire = $repository->find($id);

        return $this->render('partenaire/detail.html.twig', [
            'partenaire' => $partenaire,
        ]);
    }
}
