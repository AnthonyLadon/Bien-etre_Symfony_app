<?php

namespace App\Form;

use App\Entity\Images;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ImagesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('imageFile', FileType::class, [
                 "label" => "Image",
                'mapped' => false,
                'required' => false,
                'constraints' => [
                    new File([
                        'maxSize' => '5M',  // Taile max du fichier uplodé 
                        'mimeTypes' => [
                            'image/png', 
                            'image/jpg',
                            'image/jpeg',
                            'image/webp',
                            'image/avif',
                        ],
                        'mimeTypesMessage' => 'Veuillez uploder une image valide',
                    ])
                ],
            ])
            ->add('enregistrer', SubmitType::class, 
            ['label' => 'enregistrer']
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Images::class,
        ]);
    }
}
