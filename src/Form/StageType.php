<?php

namespace App\Form;

use App\Entity\Stage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class StageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                
            ])
            ->add('description', TextareaType::class)
            ->add('tarif', TextType::class)
            ->add('infoComplementaire', TextareaType::class,[
                'required' => false,
            ])
            ->add('debut', DateType::class)
            ->add('fin', DateType::class)
            ->add('affichageDe', DateType::class)
            ->add('affichageJusque', DateType::class)
            ->add('enregistrer', SubmitType::class, 
            ['label' => 'Ajouter le stage']);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Stage::class,
        ]);
    }
}
