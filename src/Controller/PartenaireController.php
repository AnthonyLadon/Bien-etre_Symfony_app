<?php

namespace App\Controller;

use App\Entity\Prestataire;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class PartenaireController extends AbstractController
{
    /**
     * @Route("/partenaires",name="listePartenaires")
     */
    public function Partenaires(EntityManagerInterface $entityManager): Response
    {
        $repository = $entityManager->getRepository(Prestataire::class);
        $partenaires = $repository->findAll();

        return $this->render('partenaire/liste.html.twig', [
            "partenaires" => $partenaires,
        ]);
    }




    //! Faire la route pour afficher le Detail du presataire choisi (ID)

    // /**
    //  * @Route("article/detail/{id}", name="afficher_article")
    //  */

    //  public function detailArticles($id, EntityManagerInterface $entityManager)
    //  {
    //      $repository = $entityManager->getRepository(Article::class);
    //      // Pour utiliser ma requete DQL personnalisée:
    //      // $repository2 = $entityManager->getRepository(Categorie::class);

    //      $article = $repository->find($id);
    //      // $categorie = $repository2->findCategByArticleId($id);

    //      return $this->render(
    //          'article/detail.html.twig',
    //          [
    //              'article' => $article,
    //              // 'categ' => $categorie
    //          ]
    //      );
    //  }


    // /**
    //  * @Route("/partenaires",name="listePartenaires")
    //  */
    // public function PartenaireDetail(EntityManagerInterface $entityManager): Response
    // {
    //     $repository = $entityManager->getRepository(Prestataire::class);
    //     $partenaires = $repository->findAll();

    //     return $this->render('partenaire/detail.html.twig', [
    //         "partenaires" => $partenaires,
    //     ]);
    // }
}
