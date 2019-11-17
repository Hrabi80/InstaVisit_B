<?php

namespace App\Repository;

use App\Entity\Couchage;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Couchage|null find($id, $lockMode = null, $lockVersion = null)
 * @method Couchage|null findOneBy(array $criteria, array $orderBy = null)
 * @method Couchage[]    findAll()
 * @method Couchage[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CouchageRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Couchage::class);
    }

    /**
      * @return Couchage[] 
      */
    
    public function findCou($id){
        $qb = $this->createQueryBuilder('Qr');

        $qb
            ->select('Qr')
            ->leftJoin('Qr.house_id','p')
            ->where('Qr.house_id ='.$id);
               
       return $qb->getQuery()->getArrayResult();
        //return $qb->getQuery()->execute();
    }
}
