<?php

namespace App\Repository;

use App\Entity\MetricsDescription;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MetricsDescription|null find($id, $lockMode = null, $lockVersion = null)
 * @method MetricsDescription|null findOneBy(array $criteria, array $orderBy = null)
 * @method MetricsDescription[]    findAll()
 * @method MetricsDescription[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetricsDescriptionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MetricsDescription::class);
    }

    // /**
    //  * @return MetricsDescription[] Returns an array of MetricsDescription objects
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
    public function findOneBySomeField($value): ?MetricsDescription
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
