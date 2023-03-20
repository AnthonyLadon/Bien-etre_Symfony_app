<?php

namespace App\Controller;

use App\Entity\Utilisateur;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;

class LoginSecurityController extends AbstractController
{

    private $tokenStorage;

    public function __construct(TokenStorageInterface $tokenStorage)
    {
        $this->tokenStorage = $tokenStorage;
    }
    
    // ----------------------------------------------------------------
    // Controller LOGIN
    // priority = 1 place la route en tete des routes (executée en 1ére) et donc evite
    // d'etre confondue avec un slug ou autre
    // ----------------------------------------------------------------
    /**
     * @Route("/login",name="security_login", priority=1)
     */
    public function login(AuthenticationUtils $authenticationUtils, EntityManagerInterface $entityManager): Response
    {

        if ($this->getUser()) {

        // récupèration des rôles de l'utilisateur
        $roles = $this->getUser()->getRoles();

        if (in_array('ROLE_PREST', $roles)){
            return $this->render('profil_prestataire/index.html.twig');
        }
    }
        // dernier email entré par l'utilisateur
        $lastUsername = $authenticationUtils->getLastUsername();
        // recupération de l'utilisateur
        $user = $entityManager->getRepository(Utilisateur::class)->findOneBy(['email' => $lastUsername]);

        // Gestion des tentatives de connection infructueuses
        $error = $authenticationUtils->getLastAuthenticationError();

        if($error){
                if($user){
                    // incrémentation dans la DB du nombre de tentatives de connections infructueuses
                    $user->setNbEssais($user->getNbEssais() + 1);
                    $entityManager->persist($user);

                    if($user->getNbEssais() == 3 ){
                        $this->addFlash('notice', 'Vous avez fait 3 tentatives de connexion. Plus qu\'une tentative');
                    }

                    // passe isBanni à TRUE dans la DB si tentatives infructueuses > 3
                    if($user->getNbEssais() > 4) {
                        $user->setBanni(1);
                        $entityManager->persist($user);
                        $this->addFlash('notice', 'Votre compte est bloqué. Veuillez contacter l\'administrateur du site.');
                    }
                    $entityManager->flush();
                }
        }
        
        if($user !== null && $user->isBanni() == 0){
            // si l'utilisateur n'a pas fait d'erreur de connexion, on remet le compteur à 0
            $user->setNbEssais(0);
            $entityManager->persist($user);
            $entityManager->flush();
        }

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
}

    // ----------------------------------------------------------------
    // LOGOUT
    // ----------------------------------------------------------------
    #[Route(path: '/logout', name: 'app_logout')]
    public function logout(EntityManagerInterface $entityManager): void
    {
        // recuperation de l'utilisateur
        $email = $this->tokenStorage->getToken()->getUser()->getUserIdentifier();
        $user = $entityManager->getRepository(Utilisateur::class)->findOneBy(['email' => $email]);

        // remise à 0 du compteur d'essais de connexion
        $user->setNbEssais(0);
        $entityManager->persist($user);
        $entityManager->flush();

        throw new \LogicException('This method can be blank - it will be intercepted by the logout key on your firewall.');
    }
}
