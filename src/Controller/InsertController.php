<?php

namespace App\Controller;

use PDO;
use Exception;
use Faker\Factory;
use App\Entity\Localite;
use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class InsertController extends AbstractController
{
    //+++++++++++++++++++ dé-commenter $entityManager->flush();
     /**
     * @Route("/ajout_user",name="ajoutUtilisateur")
     */
    public function ajoutUtilisateur(UserPasswordHasherInterface $passwordHasher, EntityManagerInterface $entityManager)
    {
        $faker = Factory::create('fr_BE');

        for ($i = 0; $i < 25; $i++) {
            $utilisateur = new Utilisateur();
            $utilisateur->setEmail('user'.$i.'@gmail.com');
            $utilisateur->setPassword('password');
            $utilisateur->setTypeUtilisateur('utilisateur');
            $utilisateur->setRoles(['ROLE_USER']);
            $utilisateur->setDateInscription($faker->dateTime());
            $utilisateur->setNbEssais(0);
            $utilisateur->setBanni(0);
            $utilisateur->setIsVerified(1);
            $utilisateur->setAdresseNum($faker->randomNumber(2, true));
            $utilisateur->setAdresseRue($faker->streetName() );
            $entityManager->persist($utilisateur);
            $plaintextPassword = 'password';

            // hash the password (based on the security.yaml config for the $user class)
            $hashedPassword = $passwordHasher->hashPassword(
                $utilisateur,
                $plaintextPassword
            );
            $utilisateur->setPassword($hashedPassword);
    
        };
   
        //$entityManager->flush();

        return $this->render('insert/index.html.twig', [
        ]);
    }

        //+++++++++++++++++++ dé-commenter $entityManager->flush();
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

     /**
      * @Route("/ajout_provinces",name="ajout_provinces")
      */

      public function test(EntityManagerInterface $entityManager){

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
                $entityManager->persist($localite);
            }
    
            //$entityManager->flush();

        return $this->render('insert/index.html.twig', [

            ]);
      }

}
