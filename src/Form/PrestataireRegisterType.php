<?php

namespace App\Form;

use App\Entity\Stage;
use App\Entity\Prestataire;
use App\Entity\CategorieService;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\UrlType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class PrestataireRegisterType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class,[
                'required' => true,
            ])
            ->add('siteWeb', UrlType::class)
            ->add('tel', NumberType::class,[
                'label' => 'Numéro de téléphone'
            ])
            ->add('tvaNum', NumberType::class,[
                'label' => 'Numéro de TVA'
            ])
            ->add ('proposer', EntityType::class,[
                "class" => CategorieService::class,
                "multiple" => true,
                "required" => true,
                'label' => 'Choisissez une ou plusieurs catégories'
            ])
            ->add('soumettre', SubmitType::class, [
                'label' => 'M\'inscrire'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Prestataire::class,
        ]);
    }
}
