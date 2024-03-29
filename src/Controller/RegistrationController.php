<?php

namespace App\Controller;

use App\Entity\Stage;
use App\Form\StageType;
use App\Entity\Internaute;
use App\Entity\Prestataire;
use App\Entity\Utilisateur;
use App\Security\EmailVerifier;
use App\Form\RegistrationFormType;
use Symfony\Component\Mime\Address;
use App\Security\LoginAuthenticator;
use App\Form\PrestataireRegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;

class RegistrationController extends AbstractController
{
    private EmailVerifier $emailVerifier;

    public function __construct(EmailVerifier $emailVerifier)
    {
        $this->emailVerifier = $emailVerifier;
    }

    // ----------------------------------------------------------------
    // Inscription sur le site (+ envoi email vérification)
    // ----------------------------------------------------------------
    /**
     * @Route("/inscription",name="inscription")
     */
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, LoginAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {

      // récupération de l'URL de la derniere page visitée depuis le cache du navigateur
      $LastVisitedPage = $request->headers->get('referer');

        $user = new Utilisateur();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        $date = new \DateTime;
        $user->setDateInscription($date);
        $user->setNbEssais(0);
        $user->setBanni(0);
        $user->setRoles(['ROLE_USER']);


        if ($form->isSubmitted() && $form->isValid()) {
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            // récupération des champs non mappés (class Internaute, localite, commune et codePostal)
            $prenom = $form->get("prenom")->getData();
            $nom = $form->get("nom")->getData();
            $localite = $form->get("localite")->getData();
            $commune = $form->get("commune")->getData();
            $codePostal = $form->get("codePostal")->getData();

            $user->setLocalite($localite);
            $user->setCommune($commune);
            $user->setCodePostal($codePostal);
            
            // Ajout d'une entrée dans la table internaute (enregistrement par défaut en tant qu'internaure)
            $internaute = new Internaute();
            $internaute->setNom($nom);
            $internaute->setPrenom($prenom);
            $user->setInternautes($internaute);

            $entityManager->persist($user);
            $entityManager->persist($internaute);
            $entityManager->flush();

            $this->addFlash('success', 'Votre inscription a bien été prise en compte');

            // envoi de l'email de confirmation d'inscription
            $this->emailVerifier->sendEmailConfirmation('app_verify_email', $user,
                (new TemplatedEmail())
                    ->from(new Address('bienetre@no-reply.com', 'BienEtre & Co'))
                    ->to($user->getEmail())
                    ->subject('Merci de confirmer votre adresse email')
                    ->htmlTemplate('registration/confirmation_email.html.twig')
            );

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );

            return $this->redirect($LastVisitedPage);
            
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }


    // ----------------------------------------------------------------
    // Verification de l'email (après inscription)
    // ----------------------------------------------------------------
    #[Route('/verify/email', name: 'app_verify_email')]
    public function verifyUserEmail(Request $request, TranslatorInterface $translator): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        // validate email confirmation link, sets User::isVerified=true and persists
        try {
            $this->emailVerifier->handleEmailConfirmation($request, $this->getUser());
        } catch (VerifyEmailExceptionInterface $exception) {
            $this->addFlash('verify_email_error', $translator->trans($exception->getReason(), [], 'VerifyEmailBundle'));

            return $this->redirectToRoute('home');
        }

        // @TODO Change the redirect on success and handle or remove the flash message in your templates
        $this->addFlash('success', 'Votre adresse email a bien été vérifiée');

        return $this->redirectToRoute('home');
    }



    // ----------------------------------------------------------------
    // Inscription en tant que prestataire (ROLE_USER required)
    // ----------------------------------------------------------------
     /**
     * @Route("/inscription_prestataire/{id}",name="prestataire_register")
     */


    public function registerPrest(Request $request, EntityManagerInterface $entityManager, $id)
    {

      $repository = $entityManager->getRepository(Utilisateur::class);
      $utilisateur = $repository->find($id);

      $prestataire = new Prestataire();
      // donner au prestataire le prenom et nom concaténé de l'utilisateur
      $prestataire->setNom($utilisateur->getInternautes()->getPrenom() . ' ' . $utilisateur->getInternautes()->getNom());

      $form = $this->createForm(PrestataireRegisterType::class, $prestataire);
      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {

        $form = $form->getData();
        $proposer = $form->getProposer();

        $prestataire->setUtilisateur($utilisateur);
        // boucle pour charger les différentes catégories selectionnées dans le formulaire
        foreach($proposer as $p){
          $prestataire->addProposer($p);
          $entityManager->persist($prestataire);
        }

        $utilisateur->setRoles(["ROLE_USER", "ROLE_PREST"]);
        $utilisateur->setTypeUtilisateur('prestataire');

        $entityManager->persist($utilisateur);
        $entityManager->persist($prestataire);
        $entityManager->flush();
        $this->addFlash('success', 'Vous êtes un prestataire! Reconnectez-vous pour renseigner vos stages et promos');

        return $this->redirectToRoute('profil_prest_stage', [
          "id" => $prestataire->getId(),
        ]);
    }

    return $this->render('profil_utilisateur/inscription_prestataire.html.twig', [
    'form' => $form->createView()
    ]);
    }

  }