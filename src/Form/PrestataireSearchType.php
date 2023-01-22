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
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
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
                /** L'object peut s'afficher dans la liste déroulante grace à la 
                 * methode __ToString déclarée dans l'entity */
            ->add ('localite', EntityType::class,[
                'class' => Localite::class,
                'required' => false
                ])
            ->add ('categorie', EntityType::class,[
                'class' => CategorieService:: class,
                // empeche le champ select de choisir une valeur nulle
                'constraints' => [
                        new NotBlank()
                    ]
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
            ->add('recherche', SubmitType::class, 
            ['label' => 'Rechercher']
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


