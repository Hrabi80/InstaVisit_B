<?php

namespace App\Repository;

use App\Entity\ForRentM;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method ForRentM|null find($id, $lockMode = null, $lockVersion = null)
 * @method ForRentM|null findOneBy(array $criteria, array $orderBy = null)
 * @method ForRentM[]    findAll()
 * @method ForRentM[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ForRentMRepository extends ServiceEntityRepository
{
    public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $registry)
    {
        parent::__construct($registry, ForRentM::class);
    }

    // /**
    //  * @return ForRentM[] Returns an array of ForRentM objects
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
    public function findOneBySomeField($value): ?ForRentM
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
