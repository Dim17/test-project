<?php
declare(strict_types=1);


namespace App\Services;


use App\Entity\MetricsData;
use App\Exceptions\NothingFoundException;
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

        if (!$report) {
            throw new NothingFoundException();
        }

        return $report;
    }
}