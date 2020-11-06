<?php

namespace App\DataFixtures;

use App\Entity\SubCategory;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SubCategoryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        for ($letter = 1; $letter <= 10; $letter++) {
            for ($digit = 1; $digit <= 3; $digit++) {
                $subCategory = new subCategory();
                $subCategory
                ->setName(chr(64+$letter)."$digit")
                ->setDescription($faker->sentence($nbWords = 6, $variableNbWords = true));
                
                $manager->persist($subCategory);
                $this->addReference("subCat".chr(64+$letter)."$digit", $subCategory);
            }    
        }
        $manager->flush();
    }
}
