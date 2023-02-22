<?php

namespace App\Controller;

use App\Entity\Prestataire;
use App\Form\PrestataireSearchType;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AproposController extends AbstractController
{
    /**
     * @Route("/apropos",name="aPropos")
     */
    public function index(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {

        return $this->render('apropos/index.html.twig', [
        ]);

    }
}
