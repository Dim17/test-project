<?php
declare(strict_types=1);

namespace App\DataFixtures;

use App\Entity\Metrics;
use App\Entity\MetricsData;
use App\Entity\MetricsDescription;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class MetricsFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 50; $i++) {
            $metrics = new Metrics();
            $metrics->setName('metrics' . $i);

            $manager->persist($metrics);

            $metricsDescription = $this->generateMetricsDescription($metrics, $i);

            $manager->persist($metricsDescription);

            for ($j = 0; $j < 50; $j++) {
                $metricsData = new MetricsData();
                $metricsData->setMetrics($metrics);
                $metricsData->setValue(rand(20, 5000));
                $metricsData->setCreatedAt($this->generateDate());

                $manager->persist($metricsData);
            }
        }

        $manager->flush();
    }

    private function generateDate()
    {
        $start = strtotime('2019-01-01');

        $end = strtotime('2019-09-15');

        $timestamp = mt_rand($start, $end);

        return (new \DateTime())->setTimestamp($timestamp);
    }

    private function generateMetricsDescription(Metrics $metrics, int $i): MetricsDescription
    {
        $metricsDescription = new MetricsDescription();
        $metricsDescription->setMetrics($metrics);
        $metricsDescription->setName('Name' . $i);
        $metricsDescription->setDetailedInformation('Info' . $i);

        return $metricsDescription;
    }
}
