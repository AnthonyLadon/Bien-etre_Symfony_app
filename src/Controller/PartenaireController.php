<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PartenaireController extends AbstractController
{
    /**
     * @Route("/partenaires",name="listePartenaires")
     */
    public function index(): Response
    {
        return $this->render('partenaire/liste.html.twig', []);
    }
}
