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
            $catLetter = chr(64 + rand(1, 10));

            $category = new Category();
            $category = $this->getReference("category" . $catLetter);

            // On va donner entre 0 et 3 sous-cat au hasard parmi les 3 sous-cat disponibles
            $numSubCats = rand(0, 3);

            // Initialisation de la boucle
            $loop = 0;

            // On fait autant de tours que de sous-cat ($numSubCats)
            do {
                $subCategory = new SubCategory();
                $subCategory = $numSubCats > 0 ? $this->getSubCategory($catLetter) : null;

                $properties = new ArticleHasProperty();
                $properties
                    ->setArticle($article)
                    ->setCategory($category)
                    ->setSubCategory($subCategory);

                $manager->persist($properties);

                $loop++;
            } while ($loop < $numSubCats);
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
    public function getSubCategory(string $catLetter)
    {
        // On détermine un chiffre au hasard entre 1 et 3
        $digit = strval(rand(1, 3));
        return $this->getReference("subCategory" . $catLetter . $digit);
    }
}
