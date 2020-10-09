<?php

namespace App\Repository;

use App\Entity\LineArticle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method LineArticle|null find($id, $lockMode = null, $lockVersion = null)
 * @method LineArticle|null findOneBy(array $criteria, array $orderBy = null)
 * @method LineArticle[]    findAll()
 * @method LineArticle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LineArticleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, LineArticle::class);
    }

    // /**
    //  * @return LineArticle[] Returns an array of LineArticle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?LineArticle
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
