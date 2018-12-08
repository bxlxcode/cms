<?php

namespace App\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslatedEntityType;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use App\Entity\Home;
use App\Entity\Language;
use App\Entity\Site;
use App\Entity\SiteTranslationBis;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SiteType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)

    {
        $builder

            ->add('translations', TranslationsType::class, [
                'label' => '...............',
                'fields' => [                                           // [2]
                    'name' => [                                        // [3.a]
                        // 'field_type' => 'textarea',                  // [4]
                        'label' => 'nom',                             // [4]
                        'locale_options' => [                           // [3.b]
                            //'es' => ['label' => 'descripción'],         // [4]
                            //'pt' => ['display' => false],
                            //'it' => ['display' => false],
                            //'de' => ['display' => false],
                            //'nl' => ['display' => false],
                            //'es' => ['display' => false],
                            //'en' => ['display' => false],
                        ]
                    ]
                ],
                'excluded_fields' => ['slug']            // [2]
            ])

            ->add('home', EntityType::class,[
                'class' => Home::class,
                'choice_label' => 'name',
                'label' => 'Zones de la home page',
                'multiple' => true,
                'expanded' => true,
            ])

            ->add('language', EntityType::class,[
                'class' => Language::class,
                'choice_label' => 'name',
                'label' => 'Langues de consultation',
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
