<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Stage;
use App\Entity\Localite;
use App\Entity\Internaute;
use App\Entity\Prestataire;
use App\Entity\Utilisateur;
use App\Entity\CategorieService;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{


    // Fixtures via Faker

    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_BE');

        // Creation des catégories de services
        for ($i = 0; $i < 15; $i++) {
            $service = new CategorieService();
            $service->setNom($faker->jobTitle);
            $service->setDescription($faker->paragraph);
            $service->setEnAvant(0);
            $service->setValide(1);
            $manager->persist($service);
        };



        // creation des internautes
        for ($i = 0; $i < 40; $i++) {
            $internaute = new Internaute();
            $internaute->setPrenom($faker->firstName);
            $internaute->setNom($faker->lastName);
            $internaute->setNewsletter(0);
            $manager->persist($internaute);
        };


        for ($i = 0; $i < 20; $i++){
            $localite = new Localite();
            $localite->setLocalite('Liege');
            $manager->persist($localite);
        }


        for ($i = 0; $i < 20; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setConfirmationInscription(1);
            $utilisateur->setEmail($faker->email());
            $utilisateur->setPassword('fsdfsdfdsfds');
            $utilisateur->setDateInscription($faker->dateTime());
            $utilisateur->setTypeUtilisateur("Utilisateur");
            $utilisateur->setNbEssais(0);
            $utilisateur->setBanni(0);
            $utilisateur->setConfirmationInscription(1);
            $utilisateur->setLocalite($localite);
            // $utilisateur->setCodePostal();
            $manager->persist($utilisateur);
        };



        // Voir pour creer prestataires + récupéréer leur ID et l'injecter à la voléé
        // dans les stages

        // creation des Stages
        // for ($i = 0; $i < 20; $i++) {
        //     $stage = new Stage();
        //     $stage->setNom($faker->catchPhrase);
        //     $stage->setDescription($faker->sentence);
        //     $stage->setTarif($faker->randomNumber(3, true));
        //     $stage->setInfoComplementaire($faker->paragraph);
        //     $stage->setDebut($faker->dateTimeAD);
        //     $stage->setFin($faker->dateTime);
        //     $stage->setAffichageDe($faker->dateTimeAD);
        //     $stage->setAffichageJusque($faker->dateTime);
        //     $stage->setPrestataire();

        //     $manager->persist($stage);
        // };

        $manager->flush();
    }
}


// Pour executer les fixtures ->
//-------------- php bin/console doctrine:fixtures:load ----------------------