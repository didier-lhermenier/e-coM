<?php

namespace App\DataFixtures;

use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PromotionFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        $BF_2020 = new Promotion();
        $BF_2020
            ->setName("Black Friday 2020")
            ->setCreatedAt($faker->dateTimeBetween($startDate = '-6 months', $endDate = '-5 months', $timezone = 'Europe/Paris'))
            ->setDateStart(date_create("2020-11-23"))
            ->setDateEnd(date_create("2020-11-30"));

        $manager->persist($BF_2020);
        $this->addReference("BF 2020", $BF_2020);

        $DISCOUNT_OCTOBRE = new Promotion();
        $DISCOUNT_OCTOBRE
            ->setName("DISCOUNT OCTOBRE")
            ->setCreatedAt($faker->dateTimeBetween($startDate = '-6 months', $endDate = '-5 months', $timezone = 'Europe/Paris'))
            ->setDateStart(date_create("2020-10-01"))
            ->setDateEnd(date_create("2020-10-31"));

        $manager->persist($DISCOUNT_OCTOBRE);
        $this->addReference("DISCOUNT", $DISCOUNT_OCTOBRE);
        $manager->flush();
    }
}
