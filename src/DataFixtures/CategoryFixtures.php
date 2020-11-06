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

        for($i = 1; $i <= 10; $i++){
            $category = new Category();
            $category
                    ->setName(chr(64+$i))
                    ->setDescription($faker->sentence($nbWords = 6, $variableNbWords = true));
            
            $manager->persist($category);   
            $this->addReference("category".chr(64+$i), $category);
        }

        $manager->flush();
    }
}
