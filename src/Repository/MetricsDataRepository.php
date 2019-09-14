<?php

namespace App\Repository;

use App\Entity\MetricsData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method MetricsData|null find($id, $lockMode = null, $lockVersion = null)
 * @method MetricsData|null findOneBy(array $criteria, array $orderBy = null)
 * @method MetricsData[]    findAll()
 * @method MetricsData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MetricsDataRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MetricsData::class);
    }

    // /**
    //  * @return MetricsData[] Returns an array of MetricsData objects
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
    public function findOneBySomeField($value): ?MetricsData
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
