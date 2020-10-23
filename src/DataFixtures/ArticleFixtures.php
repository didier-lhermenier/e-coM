<?php

namespace App\DataFixtures;

use Faker\Factory;
use App\Entity\TVA;
use App\Entity\Galery;
use App\Entity\Article;
use App\DataFixtures\TVAFixtures;
use App\DataFixtures\GaleryFixtures;
use App\Entity\ArticleHasProperty;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        // On génère 40 Articles
        for ($i = 1; $i <= 40; $i++) {
            $article = new Article();
            $article
                ->setName($faker->sentence($nbWords = 3))
                ->setDescription($faker->text($faker->numberBetween(100, 200)))
                ->setPrice($faker->randomFloat($nbMaxDecimals = 2, $min = 1, $max = 1000))
                ->setImage('http://placeimg.com/400/400/tech')
                ->setWeight($faker->randomFloat($nbMaxDecimals = 2, $min = 0.1, $max = 10))
                ->setDimension(
                    "L"    . $faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 150) .
                        " x l" . $faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 150) .
                        " h"   . $faker->randomFloat($nbMaxDecimals = 2, $min = 5, $max = 150)
                );

            $tva = (rand(1, 100) <= 80) ? $this->getReference("TVA20") : $this->getReference("TVA5");
            $article->setTVA($tva);

            // Pour chaque article on décide d'associer de 1 à 4 images
            $nbImg = rand(0, 4);
            // Initialiser la liste des valeurs possibles
            $list = [];
            // On fait une boucle de 1 à n (n aléatoire de 0 à 4)
            for ($j = 0; $j < $nbImg; $j++) {
                // On cherche l'image de la galery parmi les 100 possibles
                $galery = new Galery();
                // On génère une valeur unique entre 1 et 100
                $value = $this->randomizer($list);
                // On récupère la galery
                $galery = $this->getReference("image".$value);
                // On affecte la galerie à l'article
                $article->addGalery($galery);
            }

            $manager->persist($article);
            $this->setReference("article$i", $article);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            GaleryFixtures::class,
            TVAFixtures::class,
        );
    }

    public function randomizer(array &$list) : int {
        // tant que la valeur est contenue dans la liste ...
        do {
            // générer la valeur entre 1 et 100
            $value = rand(1, 100);
        } while (in_array($value, $list));

        // Ajouter la valeur dans la liste des valeurs
        $list[] = $value;

        return $value;
    }
}
