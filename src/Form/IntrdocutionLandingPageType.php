<?php

namespace App\Form;

use A2lix\TranslationFormBundle\Form\Type\TranslatedEntityType;
use A2lix\TranslationFormBundle\Form\Type\TranslationsType;
use App\Entity\IntrdocutionLandingPage;
use App\Entity\LandignPage;
use Doctrine\ORM\EntityRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IntrdocutionLandingPageType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder

            ->add('isPublish')

            ->add('landingPage', TranslatedEntityType::class,
                array(
                    'class' => LandignPage::class,
                    'translation_property' => 'name',
                    'label' => 'Landing page',
                    'multiple' => false,
                    'expanded' => false,

                    // Optionnal custom query_builder override. Here, to ordering by title ASC

                    'query_builder' => function (EntityRepository $er) {
                        return $er->createQueryBuilder('e')
                            ->select('e, t')
                            ->join('e.translations', 't')
                            ->orderBy('t.id', 'ASC');
                    },

                )
            )

            ->add('translations', TranslationsType::class, [
                'label' => '...............',
                'fields' => [                                           // [2]
                    'title' => [                                        // [3.a]
                        // 'field_type' => 'textarea',                  // [4]
                        'label' => 'title',                             // [4]
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
                //'excluded_fields' => ['slug']            // [2]
            ])
        ;

        /*
        $builder
            ->add('createdAt')
            ->add('updatedAt')
            ->add('landingPage')
        ;
        */
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => IntrdocutionLandingPage::class,
        ]);
    }
}
