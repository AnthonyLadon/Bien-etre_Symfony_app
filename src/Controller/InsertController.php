<?php

namespace App\Controller;

use Faker\Factory;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InsertController extends AbstractController
{


    //+++++++++++++++++++ Pour ajouter en DB dé-commenter $entityManager->flush();
    /**
     * @Route("ajout_admin",name="ajoutAdmin")
     */

     public function ajoutAdmin(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager){

        $faker = Factory::create('fr_BE');

        $admin = new Utilisateur();
        $admin->setEmail('admin@admin.be');
        $admin->setPassword('admin');
        $admin->setDateInscription($faker->dateTime());
        $admin->setTypeUtilisateur('admin');
        $admin->setNbEssais(0);
        $admin->setBanni(0);
        $admin->setRoles(["ROLE_ADMIN","ROLE_USER"]);

        $plaintextPassword = 'admin';

        // hash the password (based on the security.yaml config for the $user class)
        $hashedPassword = $passwordHasher->hashPassword(
            $admin,
            $plaintextPassword
        );
        $admin->setPassword($hashedPassword);

        $entityManager->persist($admin);
        //$entityManager->flush();


        return $this->render('insert/index.html.twig', [
            ]);
     }
     
}
