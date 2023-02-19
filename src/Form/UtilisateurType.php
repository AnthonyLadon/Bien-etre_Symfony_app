<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            // ->add('roles')
            // ->add('password')
            ->add('adresseNum')
            ->add('adresseRue')
            // ->add('dateInscription')
            // ->add('typeUtilisateur')
            ->add('nomComplet')
            ->add('localite')
            ->add('codePostal')
            ->add('commune')
            // ->add('internautes')
            ->add('modifier', SubmitType::class, 
            ['label' => 'Enregistrer modifications']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
