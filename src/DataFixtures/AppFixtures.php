<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\Stage;
use App\Entity\Localite;
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


        // liste des provinces et région de Belgique
        $provinces = array('région Bruxelles capitale',
        'province du hainaut',
        'province du brabant wallon',
        'province d\'anvers',
        'province de flandre occidentale',
        'province de flandre orientale',
        'province du brabant flamand',
        'province du brabant flamand (Louvain)',
        'province de liège',
        'province du luxembourg',
        'province du limbourg',
        'province de namur');
        $prinvincesLength = sizeof($provinces);

        for ($i = 0; $i < $prinvincesLength; $i++){
            $localite = new Localite();
            $localite->setLocalite($provinces[$i]);
            $manager->persist($localite);
        }

        $manager->flush();
    }
}


// Pour executer les fixtures ->
//-------------- php bin/console doctrine:fixtures:load ----------------------