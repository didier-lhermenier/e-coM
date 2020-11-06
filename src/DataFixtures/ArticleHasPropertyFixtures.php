<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\ArticleHasProperty;
use App\Entity\Category;
use App\Entity\SubCategory;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ArticleHasPropertyFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 40; $i++) {
            $article = new Article();
            $article = $this->getReference("article$i");

            // On détermine une lettre au hasard (de A à J) pour la catégorie
            $catLetter = chr(64+rand(1, 10));

            $category = new Category();
            $category = $this->getReference("category".$catLetter);

            $subCategory = new SubCategory();
            $subCategory = $this->getSubCategory($catLetter);

            $properties = new ArticleHasProperty();
            $properties
                ->setArticle($article)
                ->setCategory($category)
                ->setSubCategory($subCategory);

            $manager->persist($properties);
        }

        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ArticleFixtures::class,
            CategoryFixtures::class,
            SubCategoryFixtures::class
        );
    }

    /**
     * Permet de trouver une sous-catégorie au hasard parmi celles existantes. 
     *
     * @param string $catLetter
     */
    public function getSubCategory(string $catLetter) {
        // On détermine si on a ou pas une sous-cat
        $subCatValue = rand(0, 3);
        // Soit on a une sous cat (de 1 à 3), soit on n'en a pas (=>null)
        if ($subCatValue > 0){
            // On détermine un chiffre au hasard entre 1 et 3
            $digit = strval(rand(1, 3));
            return $this->getReference("subCategory".$catLetter.$digit);
        }
        else return null;
    }
}
