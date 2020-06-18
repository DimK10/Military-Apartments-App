<?php

namespace App\Repository;

use App\Entity\Scoring;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Scoring|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scoring|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scoring[]    findAll()
 * @method Scoring[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScoringRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scoring::class);
    }

    public function findAllMatching(string $query)
    {
//        TODO - Maybe move this query to personInArmy repository?
        return $this->createQueryBuilder('s')
            ->leftJoin('s.personInArmy', 'p')
            ->addSelect('p')
            ->leftJoin('p.unit', 'u')
            ->addSelect('u')
            ->andWhere('u.location LIKE :query')
            ->setParameter('query', '%'.$query.'%')
            ->getQuery()
            ->getResult()
        ;
    }

    // /**
    //  * @return Scoring[] Returns an array of Scoring objects
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
    public function findOneBySomeField($value): ?Scoring
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
