<?php

namespace App\Repository;

use App\Entity\MilitaryResidenceType;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MilitaryResidenceType|null find($id, $lockMode = null, $lockVersion = null)
 * @method MilitaryResidenceType|null findOneBy(array $criteria, array $orderBy = null)
 * @method MilitaryResidenceType[]    findAll()
 * @method MilitaryResidenceType[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MilitaryResidenceTypeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MilitaryResidenceType::class);
    }

    // /**
    //  * @return MilitaryResidenceType[] Returns an array of MilitaryResidenceType objects
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
    public function findOneBySomeField($value): ?MilitaryResidenceType
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
