<?php

namespace App\Form;

use App\Entity\Division;
use App\Entity\Office;
use App\Entity\Team;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class OfficeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('isPublish')

            ->add('division', EntityType::class,[
                'class' => Division::class,
                'choice_label' => 'name',
                'label' => 'Département',
                'multiple' => false,
                'expanded' => false,
            ])

            ->add('manager', EntityType::class,[
                'class' => Team::class,
                'choice_label' => 'Fullname',
                'label' => 'Manager',
                'multiple' => false,
                'expanded' => false,
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Office::class,
        ]);
    }
}
