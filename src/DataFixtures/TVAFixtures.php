<?php

namespace App\DataFixtures;

use App\Entity\TVA;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;

class TVAFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // $product = new Product();
        // $manager->persist($product);

        $TVA20 = new TVA();
        $TVA20->setName("TVA 20")
            ->setRate(0.2);

        $manager->persist($TVA20);

        $TVA5 = new TVA();
        $TVA5->setName("TVA 5.5")
            ->setRate(0.055);

        $manager->persist($TVA5);

        $manager->flush();
    }
}
