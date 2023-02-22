<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginSecurityController extends AbstractController
{

    // priority = 1 place la route en tete des routes (executée en 1ére) et donc evite
    // d'etre confondue avec un slug ou autre
    /**
     * @Route("/login",name="security_login", priority=1)
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // redirige vers la page de profil si utilisateur dèjà connecté
        if ($this->getUser()) {
            return $this->render('profile/index.html.twig');
        }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }

    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(): void
    {
        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
