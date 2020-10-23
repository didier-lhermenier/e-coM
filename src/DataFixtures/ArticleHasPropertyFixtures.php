<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\ArticleHasProperty;
use App\Entity\Category;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleHasPropertyFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {

        $categories = ["Composants", "Ordinateurs", "Périphériques", "Appareils photos", "TV Hifi Vidéo"];

        for ($i = 1; $i <= 40; $i++) {
            $article = new Article();
            $article = $this->getReference("article$i");

            $category = new Category();
            $category = $this->getReference($categories[rand(0, count($categories) -1)]);

            $properties = new ArticleHasProperty();
            $properties
                ->setArticle($article)
                ->setCategory($category);

            $manager->persist($properties);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ArticleFixtures::class,
            CategoryFixtures::class
        );
    }
}
