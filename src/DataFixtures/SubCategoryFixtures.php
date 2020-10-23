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

        $subCategories = [
            "Cartes grahiques", "Disques durs", "Claviers", "Ecrans", "Casques", "Souris",
            "Ordinateurs de bureau", "Portable", "Mac",
            "Imprimantes", "Hauts-parleurs", "Clefs USB",
            "Compact", "Bridge", "Réflexe",
            "TV LCD", "TV OLED", "Chaîne HiFi", "Home Cinéma", "Lecteur Blu-Ray"
        ];

        for ($i = 0; $i < count($subCategories); $i++) {
            $subCategory = new subCategory();
            $subCategory
                ->setName($subCategories[$i])
                ->setDescription($faker->sentence($nbWords = 6, $variableNbWords = true));

            $manager->persist($subCategory);
            $this->addReference($subCategories[$i], $subCategory);
        }
        $manager->flush();
    }
}
