<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginSecurityController extends AbstractController
{
    // ----------------------------------------------------------------
    // Controller LOGIN
    // priority = 1 place la route en tete des routes (executée en 1ére) et donc evite
    // d'etre confondue avec un slug ou autre
    // ----------------------------------------------------------------
    /**
     * @Route("/login",name="security_login", priority=1)
     */
    public function login(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager): Response
    {
        
        if ($this->getUser()) {

        // récupèration des rôles de l'utilisateur
        $roles = $this->getUser()->getRoles();

        // redirige vers la page de prestataire s'il s'agit d'un prestataire connecté
        if (in_array('ROLE_PREST', $roles)){
            return $this->render('profil_prestataire/index.html.twig');
        }
    }

        // dernier email entré par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();

        // Gestion des tentatives de connection infructueuses
        $error = $authenticationUtils->getLastAuthenticationError();
        if($error){
            $user = $entityManager->getRepository(Utilisateur::class)->findOneBy(['email' => $lastUsername]);
            // incrémentation dans la DB du nombre de tentatives de connections infructueuses
            $user->setNbEssais($user->getNbEssais() + 1);
            $entityManager->persist($user);
            // passe isBanni à TRUE dans la DB si l'utilisateur a fait plus de 3 tentatives infructueuses
            if($user->getNbEssais() >= 3) {
                $user->setBanni(1);
                $entityManager->persist($user);
                $this->addFlash('notice', 'Votre compte est bloqué. Veuillez contacter l\'administrateur du site.');
            }
            $entityManager->flush();
        }

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    // ----------------------------------------------------------------
    // LOGOUT
    // ----------------------------------------------------------------
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
