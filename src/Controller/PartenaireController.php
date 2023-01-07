<?php

namespace App\Controller;

use App\Entity\Prestataire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PartenaireController extends AbstractController
{
    /**
     * @Route("/partenaires",name="listePartenaires")
     */
    public function Partenaires(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Prestataire::class);
        $partenaires = $repository->findAll();

        return $this->render('partenaire/liste.html.twig', [
            "partenaires" => $partenaires,
        ]);
    }
}
