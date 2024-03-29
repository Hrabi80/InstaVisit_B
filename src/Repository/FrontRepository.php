<?php

namespace App\Repository;

use App\Entity\Front;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Front|null find($id, $lockMode = null, $lockVersion = null)
 * @method Front|null findOneBy(array $criteria, array $orderBy = null)
 * @method Front[]    findAll()
 * @method Front[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FrontRepository extends ServiceEntityRepository
{
    public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $registry)
    {
        parent::__construct($registry, Front::class);
    }

    // /**
    //  * @return Front[] Returns an array of Front objects
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
    public function findOneBySomeField($value): ?Front
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
