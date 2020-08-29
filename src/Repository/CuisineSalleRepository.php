<?php

namespace App\Repository;

use App\Entity\CuisineSalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CuisineSalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method CuisineSalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method CuisineSalle[]    findAll()
 * @method CuisineSalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuisineSalleRepository extends ServiceEntityRepository
{
    public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $registry)
    {
        parent::__construct($registry, CuisineSalle::class);
    }

    /**
      * @return CuisineSalle[]
      */

    public function findCuisine($id){
        $qb = $this->createQueryBuilder('Qr');

        $qb
            ->select('Qr')
            ->leftJoin('Qr.salle_id','p')
            ->where('Qr.salle_id ='.$id);

       return $qb->getQuery()->getArrayResult();
        //return $qb->getQuery()->execute();
    }
    // /**
    //  * @return CuisineSalle[] Returns an array of CuisineSalle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CuisineSalle
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
