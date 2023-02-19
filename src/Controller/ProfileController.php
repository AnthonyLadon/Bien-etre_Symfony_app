<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProfileController extends AbstractController
{
    //------------------------------------------------------------------
    //j'ai défini le contrôle d'accés dans config/packages/security.yaml
    //
    //  - { path: ^/admin, roles: ROLE_ADMIN }
    //  - { path: ^/profil, roles: ROLE_USER }
    //  - { path: ^/editer_profil, roles: ROLE_USER }
    //------------------------------------------------------------------
    
    /**
     * @Route("/profil",name="profil_user")
     */
    public function index(): Response
    {
        return $this->render('profile/index.html.twig', [
        ]);
    }

    /**
     * @Route("/editer_profil/{id}",name="edit_profile")
     */
    public function editProfile(Request $request, Utilisateur $util): Response
    {
        $form = $this->createForm(UtilisateurType::class, $util);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $util = $form->getData();
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($util);
          $entityManager->flush();
    
          return $this->redirectToRoute('profil_user', [
          ]);
        }
        return $this->render('profile/editProfile.html.twig', [
            'formProfile' => $form->createView(),
            ]);
    }
}
