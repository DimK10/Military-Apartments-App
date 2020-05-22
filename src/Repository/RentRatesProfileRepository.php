<?php

namespace App\Repository;

use App\Entity\RentRatesProfile;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RentRatesProfile|null find($id, $lockMode = null, $lockVersion = null)
 * @method RentRatesProfile|null findOneBy(array $criteria, array $orderBy = null)
 * @method RentRatesProfile[]    findAll()
 * @method RentRatesProfile[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RentRatesProfileRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RentRatesProfile::class);
    }

    // /**
    //  * @return RentRatesProfile[] Returns an array of RentRatesProfile objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RentRatesProfile
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
