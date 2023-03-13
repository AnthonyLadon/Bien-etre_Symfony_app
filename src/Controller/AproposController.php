<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AproposController extends AbstractController
{

    // ----------------------------------------------------------------
    // Afficher page à propos
    // ----------------------------------------------------------------
    /**
     * @Route("/apropos",name="aPropos")
     */
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {

        return $this->render('apropos/index.html.twig', [
        ]);

    }

}
