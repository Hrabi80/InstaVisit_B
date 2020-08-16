<?php

namespace App\Repository;

use App\Entity\Techn;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Techn|null find($id, $lockMode = null, $lockVersion = null)
 * @method Techn|null findOneBy(array $criteria, array $orderBy = null)
 * @method Techn[]    findAll()
 * @method Techn[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TechnRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Techn::class);
    }
    /**
      * @return Techn[]
      */

    public function findFiche($id){
        $qb = $this->createQueryBuilder('Qr');
        $qb
            ->select('Qr')
            ->leftJoin('Qr.salle_id','p')
            ->where('Qr.salle_id ='.$id);

       return $qb->getQuery()->getArrayResult();
        //return $qb->getQuery()->execute();
    }
    // /**
    //  * @return Techn[] Returns an array of Techn objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Techn
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}