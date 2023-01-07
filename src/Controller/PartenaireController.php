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



    /**
     * @Route("article/ajout")
     */

    // public function new(EntityManagerInterface $entityManager): Response
    // {

    //     $faker = Factory::create();
    //     $article = new Article;
    //     $article->setTitre($faker->title);
    //     $article->setContenu($faker->text($maxNbChars = 200));
    //     $article->setDate($faker->dateTimeBetween($startDate = '-5 years', $endDate = 'now', $timezone = "Europe/Paris"));

    // $article->setTitre('Mon article 1');
    // $article->setContenu('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
    // $article->setDate(new DateTime("2015-03-14 00:00"));

    // $article = new Article();
    // $article->setTitre('consectetur adipiscing');
    // $article->setContenu('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut magique labore et dolore magna. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
    // $article->setDate(new DateTime("2018-01-01 00:00"));

    // $article = new Article();
    // $article->setTitre('Labore et dolore');
    // $article->setContenu('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.');
    // $article->setDate(new DateTime("2021-01-01 00:00"));

    // $entityManager->persist($article);
    // $entityManager->flush();

    // Pour effacer:
    // $entityManager->remove($article);
    // $entityManager->flush();

    //     return new Response("Article bien envoyé en base de donnée");
    // }
}
