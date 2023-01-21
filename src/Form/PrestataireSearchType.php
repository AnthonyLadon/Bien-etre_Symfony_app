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
            ->add('prestataire',TextType::class, [
                'required' => false,
                'attr' =>[
                    'placeholder' => 'Nom du prestataire',
                    ]
                ])
                /** L'object peut s'afficher dans la liste déroulante grace à la 
                 * methode __ToString déclarée dans l'entity */
            ->add ('localite', EntityType::class,[
                'class' => Localite::class,
                'required' => false
                ])
            ->add ('categorie', EntityType::class,[
                'class' => CategorieService:: class,
                // permet de selectionner plusieurs choix dans la liste déroulante
                'multiple' => true,
                'required' => false
                ])
            ->add ('cp', EntityType:: class,
            [
                'class' => CodePostal::class,
                'required' => false
            ])
            ->add ('commune', EntityType::class, 
            [
                'class' => Commune:: class,
                'required'=> false
            ])
            ->add('Recherche', SubmitType::class, 
            ['label' => 'recherche']
            )
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
     
            'data_type' => Prestataire::class
            /* J'ai supprimé  'data_type' => Prestataire::class
            Sans ce parametre les réponses dans $form->getData() sont un tableau
            associatif plus simple à manipuler.
            */
        ]);
    }
}


