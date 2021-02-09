<?php

namespace App\Repository;

use App\Entity\AppointmentDetails;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method AppointmentDetails|null find($id, $lockMode = null, $lockVersion = null)
 * @method AppointmentDetails|null findOneBy(array $criteria, array $orderBy = null)
 * @method AppointmentDetails[]    findAll()
 * @method AppointmentDetails[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AppointmentDetailsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AppointmentDetails::class);
    }

    // /**
    //  * @return AppointmentDetails[] Returns an array of AppointmentDetails objects
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
    public function findOneBySomeField($value): ?AppointmentDetails
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
