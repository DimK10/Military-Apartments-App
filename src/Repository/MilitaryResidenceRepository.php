<?php

namespace App\Repository;

use App\Entity\MilitaryResidence;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MilitaryResidence|null find($id, $lockMode = null, $lockVersion = null)
 * @method MilitaryResidence|null findOneBy(array $criteria, array $orderBy = null)
 * @method MilitaryResidence[]    findAll()
 * @method MilitaryResidence[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MilitaryResidenceRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MilitaryResidence::class);
    }

    // /**
    //  * @return MilitaryResidence[] Returns an array of MilitaryResidence objects
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
    public function findOneBySomeField($value): ?MilitaryResidence
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
