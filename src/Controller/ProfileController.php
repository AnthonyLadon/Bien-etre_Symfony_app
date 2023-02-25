<?php

namespace App\Controller;

use App\Entity\Internaute;
use App\Entity\Prestataire;
use App\Entity\Utilisateur;
use App\Form\InternauteType;
use App\Form\UtilisateurType;
use App\Form\PrestataireRegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ProfileController extends AbstractController
{
    //------------------------------------------------------------------
    //j'ai défini le contrôle d'accés dans config/packages/security.yaml
    // 
    // access_control:
    // - { path: ^/admin, roles: ROLE_ADMIN }
    // - { path: ^/profil, roles: ROLE_USER }
    // - { path: ^/editer_profil, roles: ROLE_USER }
    // - { path: ^/editer_adresse, roles: ROLE_USER }
    // - { path: ^/editer_infos, roles: ROLE_USER }
    //------------------------------------------------------------------
    /**
     * @Route("/profil/{id}",name="profil_user")
     */
    public function showUser(): Response
    {
        return $this->render('profil_utilisateur/index.html.twig', [
        ]);
    }


    // ----------------------------------------------------------------
    // Modifier l'adresse de l'utilisateur (entitée utilisateur)
    // ----------------------------------------------------------------
    /**
     * @Route("/editer_adresse/{id}",name="edit_adress")
     */
    public function editAdress(Request $request, Utilisateur $util): Response
    {
        $form = $this->createForm(UtilisateurType::class, $util);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $util = $form->getData();
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($util);
          $entityManager->flush();
    
          return $this->render('profil_utilisateur/index.html.twig', [
          ]);
        }
        return $this->render('profil_utilisateur/editAdress.html.twig', [
            'formProfile' => $form->createView(),
            ]);
    }

    // ----------------------------------------------------------------
    // Modifier les informations de l'utilisateur (internaute)
    // ----------------------------------------------------------------
    /**
     * @Route("/editer_infos/{id}",name="edit_infos")
     */
     public function editProfile(Request $request, Internaute $internaute): Response
     {
        $form = $this->createForm(InternauteType::class, $internaute);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $internaute = $form->getData();
          $entityManager = $this->getDoctrine()->getManager();
          $entityManager->persist($internaute);
          $entityManager->flush();
    
          return $this->render('profil_utilisateur/index.html.twig', [
          ]);
        }
        return $this->render('profil_utilisateur/editInfos.html.twig', [
          'form' => $form->createView(),
      ]);
     }


    // ----------------------------------------------------------------
    // Inscription en tant que prestataire
    // ----------------------------------------------------------------
     /**
     * @Route("/inscription_prestataire/{id}",name="prestataire_register")
     */

     public function register(Request $request, EntityManagerInterface $entityManager, $id)
     {
        $repository = $entityManager->getRepository(Utilisateur::class);
        $utilisateur = $repository->find($id);

        $prestataire = new Prestataire();
        $form = $this->createForm(PrestataireRegisterType::class, $prestataire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

          $form = $form->getData();
          $nom = $form->getNom();
          $website = $form->getSiteWeb();
          $tel = $form->getTel();
          $tva = $form->getTvaNum();
          

          $prestataire = new Prestataire();
          $prestataire->setUtilisateur($utilisateur);
          $prestataire->setNom($nom);
          $prestataire->setSiteWeb($website);
          $prestataire->setTel($tel);
          $prestataire->setTvaNum($tva);

          $utilisateur->setRoles(["ROLE_USER", "ROLE_PREST"]);
          $utilisateur->setTypeUtilisateur('prestataire');

          $entityManager->persist($utilisateur);
          $entityManager->persist($prestataire);
          $entityManager->flush();


      return $this->redirectToRoute('security_login', [
        
      ]);
    }

    return $this->render('partenaire/inscription.html.twig', [
      'PrestataireForm' => $form->createView()
    ]);
  }


    // ----------------------------------------------------------------
    // Afficher profil prestataire
    // ----------------------------------------------------------------

     /**
     * @Route("/profil_prestataire/{id}",name="profil_prest")
     */
    public function showPrest(): Response
    {
        return $this->render('profil_prestataire/index.html.twig', [
        ]);
    }


}