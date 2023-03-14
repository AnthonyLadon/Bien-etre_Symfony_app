<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Entity\Images;
use App\Form\PromoType;
use App\Form\StageType;
use App\Form\ImagesType;
use App\Entity\Promotion;
use App\Entity\Prestataire;
use App\Entity\Utilisateur;
use App\Form\UtilisateurType;
use App\Services\UploaderHelper;
use App\Form\PrestataireRegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



class ProfileController extends AbstractController
{


    // ----------------------------------------------------------------
    // Gestion profil prestataire
    // ----------------------------------------------------------------
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

        return $this->render('profil_prestataire/index.html.twig', [
          'partenaire' => $partenaire,
        ]);
    }


    // ----------------------------------------------------------------
    // Modifier les infos profil prestataire
    // ----------------------------------------------------------------
     /**
     * @Route("/profil_prestataire/updateInfos/{id}", name="update_infos_prest")
     */
    public function updatePrest(EntityManagerInterface $entityManager, $id, Request $request): Response
    {
      $repository = $entityManager->getRepository(Prestataire::class);
      $prestataire = $repository->find($id);

      $form = $this->createForm(PrestataireRegisterType::class, $prestataire);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

        $form = $form->getData();
        $proposer = $form->getProposer();

        // boucle pour charger les différentes catégories selectionnées dans le formulaire
        foreach($proposer as $p){
          $prestataire->addProposer($p);
          $entityManager->persist($prestataire);
        }

        $entityManager->persist($prestataire);
        $entityManager->flush();

        $this->addFlash('success', 'Vos catégories ont bien été mises à jour');

      return $this->redirectToRoute('profil_prest', [
        'id'=> $id
        ]);
      }

        return $this->render('profil_prestataire/updateInfos.html.twig', [
          'partenaire' => $prestataire,
          'form' => $form->createView(),
        ]);
    }


    // ----------------------------------------------------------------
    // Ajouter une promotion (profil Prestataire)
    // ----------------------------------------------------------------
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

        return $this->render('profil_prestataire/addPromo.html.twig', [
          'partenaire' => $partenaire,
          'form' => $form->createView()
        ]);
    }


    // ----------------------------------------------------------------
    // Ajouter un stage (profil Prestataire)
    // ----------------------------------------------------------------
     /**
     * @Route("/profil_prestataire/stage/{id}", name="profil_prest_stage")
     */
    public function prestAddStage(EntityManagerInterface $entityManager, $id, Request $request): Response
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

        return $this->render('profil_prestataire/addStage.html.twig', [
          'partenaire' => $partenaire,
          'form' => $form->createView()
        ]);
    }



    // ----------------------------------------------------------------
    // Ajouter/modifier la photo de profil de Prestataire
    // ----------------------------------------------------------------
    /**
     * @Route("/profil_prestataire/ajout_logo/{id}",name="addImagePrest")
     */
    public function addImagePrest(Request $request, Prestataire $prestataire, UploaderHelper $uploaderHelper, EntityManagerInterface $entityManager, $id): Response
    {

        $repository = $entityManager->getRepository(Prestataire::class);
        $prestataire = $repository->findOneById($id);
        // récupération image actuelle si elle existe
        $img_prest = $entityManager->getRepository(Images::class)->findOneBy(['images_Logo' => $prestataire]);

        $image = new Images();
        $form = $this->createForm(ImagesType::class, $image);
        $form->handleRequest($request);


         if ($form->isSubmitted() && $form->isValid()) {

          $uploadedImage = $form['imageFile']->getData();

          if ($img_prest && $uploadedImage){
            // Suppression de l'image en base de données
            $query = $entityManager->createQuery('DELETE FROM App\Entity\Images i WHERE i.images_Logo = :id')
            ->setParameter('id', $prestataire->getId());
            $query->execute();

            // suppression du fichier dans le dossier uploads
            $imgToDelete = $uploaderHelper->getUploadPath().'/'.$img_prest;
            unlink($imgToDelete);
          }

           // évite de supprimer l'image si formulaire est envoyé vide
          if($uploadedImage){
            $newImageName = $uploaderHelper->uploadImages($uploadedImage);
            $image->setImage($newImageName);
            $image->setImagesLogo($prestataire);
            $entityManager->persist($image);
            $entityManager->flush();
 
            $this->addFlash('success', 'Votre image a bien été enregistré');

            return $this->redirectToRoute('profil_prest', [
              "id" => $id
          ]);
          }

           $this->addFlash('notice', "L'image n'est pas valide");
         }

       return $this->render('profil_prestataire/addImage.html.twig', [
        'form' => $form->createView(),
        'id' => $id
     ]);
    }



    // ----------------------------------------------------------------
    // Ajouter des photos au carrousel profil de Prestataire
    // ----------------------------------------------------------------
    /**
     * @Route("profil_prestataire/images/{id}",name="imagesPrest")
     */
    public function crudImagesPrest(Request $request, Prestataire $prestataire, UploaderHelper $uploaderHelper, EntityManagerInterface $entityManager, $id): Response
    {

        $repository = $entityManager->getRepository(Prestataire::class);
        $prestataire = $repository->findOneById($id);

        $image = new Images();
        $form = $this->createForm(ImagesType::class, $image);
        $form->handleRequest($request);


         if ($form->isSubmitted() && $form->isValid()) {

          $uploadedImage = $form['imageFile']->getData();

          if($uploadedImage){
            $newImageName = $uploaderHelper->uploadImages($uploadedImage);
            $image->setImage($newImageName);
            $image->setImagesPhoto($prestataire);
          }

          if ($image->getImage() != null ){
            $entityManager->persist($image);
            $entityManager->flush();
            $this->addFlash('success', 'Votre image a bien été enregistré');

            return $this->redirectToRoute('profil_prest', [
              "id" => $id
          ]);
          }
          
          $this->addFlash('notice', 'Votre image n\'est pas valide');
         }

       return $this->render('profil_prestataire/imagesCarrousel.html.twig', [
        'form' => $form->createView(),
        'id' => $id,
        "prestataire" => $prestataire
     ]);
    }


    // ----------------------------------------------------------------
    // supprimer une photo du carrousel profil de Prestataire
    // ----------------------------------------------------------------
    /**
     * @Route("profil_prestataire/suprimer_img/{id}/{id_img}",name="supprImagePrest")
     */
    public function supprImagesPrest(Prestataire $prestataire, UploaderHelper $uploaderHelper, EntityManagerInterface $entityManager, $id, $id_img): Response
    {

      // On récupére l'id du prestataire et celui de l'image passés en parametre depus le lien
        $repository = $entityManager->getRepository(Prestataire::class);
        $prestataire = $repository->findOneById($id);
        // récupération de l'image
        $img_carrousel_prest = $entityManager->getRepository(Images::class)->findOneBy(['id' =>  $id_img]);

        // Suppression de l'image en base de données
        $query = $entityManager->createQuery('DELETE FROM App\Entity\Images i WHERE i.id = :id')
        ->setParameter('id', $id_img);
        $query->execute();

        // suppression du fichier dans le dossier uploads
        $imgToDelete = $uploaderHelper->getUploadPath().'/'.$img_carrousel_prest;
        unlink($imgToDelete);

           $entityManager->flush();

           $this->addFlash('success', 'Votre image a bien été supprimé');

           return $this->redirectToRoute('imagesPrest', [
                "id" => $id,
                "prestataire" => $prestataire
            ]);
       }



    // ----------------------------------------------------------------
    // Modifier l'adresse du Prestataire
    // ----------------------------------------------------------------
    /**
     * @Route("profil_prestataire/adresse/{id}",name="updateAdress")
     */
    public function updateAdress(EntityManagerInterface $entityManager, Request $request, $id): Response
    {

      $repository = $entityManager->getRepository(Utilisateur::class);
      $utilisateur = $repository->find($id);

      $form = $this->createForm(UtilisateurType::class, $utilisateur);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
      $form = $form->getData();

      $entityManager->persist($utilisateur);
      $entityManager->flush();

      $this->addFlash('success', 'Votre adresse a été mise à jour');

      $id_prest = $utilisateur->getPrestataire()->getId();
      return $this->redirectToRoute('profil_prest', [
        'id'=> $id_prest
        ]);
      }
          return $this->render('profil_prestataire/updateAdress.html.twig', [
            'id' => $id,
            'form' => $form->createView(),
          ]); 
    }
}