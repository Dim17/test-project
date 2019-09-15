<?php
declare(strict_types=1);

namespace App\Repository;

use App\Entity\MetricsData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\DBAL\Connection;
use Doctrine\ORM\Query\ResultSetMapping;

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

    public function getReport(array $params)
    {
        $query = 'SELECT date_trunc(:reportPeriod, created_at) as report_period,
        SUM(metrics_data.value) as sum_value,
        metrics.name
        FROM metrics_data
        JOIN metrics ON metrics_data.metrics_id = metrics.id
        WHERE created_at BETWEEN :from and :to
        AND metrics.name IN (:metrics)
        GROUP BY report_period, metrics.name
        ORDER BY report_period';

        $rsm = new ResultSetMapping();
        $rsm->addScalarResult('report_period', 'report_period');
        $rsm->addScalarResult('sum_value', 'sum_value');
        $rsm->addScalarResult('name', 'name');

        $query = $this->getEntityManager()->createNativeQuery($query, $rsm);

        $query->setParameters(['from'         => $params['from'],
                               'to'           => $params['to'],
                               'reportPeriod' => $params['group_by']]);
        $query->setParameter('metrics', $params['metrics'], Connection::PARAM_STR_ARRAY);

        return $query->getResult();
    }
}
