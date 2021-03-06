<?php

namespace App\Repository;

use App\Entity\Apartment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Apartment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Apartment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Apartment[]    findAll()
 * @method Apartment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ApartmentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Apartment::class);
    }

      /*
      * @return Apartment[] Returns an array of Apartment objects
      */

    public function getAllApartmentsByMilitaryResidenceId($id)
    {
        return $this->createQueryBuilder('a')
            ->leftJoin('a.militaryResidence', 'm')
            ->addSelect('m')
            ->andWhere('m.id = :milId')
            ->setParameter('milId', $id)
            ->leftJoin('a.tenant', 't')
            ->addSelect('t')
            ->leftJoin('t.personInArmy', 'p')
            ->addSelect('p')
            ->leftJoin('p.rank', 'r')
            ->addSelect('r')
            ->getQuery()
            ->getArrayResult()
        ;
    }


    // /**
    //  * @return Apartment[] Returns an array of Apartment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Apartment
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
