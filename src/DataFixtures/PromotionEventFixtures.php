<?php

namespace App\DataFixtures;

use App\Entity\PromotionEvent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PromotionEventFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $bf = new PromotionEvent();
        $bf->setLabel("Black Friday 2020");

        $manager->persist($bf);

        $this->addReference("bf_2020", $bf);

        $fd = new PromotionEvent();
        $fd->setLabel("French days 2020");

        $manager->persist($fd);

        $this->addReference("fd_2020", $fd);

        $noel = new PromotionEvent();
        $noel->setLabel("Noël 2020");

        $manager->persist($noel);

        $this->addReference("noel_2020", $noel);

        $manager->flush();
    }
}
