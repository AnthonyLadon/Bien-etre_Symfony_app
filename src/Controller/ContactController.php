<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{

    // ----------------------------------------------------------------
    // Afficher page contact
    // ----------------------------------------------------------------
    /**
     * @Route("/contact",name="contact")
     */
    public function index(): Response
    {

        return $this->render('contact/index.html.twig', [
        ]);
        
    }
}
