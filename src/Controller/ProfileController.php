<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profil",name="profil_user")
     */

    //Le contrôle d'accés est défini dans config/packages/security.yaml
    //
    //  access_control:
    //  - { path: ^/admin, roles: ROLE_ADMIN }
    //  - { path: ^/profil, roles: ROLE_USER }
    //  - { path: ^/editer_profil, roles: ROLE_USER }

    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
        ]);
    }

    /**
     * @Route("/editer_profil",name="edit_profile")
     */
    public function editProfile(): Response
    {
        return $this->render('profile/editProfile.html.twig', [
            ]);
    }
}
