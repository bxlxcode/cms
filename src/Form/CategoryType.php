<?php

namespace App\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('translations', TranslationsType::class, [
                'fields' => [                                           // [2]
                    'title' => [                                        // [3.a]
                        // 'field_type' => 'textarea',                  // [4]
                        'label' => 'title',                             // [4]
                        'locale_options' => [                           // [3.b]
                            'es' => ['label' => 'descripción'],         // [4]
                            //'pt' => ['display' => false],
                            //'it' => ['display' => false],
                            //'de' => ['display' => false],
                            //'nl' => ['display' => false],
                            //'es' => ['display' => false],
                            //'en' => ['display' => false],
            ]
        ]
    ],
    // 'excluded_fields' => ['details']            // [2]
]);
    }




    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
