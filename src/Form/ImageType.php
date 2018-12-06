<?php

namespace App\Form;

use App\Entity\Image;
use App\Entity\Gallery;
use App\Entity\Slider;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('name')
            ->add('copyright')

            ->add('gallery', EntityType::class,[
                'class' => Gallery::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])


            ->add('slider', EntityType::class,[
                'class' => Slider::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])

            ->add('isPublish')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Image::class,
        ]);
    }
}
