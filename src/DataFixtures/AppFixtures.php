<?php

namespace App\DataFixtures;

use App\Entity\Commune;
use App\Entity\Localite;
use App\Entity\CodePostal;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;



class AppFixtures extends Fixture
{

    // ------------------------------------------------------------------------
    // Insertion dans la DB des localité, communes et code postaux de Belgique
    // ------------------------------------------------------------------------

    public function load(ObjectManager $manager): void
    {
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
        $pronvincesLength = sizeof($provinces);

        for ($i = 0; $i < $pronvincesLength; $i++){
            $localite = new Localite();
            $localite->setLocalite($provinces[$i]);
            $manager->persist($localite);
        }

        // Récupére depuis le fichier json les communes + code postaux de Belgique
        $json = file_get_contents('public/zipcode-belgium.json');

        // Decoder le fichier json
        $json_data = json_decode($json,true);

        // tri des city par ordre alphabétique et remplacement é et è par e
        foreach ($json_data as $key => $value) {
            $json_data[$key]['city'] = str_replace('é', 'e', $value['city']);
            $json_data[$key]['city'] = str_replace('è', 'e', $value['city']);
        }
        //tri des city par ordre alphabétique
        usort($json_data, function($a, $b) {
            return $a['city'] <=> $b['city'];
        });
        // stockage des city triées dans un tableau
        $city = array_column($json_data, 'city');
        // suppression des doublons
        $city = array_unique($city);

        foreach ($city as $key => $value) {
            $commune = new Commune();
            $commune->setCommune($value);
            $manager->persist($commune);
        }

        // tri des code postaux par ordre croissant
        usort($json_data, function($a, $b) {
            return $a['zip'] <=> $b['zip'];
        });
        // stockage des code postaux triées dans un tableau
        $zip = array_column($json_data, 'zip');
        // suppression des doublons
        $zip = array_unique($zip);
    
        foreach ( $zip as $key => $value) {
            $codePostal = new CodePostal();
            $codePostal->setCodePostal($value);
            $manager->persist($codePostal);
        }

        $manager->flush();
    }

}

//TODO Pour executer les fixtures -> php bin/console doctrine:fixtures:load