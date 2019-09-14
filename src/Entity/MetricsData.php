<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MetricsDataRepository")
 */
class MetricsData
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Metrics", inversedBy="metricsData")
     * @ORM\JoinColumn(nullable=false)
     */
    private $metrics;

    /**
     * @ORM\Column(type="float")
     */
    private $value;

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

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
     * @return MetricsData
     */
    public function setMetrics(?Metrics $metrics): self
    {
        $this->metrics = $metrics;

        return $this;
    }

    /**
     * @return float|null
     */
    public function getValue(): ?float
    {
        return $this->value;
    }

    /**
     * @param float $value
     * @return MetricsData
     */
    public function setValue(float $value): self
    {
        $this->value = $value;

        return $this;
    }

    /**
     * @ORM\PrePersist()
     * @throws \Exception
     */
    public function createdAt()
    {
        $this->createdAt = new \DateTime('now');
    }

    /**
     * @return \DateTimeInterface|null
     */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    /**
     * @param \DateTimeInterface $createdAt
     * @return MetricsData
     */
    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }
}
