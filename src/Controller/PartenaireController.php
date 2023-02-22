<?php

namespace App\Controller;

use App\Entity\Prestataire;
use Doctrine\DBAL\Types\TextType;
use App\Form\PrestataireSearchType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormBuilderInterface;
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

    // Affichage detail d'un Prestataire

    /**
     * @Route("partenaires/detail/{id}", name="detailPartenaire")
     */

    public function detailPrestataire($id, EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator)
    {

        $repository = $entityManager->getRepository(Prestataire::class);
        $partenaire = $repository->find($id);

        return $this->render('partenaire/detail.html.twig', [
            'partenaire' => $partenaire,
        ]);
    }
}
