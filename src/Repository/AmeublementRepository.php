<?php

namespace App\Repository;

use App\Entity\Ameublement;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ameublement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ameublement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ameublement[]    findAll()
 * @method Ameublement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AmeublementRepository extends ServiceEntityRepository
{
    public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $registry)
    {
        parent::__construct($registry, Ameublement::class);
    }

    /**
      * @return Ameublement[]
      */

    public function findAm($id){
        $qb = $this->createQueryBuilder('Qr');

        $qb
            ->select('Qr')
            ->leftJoin('Qr.house_id','p')
            ->where('Qr.house_id ='.$id);

       return $qb->getQuery()->getArrayResult();
        //return $qb->getQuery()->execute();
    }

    // /**
    //  * @return Ameublement[] Returns an array of Ameublement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Ameublement
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
