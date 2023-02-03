<?php

namespace App\Form;

use App\Entity\Commune;
use App\Entity\Localite;
use App\Entity\CodePostal;
use App\Entity\Prestataire;
use App\Entity\CategorieService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PrestataireSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prestataire',TextType::class, [
                'required' => false,
                'attr' =>[
                    'placeholder' => 'Saisissez un nom',
                    ]
                ])
            ->add ('categorie', EntityType::class,[
                'class' => CategorieService:: class,
                'required' => false
                ])
            ->add ('localite', EntityType::class,[
                'class' => Localite::class,
                'required' => false
                ])
            ->add ('cp', EntityType::class, [
                'class' => CodePostal::class,
                'required' => false,
            ])
            ->add ('commune', EntityType::class, [
                'class' => Commune::class,
                'required'=> false,
            ])
            ->add('recherche', SubmitType::class, 
            ['label' => 'Rechercher']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
     
            'data_type' => Prestataire::class
        ]);
    }
}
