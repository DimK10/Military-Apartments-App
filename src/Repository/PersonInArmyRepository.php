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
