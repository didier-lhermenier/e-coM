<?php

namespace App\Repository;

use App\Entity\PromotionEvent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PromotionEvent|null find($id, $lockMode = null, $lockVersion = null)
 * @method PromotionEvent|null findOneBy(array $criteria, array $orderBy = null)
 * @method PromotionEvent[]    findAll()
 * @method PromotionEvent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PromotionEventRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PromotionEvent::class);
    }

    // /**
    //  * @return PromotionEvent[] Returns an array of PromotionEvent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PromotionEvent
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
