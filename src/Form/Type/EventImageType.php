<?php

namespace App\Form\Type;

use App\Entity\EventImage;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Validator\Constraints\File;

class EventImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('file', VichImageType::class, [
                'label' => 'Image',
                'required' => false,
                'constraints' => [
                    new File([
                        'mimeTypes' => 'image/jpeg',
                        'maxSize' => '5m',
                        'mimeTypesMessage' => 'Please upload a valid JPG(JEPG) document',
                    ])
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => EventImage::class
        ]);
    }
}