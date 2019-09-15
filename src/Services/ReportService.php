<?php


namespace App\Services;


use App\Entity\MetricsData;
use Doctrine\ORM\EntityManagerInterface;

class ReportService
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getReport(array $params)
    {
        $report = $this->entityManager->getRepository(MetricsData::class)->getReport($params);

        return $report;
    }
}