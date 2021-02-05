<?php

namespace App\Repository;

use App\Entity\InternalEntity;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method InternalEntity|null find($id, $lockMode = null, $lockVersion = null)
 * @method InternalEntity|null findOneBy(array $criteria, array $orderBy = null)
 * @method InternalEntity[]    findAll()
 * @method InternalEntity[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class InternalEntityRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, InternalEntity::class);
    }

    // /**
    //  * @return InternalEntity[] Returns an array of InternalEntity objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?InternalEntity
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
