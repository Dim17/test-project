<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MetricsDescriptionRepository")
 * @ORM\Table(name="metrics_descriptions")
 */
class MetricsDescription
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Metrics", inversedBy="metricsDescriptions")
     * @ORM\JoinColumn(nullable=false)
     */
    private $metrics;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $detailedInformation;

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Metrics|null
     */
    public function getMetrics(): ?Metrics
    {
        return $this->metrics;
    }

    /**
     * @param Metrics|null $metrics
     * @return MetricsDescription
     */
    public function setMetrics(?Metrics $metrics): self
    {
        $this->metrics = $metrics;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return MetricsDescription
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getDetailedInformation(): ?string
    {
        return $this->detailedInformation;
    }

    /**
     * @param string $detailedInformation
     * @return MetricsDescription
     */
    public function setDetailedInformation(string $detailedInformation): self
    {
        $this->detailedInformation = $detailedInformation;

        return $this;
    }
}
