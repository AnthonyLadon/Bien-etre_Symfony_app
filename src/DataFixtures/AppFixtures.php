<?php

namespace App\DataFixtures;

use App\Entity\CategorieService;
use App\Entity\Internaute;
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

        $manager->flush();
    }
}
