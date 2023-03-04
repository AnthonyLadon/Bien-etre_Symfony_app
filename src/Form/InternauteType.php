<?php

namespace App\Form;

use App\Entity\Internaute;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\File;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class InternauteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('prenom')
            ->add('newsletter',CheckboxType::class,[
                'label' => 'Incription à la newsletter',
                'required' => false
            ])
            // ->add('bloc')
            //->add('prestataires')
            // ->add('utilisateur')
            //->add('image')
            ->add('enregistrer', SubmitType::class, 
            ['label' => 'Enregistrer les modifications']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Internaute::class,
        ]);
    }
}
