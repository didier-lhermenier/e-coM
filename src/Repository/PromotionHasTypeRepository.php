<?php

namespace App\Repository;

use App\Entity\PromotionHasType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PromotionHasType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PromotionHasType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PromotionHasType[]    findAll()
 * @method PromotionHasType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PromotionHasTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PromotionHasType::class);
    }

    // /**
    //  * @return PromotionHasType[] Returns an array of PromotionHasType objects
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
    public function findOneBySomeField($value): ?PromotionHasType
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
