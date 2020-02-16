<?php

namespace App\Repository;

use App\Entity\Vcar;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Vcar|null find($id, $lockMode = null, $lockVersion = null)
 * @method Vcar|null findOneBy(array $criteria, array $orderBy = null)
 * @method Vcar[]    findAll()
 * @method Vcar[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class VcarRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Vcar::class);
    }

   /**
     * @return Vcar[] Returns an array of Vcar objects
    */
      public function findCave($id)
    {
      $qb = $this->createQueryBuilder('Qr');

        $qb
            ->select('Qr')
            ->leftJoin('Qr.ID_house','p')
            ->where('Qr.ID_house ='.$id);

         return $qb->getQuery()->execute();
      // return $qb->getQuery()->getArrayResult();
    }

     /**
     * @return Vcar[] Returns an array of Vcar objects
    */
      public function findCaveLM($id)
    {
      $qb = $this->createQueryBuilder('Qr');

        $qb
            ->select('Qr')
            ->leftJoin('Qr.houseLM_id','p')
            ->where('Qr.houseLM_id ='.$id);

         return $qb->getQuery()->execute();
      // return $qb->getQuery()->getArrayResult();
    }

    /**
    * @return Vcar[] Returns an array of Vcar objects
   */
     public function findCaveLNM($id)
   {
     $qb = $this->createQueryBuilder('Qr');

       $qb
           ->select('Qr')
           ->leftJoin('Qr.housenm','p')
           ->where('Qr.housenm ='.$id);

        return $qb->getQuery()->execute();
     // return $qb->getQuery()->getArrayResult();
   }

    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('v.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Vcar
    {
        return $this->createQueryBuilder('v')
            ->andWhere('v.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
