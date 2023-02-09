<?php

namespace App\Controller;

use App\Entity\Commune;
use App\Entity\Localite;
use App\Entity\CodePostal;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InsertController extends AbstractController
{
    
     /**
     * @Route("/insert",name="insert")
     */

     public function insert(EntityManagerInterface $entityManager){


        $jsonData = file_get_contents("../public/Region-Ville-CodePostal.json");
        $data = json_decode($jsonData, true);

        $dataLength = sizeOf($data);

        for ($i = 0; $i < $dataLength; $i++){

            $localite = new Localite();
            $commune = new Commune();
            $cp = new CodePostal();

            $localite->setLocalite($data[$i]['region']);

            $commune->setCommune($data[$i]['ville']);
            $commune->setLocalite($localite);

            $cp->setCodePostal($data[$i]['codePostal']);
            $cp->setCommune($commune);


            $entityManager->persist($localite);
            $entityManager->persist($commune);
            $entityManager->persist($cp);
        }

        // $entityManager->flush();

        return $this->render('insert/index.html.twig', [
        ]);
     }
}
