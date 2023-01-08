<?php

namespace App\DataFixtures;

use App\Entity\CategorieService;
use App\Entity\Internaute;
use App\Entity\Stage;
use Faker\Factory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class AppFixtures extends Fixture
{


    // Fixtures via Faker

    public function load(ObjectManager $manager): void
    {

        $faker = Factory::create('fr_BE');

        // Creation des catégories de services
        for ($i = 0; $i < 20; $i++) {
            $service = new CategorieService();
            $service->setNom($faker->jobTitle);
            $service->setDescription($faker->sentence);
            $service->setEnAvant(0);
            $service->setValide(1);
            $manager->persist($service);
        };

        // creation des internautes
        for ($i = 0; $i < 20; $i++) {
            $internaute = new Internaute();
            $internaute->setPrenom($faker->firstName);
            $internaute->setNom($faker->lastName);
            $internaute->setNewsletter(0);
            $manager->persist($internaute);
        };

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
        //     $stage->setPrestataire(1);

        //     $manager->persist($stage);
        // };

        $manager->flush();
    }
}


// Pour executer les fixtures ->
//-------------- php bin/console doctrine:fixtures:load ----------------------