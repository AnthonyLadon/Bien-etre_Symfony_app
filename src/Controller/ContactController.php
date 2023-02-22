<?php

namespace App\Controller;

use App\Entity\Prestataire;
use Symfony\Component\Mime\Email;
use App\Form\PrestataireSearchType;
use Symfony\Component\Mime\Address;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ContactController extends AbstractController
{

    private $mailer;

    public function __construct(MailerInterface $mailer){
        $this->mailer = $mailer;
    }

    
    /**
     * @Route("/contact",name="contact")
     */
    public function index(EntityManagerInterface $entityManager, Request $request): Response
    {

        return $this->render('contact/index.html.twig', [
        ]);
        
    }

    /**
     * @Route("/mail")
     */
    public function testMail()
    {
        $email = new TemplatedEmail();
        $email->from(new Address("from@example.com", "infos Bienêtre"))
        ->to("toto@toto.com")
        ->text("coucou ceci est un test")
        ->subject("test envoi de mail")
        ->html('<p>ça devrait marcher</p>');

        $this->mailer->send($email);

        return $this->render('insert/index.html.twig');
    }
}
