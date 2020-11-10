<?php

namespace App\DataFixtures;

use App\Entity\PromotionType;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PromotionTypeFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $promotionTypeBon = new PromotionType();
        $promotionTypeBon
            ->setLabel("Bon de réduction");
        $manager->persist($promotionTypeBon);
        $this->addReference("BDR", $promotionTypeBon);

        $promotionTypeDiscount = new PromotionType();
        $promotionTypeDiscount
            ->setLabel("Discount");
        $manager->persist($promotionTypeDiscount);
        $this->addReference("Discount", $promotionTypeBon);

        $manager->flush();
    }
}
