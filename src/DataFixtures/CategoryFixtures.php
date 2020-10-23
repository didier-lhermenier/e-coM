<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        $categories = ["Composants", "Ordinateurs", "Périphériques", "Appareils photos", "TV Hifi Vidéo"];

        for($i = 0; $i < count($categories); $i++){
            $category = new Category();
            $category
                    ->setName($categories[$i])
                    ->setDescription($faker->sentence($nbWords = 6, $variableNbWords = true));
            $manager->persist($category);   
        }

        $manager->flush();
    }
}
