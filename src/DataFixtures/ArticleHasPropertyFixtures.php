<?php

namespace App\DataFixtures;

use App\Entity\Article;
use App\Entity\ArticleHasProperty;
use App\Entity\Category;
use App\Entity\Promotion;
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

            // Initialisation du compteur de boucle sous-cat
            $loopSubCat = 0;

            // Initialisation de la liste sous-catégorie
            $listSubCats = [];

            // Initialisation de la liste des promotions (parmi les n promotions possibles pour cet article)
            $promotions = $this->getRandomPromotions(20);

            // On fait autant de tours que de sous-cat ($numSubCats)
            do {
                $subCategory = new SubCategory();
                $subCategory = $numSubCats > 0 ? $this->getSubCategory($catLetter, $listSubCats) : null;

                // Initialisation du compteur de boucle promo
                $loopPromo = 0;

                // On fait autant de tours que de promotions ($promotions)
                do {
                    $promotion = new Promotion();
                    $promotion = !empty($promotions) ? $this->getReference($promotions[$loopPromo]) : null;

                    // On persiste les données
                    $this->persist($manager, $article, $category, $subCategory, $promotion);

                    $loopPromo++;
                } while ($loopPromo < count($promotions));

                $loopSubCat++;
            } while ($loopSubCat < $numSubCats);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return array(
            ArticleFixtures::class,
            CategoryFixtures::class,
            SubCategoryFixtures::class,
            PromotionFixtures::class
        );
    }

    /**
     * Permet de trouver une sous-catégorie au hasard parmi celles existantes. 
     * Passage par référence & en paramètre de la méthode pour incrémenter le tableau listSubCats dans la boucle do while
     *
     * @param string $catLetter
     * @param array &$listSubCats
     */
    public function getSubCategory(string $catLetter, array &$listSubCats): SubCategory
    {
        // Boucler tant que la valeur trouvée est dans la liste fournie
        do {
            // On détermine un chiffre au hasard entre 1 et 3
            $digit = strval(rand(1, 3));

            // On regarde si le chiffre est dans le tableau fourni
        } while (in_array($digit, $listSubCats));

        // Ajouter le chiffre dans le tableau
        $listSubCats[] = $digit;

        // Retourner la sous-cat
        return $this->getReference("subCategory" . $catLetter . $digit);
    }

    /**
     * Permet de retourner une liste de promotions ou un tableau vide si le hasard le décide
     */
    public function getRandomPromotions(float $lucky): array
    {
        // On initialise le tableau des promotions à retourner
        $promotions = [];

        // on aura $lucky % des articles qui auront droit à une promotion
        if (rand(0, 100) <= $lucky) {
            // Liste des références de promotions possibles ( PromotionFixtures => addReference... )
            $references = ["launch bf 2020", "final bf 2020", "before christmas", "after christmas"];

            // On décide du nombre n de promotions à attribuer (de 1 à x éléments contenus dans $references)
            $n = rand(1, count($references));

            // On génère un tableau contenant les n index au hasard de la liste $references
            $referenceKeys = array_rand($references, $n);

            // Si n = 1, on doit convertir le résultat de type entier en tableau ( cf doc array_rand() )
            if (gettype($referenceKeys) == "integer") $referenceKeys = [$referenceKeys];

            // On génère notre liste de promotions à partir de notre liste d'index
            foreach ($referenceKeys as $key) {
                $promotions[] = $references[$key];
            }
        }

        // On retourne le tableau de promotions
        return $promotions;
    }

    /**
     * Permet de persister les données de fixture
     */
    public function persist(ObjectManager $manager, Article $article, Category $category, ?SubCategory $subCategory, ?Promotion $promotion): void
    {
        $properties = new ArticleHasProperty();
        $properties
            ->setArticle($article)
            ->setCategory($category)
            ->setSubCategory($subCategory)
            ->setPromotion($promotion);

        $manager->persist($properties);
    }
}
