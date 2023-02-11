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

        $admin = new Utilisateur();

        $admin->setEmail('admin@admin.be');
        $admin->setNomComplet("admin");
        $admin->setPassword('admin');
        $admin->setDateInscription($faker->dateTime());
        $admin->setTypeUtilisateur('admin');
        $admin->setNbEssais(0);
        $admin->setBanni(0);
        $admin->setConfirmationInscription(1);
        $admin->setLocalite($localite);
        $admin->setRoles(["ROLE_ADMIN"]);

        $manager->persist($admin);

        for ($i = 0; $i < 50; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setConfirmationInscription(1);
            $utilisateur->setEmail('user'.$i.'@gmail.com');
            $utilisateur->setNomComplet($faker->Name());
            $utilisateur->setPassword('password');
            $utilisateur->setRoles(['ROLE_USER']);
            $utilisateur->setLocalite($localite);
            $utilisateur->setDateInscription($faker->dateTime());
            $utilisateur->setNbEssais(0);
            $utilisateur->setBanni(0);
            $utilisateur->setConfirmationInscription(1);
            $utilisateur->setAdresseNum($faker->randomNumber(2, true));
            $utilisateur->setAdresseRue($faker->streetName() );
            $manager->persist($utilisateur);
        };


        //creation des Stages
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

        //     $manager->persist($stage);
        // };

        $manager->flush();
    }
}


// Pour executer les fixtures ->
//-------------- php bin/console doctrine:fixtures:load ----------------------