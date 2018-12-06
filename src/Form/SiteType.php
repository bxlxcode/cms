<?php

namespace App\Form;

use App\Entity\Home;
use App\Entity\Language;
use App\Entity\Site;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('logo')
            ->add('description')

            ->add('home', EntityType::class,[
                'class' => Home::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])

            ->add('language', EntityType::class,[
                'class' => Language::class,
                'choice_label' => 'name',
                'multiple' => true,
                'expanded' => true,
            ])

        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Site::class,
        ]);
    }
}
