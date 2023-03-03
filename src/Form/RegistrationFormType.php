<?php

namespace App\Form;

use App\Entity\Commune;
use App\Entity\Localite;
use App\Entity\CodePostal;
use App\Entity\Internaute;
use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class,[
                'label' => 'Email'
            ])
            ->add('adresseRue', TextType::class, [
                'label' => 'rue'
                ])
            ->add('adresseNum', NumberType::class,[
                'label' => 'Numéro'
            ])
            ->add('localite', EntityType::class,[
                'class' => Localite::class,
                'label' => 'localité',
            ])
            ->add('commune', EntityType::class,[
                'class' => Commune::class,
                'label' => 'commune',
            ])
            ->add('codePostal', EntityType::class,[
                'class' => CodePostal::class,
                'label' => 'code postal',
            ])
            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'label' => 'J\'accepte les conditions',
                'constraints' => [
                    new IsTrue([
                        'message' => 'Vous devez accepter les conditions',
                    ]),
                ],
            ])
            // Utilisation du type RepeatedType afin de forcer l'utilisateur à entrer 2 fois
            // son mot de passe (Et si match des 2 MDP -> envoi)
            ->add('plainPassword', RepeatedType::class, [
                'first_options'  => ['label' => 'Entrez votre mot de passe'],
                'second_options' => ['label' => 'Veuillez repeter le mot de passe'],
                'type' => PasswordType::class,
                'invalid_message' => 'Attention! Les deux mots de passe doivent correspondre',
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe'
                    ]),
                    new Length([
                        // contrainte de longueur du mot de passe
                        'min' => 7,
                        'minMessage' => 'Votre mot de passe doit contenir au minimum {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                    //! Regex pour obliger l'utilisateur à créer un mot de passe solide (minimum 1 majuscule, 1 caractere special, 1 chiffre)
                    new Regex("/^(?=.*\d)(?=.*[A-Z])(?=.*[@#$%])(?!.*(.)\1{2}).*[a-z]/m",
                    'Désolé votre mot de passe n\'est pas valide, veuillez le modifier en veillant à respecter les contraintes de complexité'
                    )
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
