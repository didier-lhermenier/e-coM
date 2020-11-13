<?php

namespace App\DataFixtures;

use App\Entity\Promotion;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Persistence\ObjectManager;

class PromotionFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $faker = \Faker\Factory::create('fr_FR');

        $BF_2020 = new Promotion();
        $BF_2020
            ->setName("Lancement Black Friday")
            ->setCreatedAt($faker->dateTimeBetween($startDate = '-6 months', $endDate = '-5 months', $timezone = 'Europe/Paris'))
            ->setDateStart(date_create("2020-11-23"))
            ->setDateEnd(date_create("2020-11-26"))
            ->setType("DIS")
            ->setValue(30)
            ->setPromotionEvent($this->getReference("bf_2020"));

        $manager->persist($BF_2020);
        $this->addReference("launch bf 2020", $BF_2020);

        $BF_2020 = new Promotion();
        $BF_2020
            ->setName("Final Black Friday")
            ->setCreatedAt($faker->dateTimeBetween($startDate = '-6 months', $endDate = '-5 months', $timezone = 'Europe/Paris'))
            ->setDateStart(date_create("2020-11-27"))
            ->setDateEnd(date_create("2020-11-30"))
            ->setType("DIS")
            ->setValue(50)
            ->setPromotionEvent($this->getReference("bf_2020"));

        $manager->persist($BF_2020);
        $this->addReference("final bf 2020", $BF_2020);

        $NOEL = new Promotion();
        $NOEL
            ->setName("Avant Noël")
            ->setCreatedAt($faker->dateTimeBetween($startDate = '-3 months', $endDate = '-2 months', $timezone = 'Europe/Paris'))
            ->setDateStart(date_create("2020-12-01"))
            ->setDateEnd(date_create("2020-12-24"))
            ->setType("BDR")
            ->setValue(10)
            ->setPromotionEvent($this->getReference("noel_2020"));

        $manager->persist($NOEL);
        $this->addReference("before christmas", $NOEL);

        $NOEL = new Promotion();
        $NOEL
            ->setName("Après Noël")
            ->setCreatedAt($faker->dateTimeBetween($startDate = '-3 months', $endDate = '-2 months', $timezone = 'Europe/Paris'))
            ->setDateStart(date_create("2020-12-25"))
            ->setDateEnd(date_create("2020-12-31"))
            ->setType("BDR")
            ->setValue(20)
            ->setPromotionEvent($this->getReference("noel_2020"));

        $manager->persist($NOEL);
        $this->addReference("after christmas", $NOEL);

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            PromotionEventFixtures::class
        );
    }
}
