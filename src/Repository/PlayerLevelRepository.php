<?php

namespace App\Repository;

use App\Entity\PlayerLevel;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlayerLevel|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlayerLevel|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlayerLevel[]    findAll()
 * @method PlayerLevel[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlayerLevelRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlayerLevel::class);
    }

    // /**
    //  * @return PlayerLevel[] Returns an array of PlayerLevel objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlayerLevel
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
