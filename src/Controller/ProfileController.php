<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Entity\Images;
use App\Form\PromoType;
use App\Form\StageType;
use App\Form\ImagesType;
use App\Entity\Promotion;
use App\Entity\Internaute;
use App\Entity\Prestataire;
use App\Entity\Utilisateur;
use App\Form\InternauteType;
use App\Form\UtilisateurType;
use App\Form\PrestataireRegisterType;
use App\pictureService\pictureService;
use App\Services\UploaderHelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\ManagerRegistry;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserInterface;
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
    // Modifier l'adresse de l'internaute (entitée utilisateur)
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

          $this->addFlash('success', 'Votre adresse a bien été mise à jour');
    
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

          $this->addFlash('success', 'Vos informations ont bien été mises à jour');
    
          return $this->render('profil_utilisateur/index.html.twig', [
          ]);
        }
        return $this->render('profil_utilisateur/editInfos.html.twig', [
          'form' => $form->createView(),
      ]);
     }


    // ----------------------------------------------------------------
    // Modifier la photo de profil de l'utilisateur (internaute)
    // ----------------------------------------------------------------
    /**
     * @Route("/ajout_image/{id}",name="addImageUser")
     */
    public function addImage(Request $request, Internaute $internaute, UploaderHelper $uploaderHelper, EntityManagerInterface $entityManager, $id): Response
    {

        $repository = $entityManager->getRepository(Internaute::class);
        $internaute = $repository->findOneById($id);
        // récupération image actuelle si elle existe
        $img_user = $entityManager->getRepository(Images::class)->findOneBy(['image_internaute' => $internaute]);

        $image = new Images();
        $form = $this->createForm(ImagesType::class, $image);
        $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid()) {

          // Effacement de l'image en base de données + fichier -> dossier uploads
          // if ($img_user){
          //   $query = $entityManager->createQuery('DELETE FROM App\Entity\Images i WHERE i.image_internaute = :id')
          //   ->setParameter('id', $internaute->getId());
          //   $query->execute();

          //   //! $fileSystem = new FileSystem;
          //   //! $fileSystem->remove([$img_user, '/public/images/uploads']);
          // }

           $uploadedImage = $form['imageFile']->getData();

          if($uploadedImage){
            $newImageName = $uploaderHelper->uploadImages($uploadedImage);
            $image->setImage($newImageName);
            $image->setImageInternaute($internaute);
          }

           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->persist($image);
           $entityManager->flush();

           $this->addFlash('success', 'Votre image a bien été enregistré');

           return $this->redirectToRoute('profil_user', [
                "id" => $id
            ]);
         }

       return $this->render('profil_utilisateur/addImage.html.twig', [
        'form' => $form->createView(),
        'id' => $id
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
          $proposer = $form->getProposer();

          $prestataire = new Prestataire();
          $prestataire->setUtilisateur($utilisateur);
          // boucle pour charger les différentes catégories selectionnées dans le formualaire
          foreach($proposer as $p){
            $prestataire->addProposer($p);
            $entityManager->persist($prestataire);
          }

          $utilisateur->setRoles(["ROLE_PREST"]);
          $utilisateur->setTypeUtilisateur('prestataire');

          $entityManager->persist($utilisateur);
          $entityManager->persist($prestataire);
          $entityManager->flush();

          $this->addFlash('success', 'Vous venez d\'être enregistré en tant que prestataire');


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
     * @Route("/profil_prestataire/{id}", name="profil_prest")
     */
    public function showPrest(EntityManagerInterface $entityManager, $id, Request $request): Response
    {
      $repository = $entityManager->getRepository(Prestataire::class);
      $partenaire = $repository->find($id);

      $stage = new Stage();
      $form = $this->createForm(StageType::class, $stage);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

        $form = $form->getData();
        $stage->setPrestataire($partenaire);

        $entityManager->persist($stage);
        $entityManager->flush();


    return $this->redirectToRoute('profil_prest', [
      'id' => $partenaire->getId(),
    ]);
  }

        return $this->render('profil_prestataire/index.html.twig', [
          'partenaire' => $partenaire,
          'form' => $form->createView()
        ]);
    }



     /**
     * @Route("/profil_prestataire/promo/{id}", name="profil_prest_promo")
     */
    public function prestAddPromo(EntityManagerInterface $entityManager, $id, Request $request): Response
    {
      $repository = $entityManager->getRepository(Prestataire::class);
      $partenaire = $repository->find($id);

      $promo = new Promotion();
      $form = $this->createForm(PromoType::class, $promo);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

        $form = $form->getData();
        $promo->setPrestataire($partenaire);

        $entityManager->persist($promo);
        $entityManager->flush();


    return $this->redirectToRoute('profil_prest', [
      'id' => $partenaire->getId(),
    ]);
  }

        return $this->render('profil_prestataire/ajout_promo.html.twig', [
          'partenaire' => $partenaire,
          'form' => $form->createView()
        ]);
    }

}