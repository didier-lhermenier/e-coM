<?php

namespace App\Repository;

use App\Entity\DocumentHasType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method DocumentHasType|null find($id, $lockMode = null, $lockVersion = null)
 * @method DocumentHasType|null findOneBy(array $criteria, array $orderBy = null)
 * @method DocumentHasType[]    findAll()
 * @method DocumentHasType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class DocumentHasTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, DocumentHasType::class);
    }

    // /**
    //  * @return DocumentHasType[] Returns an array of DocumentHasType objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('d.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?DocumentHasType
    {
        return $this->createQueryBuilder('d')
            ->andWhere('d.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
