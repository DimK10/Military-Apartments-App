<?php

namespace App\Repository;

use App\Entity\PersonInArmy;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PersonInArmy|null find($id, $lockMode = null, $lockVersion = null)
 * @method PersonInArmy|null findOneBy(array $criteria, array $orderBy = null)
 * @method PersonInArmy[]    findAll()
 * @method PersonInArmy[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PersonInArmyRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PersonInArmy::class);
    }

    // /**
    //  * @return PersonInArmy[] Returns an array of PersonInArmy objects
    //  */

    public function findAllNoScoreSameLocation(string $query)
    {
        //TODO - Add asc desc functionality based on rank
        return $this->createQueryBuilder('p')
            ->leftJoin('p.unit', 'u')
            ->addSelect('u')
            ->andWhere('p.scoring is NULL')
            ->andWhere('u.location LIKE :query')
            ->setParameter('query', '%'.$query.'%')
            ->leftJoin('p.rank', 'r')
            ->addSelect('r')
            ->getQuery()
            ->getArrayResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?PersonInArmy
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
