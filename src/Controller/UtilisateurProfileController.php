<?php

namespace App\Controller;

use App\Entity\Images;
use App\Form\ImagesType;
use App\Entity\Internaute;
use App\Entity\Utilisateur;
use App\Form\InternauteType;
use App\Form\UtilisateurType;
use App\Services\UploaderHelper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UtilisateurProfileController extends AbstractController
{

    // ----------------------------------------------------------------
    // Gestion profil Utilisateur (Internaute)
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
    public function editAdress(Request $request,EntityManagerInterface $entityManager, Utilisateur $util): Response
    {
        $form = $this->createForm(UtilisateurType::class, $util);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          $util = $form->getData();
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
     public function editProfile(Request $request, Internaute $internaute, EntityManagerInterface $entityManager): Response
     {
        $form = $this->createForm(InternauteType::class, $internaute);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
          

          $internaute = $form->getData();
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
    // Ajouter/modifier la photo de profil de l'utilisateur (internaute)
    // ----------------------------------------------------------------
    /**
     * @Route("/ajout_image/{id}",name="addImageUser")
     */
    public function addImageUser(Request $request, Internaute $internaute, UploaderHelper $uploaderHelper, EntityManagerInterface $entityManager, $id): Response
    {

        $repository = $entityManager->getRepository(Internaute::class);
        $internaute = $repository->findOneById($id);
        // récupération image actuelle si elle existe
        $img_user = $entityManager->getRepository(Images::class)->findOneBy(['image_internaute' => $internaute]);

        $image = new Images();
        $form = $this->createForm(ImagesType::class, $image);
        $form->handleRequest($request);


         if ($form->isSubmitted() && $form->isValid()) {

          $uploadedImage = $form['imageFile']->getData();

          // if ($uplodedImage) -> évite de supprimer l'image si formulaire ne renvoit rien
          if ($img_user && $uploadedImage){
            // Suppression de l'image en base de données
            $query = $entityManager->createQuery('DELETE FROM App\Entity\Images i WHERE i.image_internaute = :id')
            ->setParameter('id', $internaute->getId());
            $query->execute();

            // suppression du fichier dans le dossier uploads
            $imgToDelete = $uploaderHelper->getUploadPath().'/'.$img_user;
            unlink($imgToDelete);
          }


          if($uploadedImage){
            $newImageName = $uploaderHelper->uploadImages($uploadedImage);
            $image->setImage($newImageName);
            $image->setImageInternaute($internaute);
          }

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
}
