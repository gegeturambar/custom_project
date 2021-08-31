<?php

namespace App\Repository;

use App\Entity\GiftShare;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GiftShare|null find($id, $lockMode = null, $lockVersion = null)
 * @method GiftShare|null findOneBy(array $criteria, array $orderBy = null)
 * @method GiftShare[]    findAll()
 * @method GiftShare[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GiftShareRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GiftShare::class);
    }

    // /**
    //  * @return GiftShare[] Returns an array of GiftShare objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GiftShare
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
