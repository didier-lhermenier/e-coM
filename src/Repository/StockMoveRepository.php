<?php

namespace App\Repository;

use App\Entity\StockMove;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StockMove|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockMove|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockMove[]    findAll()
 * @method StockMove[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockMoveRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StockMove::class);
    }

    // /**
    //  * @return StockMove[] Returns an array of StockMove objects
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
    public function findOneBySomeField($value): ?StockMove
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
