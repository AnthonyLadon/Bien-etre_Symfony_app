<?php

namespace App\Form;

use App\Entity\Commune;
use App\Entity\Localite;
use App\Entity\CodePostal;
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
            ->add('adresseRue', TextType::class, [
                'required' => false,
            ])
            ->add('adresseNum', NumberType::class, [
                'required' => false,
                ])
            ->add('localite', EntityType::class, [
                'class' => Localite::class,
                'required' => false,
                ])
            ->add('codePostal', EntityType::class, [
                'class' => CodePostal::class,
                'required' => false,
                ])
            ->add('commune', EntityType::class, [
                'class' => Commune::class,
                'required' => false,
                ])
            ->add('modifier', SubmitType::class, 
            ['label' => 'Enregistrer']
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
        ]);
    }
}
