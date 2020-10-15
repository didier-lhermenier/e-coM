<?php

namespace App\DataFixtures;

use App\Entity\Galery;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GaleryFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');
        for ($i=1; $i<=100; $i++) {
            $img = new Galery();
            $img->setName($faker->sentence($nbWords = 3))
                ->setImage('http://placeimg.com/400/400/tech');
            $manager->persist($img);
            $this->setReference("image$i", $img);
        }

        $manager->flush();
    }
}
