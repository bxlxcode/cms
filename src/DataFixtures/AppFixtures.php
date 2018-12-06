<?php

namespace App\DataFixtures;

use App\Entity\Image;
use App\Entity\Language;
use App\Entity\Gallery;
use App\Entity\Slider;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
Use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 10; $i++) {
            $slider = new Slider();
            $slider->setName($faker->colorName)
                   ->setIsPublish(true);

            $gallery = new Gallery();
            $gallery->setName($faker->country)
                ->setIsPublish(true);

            $manager->persist($slider);
            $manager->persist($gallery);

            $manager->flush();
        }



/*
        $faker = Faker\Factory::create('fr_FR');

        for ($i = 0; $i < 5; $i++) {

            $language = new Language();
            $language->setName($faker->country)
                ->setIsPublish($faker->boolean)
                ->setIcon($faker->countryCode)
                ->setIso($faker->countryCode);

            $manager->persist($language);

            for ($a = 0; $a < 2; $a++) {
                $tag = new Gallery();
                $tag->setName($faker->colorName)
                    ->setIsPublish($faker->boolean);


                $image = new Image();
                $image->setName($faker->company)
                    ->setCopyright($faker->colorName)
                    ->setUrl($faker->imageUrl())
                    ->setIsPublish($faker->boolean)
                    ->addTag($tag);

                $manager->persist($tag);
                $manager->persist($image);
            }
        }

        $manager->flush();
        */
    }
}
