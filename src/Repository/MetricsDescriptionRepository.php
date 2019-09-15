<?php
declare(strict_types=1);

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
}
