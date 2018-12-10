<?php

namespace App\DataFixtures;

use App\Entity\Category;
use App\Entity\CategoryTranslation;
use App\Entity\Home;
use App\Entity\Image;
use App\Entity\Landing;
use App\Entity\Language;
use App\Entity\Gallery;
use App\Entity\Site;
use App\Entity\Slider;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
Use Faker;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        // doctrine:fixtures:load --fixtures=src/PMI/UserBundle/DataFixtures/ORM --append
        $languageNames = [
            'fr' => 'Francais',
            'nl' => 'Néerlandais',
            'en' => 'Anglais',
            'de' => 'Allemand',
            'es' => 'Espagnol',
            'it' => 'Italien',
            'pt' => 'Portugais',
            'cn' => 'Chinois',
            'jp' => 'Japonais',
            'ar' => 'Arabe',
            'ru' => 'Russe'
        ];

        foreach ($languageNames as $key => $value) {
            $language = new Language();
            $language->setName($value)
                ->setIsPublish(true)
                ->setIso($key)
                ->setIcon($key.'.png');

            $manager->persist($language);
            $manager->flush();
        }

        $homezones = [
            'Menu Principal'     => 'Affiche le menu principal lié au site',
            'Menu Professionel'  => 'Affiche le menu profesionnel pour naviguer sur les autres sites',
            'Header'            => '',
            'Discovery'         => '',
            'Thèmes'            => '',
            'Recherche'         => ''
        ];

        foreach ($homezones as $key => $value) {
            $home = new Home();
            $home->setName($key)
                ->setDescription($value);

            $manager->persist($home);
            $manager->flush();
        }

        $landingzones = [
            'Header'     => 'Affiche le header principal',
            'Intrdocution'  => 'Affiche l introdcution du site',
            'Offres'            => 'Plusieurs offres dans ce block',
        ];


        foreach ($landingzones as $key => $value) {
            $landings = new Landing();
            $landings->setName($key)
                ->setDescription($value);

            $manager->persist($landings);
            $manager->flush();
        }

        // galeries
        // sliders
        // site
        // landingpage

        /*
        $category = new Category;

        $category->translate('fr')->setTitle('Chaussures');
        $category->translate('en')->setTitle('Shoes');

        $manager->persist($category);

        // In order to persist new translations, call mergeNewTranslations method, before flush
        $category->mergeNewTranslations();

        $category->translate('en')->getTitle();
        $manager->flush();
        */

        /*

        $category = new Category;
        $category->translate('fr')->setName('Chaussures');
        $category->translate('en')->setName('Shoes');
        $manager->persist($category);

        // In order to persist new translations, call mergeNewTranslations method, before flush
        $category->mergeNewTranslations();
        $category->translate('en')->getName();

        $manager->flush();

        */



/*
        // assumes default locale is "en"
        $food = new Category;
        $food->setTitle('Food');
        $food->addTranslation(new CategoryTranslation('lt', 'title', 'Maistas'));

        $fruits = new Category;
        // $fruits->setParent($food);
        $fruits->setTitle('Fruits');
        $fruits->addTranslation(new CategoryTranslation('lt', 'title', 'Vaisiai'));
        $fruits->addTranslation(new CategoryTranslation('ru', 'title', 'rus trans'));

        $manager->persist($food);
        $manager->persist($fruits);
        $manager->flush();
*/

        /*
        $faker = Faker\Factory::create('fr_FR');

        // persisting multiple translations, assume default locale is EN
        $repository = $manager->getRepository('Gedmo\\Translatable\\Entity\\Translation');
        // it works for ODM also

        $site = new Site();

        $site->setName('mon site original')
            ->setDescription('description')
            ->setLogo('logo');

        $repository->translate($site, 'name', 'en', 'my site in en')
                   ->translate($site, 'description', 'en', 'description in en')
                   ->translate($site, 'logo', 'en', 'logo in en')

                   ->translate($site, 'name', 'fr', 'my site in fr')
                   ->translate($site, 'description', 'fr', 'description in fr')
                   ->translate($site, 'logo', 'fr', 'logo in fr')
        ;

        $manager->persist($site);
        $manager->flush();

        */

        // updating same article also having one new translation

        /*
        $repo
            ->translate($article, 'title', 'lt', 'title lt')
            ->translate($article, 'content', 'lt', 'content lt')
            ->translate($article, 'title', 'ru', 'title ru change')
            ->translate($article, 'content', 'ru', 'content ru change')
            ->translate($article, 'title', 'en', 'title en (default locale) update')
            ->translate($article, 'content', 'en', 'content en (default locale) update')
        ;
        $manager->flush();
        */
    }
}
