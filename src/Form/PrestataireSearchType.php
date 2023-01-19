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
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class PrestataireSearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prestataire', TextType::class, [
                'required' => false,
                'attr' =>[
                    'placeholder' => 'Nom du prestataire',
                    ]
                ])
            ->add ('localite', EntityType::class,[
                'class' => Localite::class,
                'required' => false,
                'choice_label' => function ($localite) {
                    return $localite->getLocalite();
                },
                'attr' =>[
                    'placeholder'=> 'Localité'
                    ]
                ])
            ->add ('categorie', EntityType::class,[
                'class' => CategorieService:: class,
                'required' => false,
                'choice_label' => function ($categorie) {
                    return $categorie->getNom();
                },
                'attr' =>[
                    'placeholder'=> 'Catégorie'
                    ]
                ])
            ->add ('cp', EntityType:: class,
            [
                'class' => CodePostal::class,
                'required' => false,
                'choice_label' => function ($cp) {
                    return $cp->getCodePostal();
                }
            ])
            ->add ('commune', EntityType::class, 
            [
                'class' => Commune:: class,
                'required'=> false,
                'choice_label' => function ($commune) {
                    return $commune->getCommune();
                },
            ])
            ->add('Recherche', SubmitType::class
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestataire::class,
        ]);
    }

}


