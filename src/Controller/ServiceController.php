<?php

namespace App\Controller;

use App\Entity\Images;
use App\Form\ImagesType;
use App\Entity\Prestataire;
use App\Entity\CategorieService;
use App\Services\UploaderHelper;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServiceController extends AbstractController
{


    // ----------------------------------------------------------------
    // Affichage liste des services
    // ----------------------------------------------------------------
    /**
     * @Route("/services",name="listeServices")
     */
    public function listeCategoriesService(EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator): Response
    {

        // récupération de la liste de toutes les catégories présentes dans la DB
        $repository = $entityManager->getRepository(CategorieService::class);
        $categories = $repository->findAll();

        // Utilise le bundle de pagination => https://github.com/KnpLabs/KnpPaginatorBundle
        $pagination = $paginator->paginate(
            $categories, /* query NOT result */
            $request->query->getInt('page', 1), /*page number*/
            8 /*limit par page*/
        );

        return $this->render('service/liste.html.twig', [
            "categories" => $categories,
            "pagination" => $pagination
        ]);
    }

    

    // ----------------------------------------------------------------
    // Affichage detail d'un Service
    // ----------------------------------------------------------------
    /**
     * @Route("services/detail/{id}", name="detailService")
     */

    public function detailcategorieService($id, EntityManagerInterface $entityManager, Request $request, PaginatorInterface $paginator)
    {

        // trouve le detail catégorie
        $repository = $entityManager->getRepository(CategorieService::class);
        $categorie = $repository->find($id);

        // récupére les 4 derniers presatataires inscrits dans cette catégorie
        $repository = $entityManager->getRepository(Prestataire::class);
        $lastPrestataires = $repository->lastPrestatairesCategory($id);

        return $this->render(
            'service/detail.html.twig',
            [
                'categorie' => $categorie,
                'lastPrestataires' => $lastPrestataires,
            ]
        );
    }


    // ----------------------------------------------------------------
    // Si ROLE_ADMIN -> Ajouter/modifier la photo de la catégorie
    // ----------------------------------------------------------------
    /**
     * @Route("/admin/categorie/image/{id}",name="categorie_img")
     */
    public function addImagePrest(Request $request, CategorieService $categorie, UploaderHelper $uploaderHelper, EntityManagerInterface $entityManager, $id): Response
    {
        $repository = $entityManager->getRepository(CategorieService::class);
        $categorie = $repository->findOneById($id);
        // récupération image actuelle si elle existe
        $img_categ = null;
        if($categorie->getImage()){
            $img_categ = $categorie->getImage()->getCategorieService()->getImage();
        }

        $image = new Images();
        $form = $this->createForm(ImagesType::class, $image);
        $form->handleRequest($request);


         if ($form->isSubmitted() && $form->isValid()) {

          $uploadedImage = $form['imageFile']->getData();

          if ($img_categ && $uploadedImage){
            // Suppression de l'image en base de données
            $query = $entityManager->createQuery('DELETE FROM App\Entity\CategorieService i WHERE i.image = :id')
            ->setParameter('id', $categorie->getId());
            $query->execute();

            // suppression du fichier dans le dossier uploads
            $imgToDelete = $uploaderHelper->getUploadPath().'/'.$img_categ;
            unlink($imgToDelete);
          }

           // évite de supprimer l'image si le formulaire est envoyé vide
          if($uploadedImage){
            $newImageName = $uploaderHelper->uploadImages($uploadedImage);
            $image->setImage($newImageName);
            $image->setCategorieService($categorie);
            $entityManager->persist($image);
            $entityManager->flush();
 
            $this->addFlash('success', 'Votre image a bien été enregistré');

            return $this->redirectToRoute('detailService', [
              "id" => $id
          ]);
          }

           $this->addFlash('notice', "L'image n'est pas valide");
         }

       return $this->render('service/admin_photo.html.twig', [
        'form' => $form->createView(),
        'id' => $id
     ]);
    }
}
