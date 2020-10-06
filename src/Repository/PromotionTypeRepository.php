<?php

namespace App\Repository;

use App\Entity\PromotionType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PromotionType|null find($id, $lockMode = null, $lockVersion = null)
 * @method PromotionType|null findOneBy(array $criteria, array $orderBy = null)
 * @method PromotionType[]    findAll()
 * @method PromotionType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PromotionTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PromotionType::class);
    }

    // /**
    //  * @return PromotionType[] Returns an array of PromotionType objects
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
    public function findOneBySomeField($value): ?PromotionType
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
