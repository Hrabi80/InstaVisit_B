<?php

namespace App\Repository;

use App\Entity\InstaResto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InstaResto|null find($id, $lockMode = null, $lockVersion = null)
 * @method InstaResto|null findOneBy(array $criteria, array $orderBy = null)
 * @method InstaResto[]    findAll()
 * @method InstaResto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InstaRestoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InstaResto::class);
    }

    // /**
    //  * @return InstaResto[] Returns an array of InstaResto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InstaResto
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
