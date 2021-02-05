<?php

namespace App\Repository;

use App\Entity\CommercialEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CommercialEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method CommercialEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method CommercialEntity[]    findAll()
 * @method CommercialEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CommercialEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CommercialEntity::class);
    }

    // /**
    //  * @return CommercialEntity[] Returns an array of CommercialEntity objects
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
    public function findOneBySomeField($value): ?CommercialEntity
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
