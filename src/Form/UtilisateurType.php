<?php

namespace App\Form;

use App\Entity\CodePostal;
use App\Entity\Localite;
use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class UtilisateurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresseRue', TextType::class)
            ->add('adresseNum', NumberType::class)
            ->add('localite', EntityType::class,[
                'class' => Localite::class,
                'required' => false,
                'placeholder' => '-- Veuillez choisir une catégorie --'])
            ->add('codePostal', EntityType::class,[
                'class' => CodePostal::class,
                'required' => false,
                'placeholder' => '-- Veuillez choisir un code postal --'])
            ->add('commune')
            ->add('modifier', SubmitType::class, 
            ['label' => 'Enregistrer modifications']
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
