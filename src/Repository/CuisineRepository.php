<?php

namespace App\Repository;

use App\Entity\Cuisine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Cuisine|null find($id, $lockMode = null, $lockVersion = null)
 * @method Cuisine|null findOneBy(array $criteria, array $orderBy = null)
 * @method Cuisine[]    findAll()
 * @method Cuisine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CuisineRepository extends ServiceEntityRepository
{
    public function __construct(\Doctrine\Common\Persistence\ManagerRegistry $registry)
    {
        parent::__construct($registry, Cuisine::class);
    }

    /**
      * @return Transport[]
      */

    public function findCui($id){
        $qb = $this->createQueryBuilder('Qr');

        $qb
            ->select('Qr')
            ->leftJoin('Qr.house_id','p')
            ->where('Qr.house_id ='.$id);

       return $qb->getQuery()->getArrayResult();
        //return $qb->getQuery()->execute();
    }
}
