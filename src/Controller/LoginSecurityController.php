<?php

namespace App\Controller;

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
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        
        if ($this->getUser()){

        $roles = $this->getUser()->getRoles();

        // redirige vers la page de prestataire s'il s'agit d'un prestataire connecté
        if (in_array('ROLE_PREST', $roles)){
            return $this->render('profil_prestataire/index.html.twig');
        }else{
            // ou alors page profil utilisateur si user connecté
            return $this->render('profil_utilisateur/index.html.twig');
        }
    }

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

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
