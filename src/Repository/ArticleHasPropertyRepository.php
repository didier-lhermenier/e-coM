<?php

namespace App\Repository;

use App\Entity\ArticleHasProperty;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ArticleHasProperty|null find($id, $lockMode = null, $lockVersion = null)
 * @method ArticleHasProperty|null findOneBy(array $criteria, array $orderBy = null)
 * @method ArticleHasProperty[]    findAll()
 * @method ArticleHasProperty[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticleHasPropertyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ArticleHasProperty::class);
    }

    // /**
    //  * @return ArticleHasProperty[] Returns an array of ArticleHasProperty objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ArticleHasProperty
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
