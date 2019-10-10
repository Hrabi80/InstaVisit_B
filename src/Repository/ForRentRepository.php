<?php

namespace App\Repository;

use App\Entity\ForRent;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ForRent|null find($id, $lockMode = null, $lockVersion = null)
 * @method ForRent|null findOneBy(array $criteria, array $orderBy = null)
 * @method ForRent[]    findAll()
 * @method ForRent[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForRentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, ForRent::class);
    }

    // /**
    //  * @return ForRent[] Returns an array of ForRent objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ForRent
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
