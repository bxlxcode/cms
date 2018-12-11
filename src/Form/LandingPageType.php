<?php

namespace App\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use App\Entity\LandignPage;
use App\Entity\Landing;
use App\Entity\Language;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LandingPageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('isPublish')
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

            ->add('landingZone', EntityType::class,[
                'class' => Landing::class,
                'choice_label' => 'name',
                'label' => 'Zones de la landing page',
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
            'data_class' => LandignPage::class,
        ]);
    }
}
