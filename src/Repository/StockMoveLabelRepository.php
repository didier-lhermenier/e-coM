<?php

namespace App\Repository;

use App\Entity\StockMoveLabel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StockMoveLabel|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockMoveLabel|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockMoveLabel[]    findAll()
 * @method StockMoveLabel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockMoveLabelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StockMoveLabel::class);
    }

    // /**
    //  * @return StockMoveLabel[] Returns an array of StockMoveLabel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StockMoveLabel
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
