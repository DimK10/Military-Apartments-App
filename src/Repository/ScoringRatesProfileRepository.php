<?php

namespace App\Repository;

use App\Entity\ScoringRatesProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ScoringRatesProfile|null find($id, $lockMode = null, $lockVersion = null)
 * @method ScoringRatesProfile|null findOneBy(array $criteria, array $orderBy = null)
 * @method ScoringRatesProfile[]    findAll()
 * @method ScoringRatesProfile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoringRatesProfileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ScoringRatesProfile::class);
    }

    // /**
    //  * @return ScoringRatesProfile[] Returns an array of ScoringRatesProfile objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ScoringRatesProfile
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
