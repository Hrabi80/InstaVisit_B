<?php

namespace App\Repository;

use App\Entity\EquipSalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method EquipSalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method EquipSalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method EquipSalle[]    findAll()
 * @method EquipSalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EquipSalleRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, EquipSalle::class);
    }
    /**
      * @return EquipeSalle[]
      */

    public function findEqpSalle($id){
        $qb = $this->createQueryBuilder('Qr');

        $qb
            ->select('Qr')
            ->leftJoin('Qr.salle_id','p')
            ->where('Qr.salle_id ='.$id);
               
       return $qb->getQuery()->getArrayResult();
        //return $qb->getQuery()->execute();
    }

    // /**
    //  * @return EquipSalle[] Returns an array of EquipSalle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EquipSalle
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
