<?php

namespace App\Repository;

use App\Entity\OrderHasArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method OrderHasArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method OrderHasArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method OrderHasArticle[]    findAll()
 * @method OrderHasArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OrderHasArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OrderHasArticle::class);
    }

    // /**
    //  * @return OrderHasArticle[] Returns an array of OrderHasArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('o.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?OrderHasArticle
    {
        return $this->createQueryBuilder('o')
            ->andWhere('o.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
