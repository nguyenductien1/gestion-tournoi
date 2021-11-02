<?php

namespace App\Repository;

use App\Entity\TypeGame;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TypeGame|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeGame|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeGame[]    findAll()
 * @method TypeGame[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeGameRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TypeGame::class);
    }

    // /**
    //  * @return TypeGame[] Returns an array of TypeGame objects
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
    public function findOneBySomeField($value): ?TypeGame
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
