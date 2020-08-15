<?php

namespace App\Repository;

use App\Entity\MilitaryRanking;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MilitaryRanking|null find($id, $lockMode = null, $lockVersion = null)
 * @method MilitaryRanking|null findOneBy(array $criteria, array $orderBy = null)
 * @method MilitaryRanking[]    findAll()
 * @method MilitaryRanking[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MilitaryRankingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MilitaryRanking::class);
    }

    // /**
    //  * @return MilitaryRanking[] Returns an array of MilitaryRanking objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MilitaryRanking
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
