<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MetricsRepository")
 */
class Metrics
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MetricsDescription", mappedBy="metrics")
     */
    private $metricsDescriptions;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\MetricsData", mappedBy="metrics", orphanRemoval=true)
     */
    private $metricsData;

    /**
     * Metrics constructor.
     */
    public function __construct()
    {
        $this->metricsDescriptions = new ArrayCollection();
        $this->metricsData = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
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
     * @return Metrics
     */
    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|MetricsDescription[]
     */
    public function getMetricsDescriptions(): Collection
    {
        return $this->metricsDescriptions;
    }

    /**
     * @param MetricsDescription $metricsDescription
     * @return Metrics
     */
    public function addMetricsDescription(MetricsDescription $metricsDescription): self
    {
        if (!$this->metricsDescriptions->contains($metricsDescription)) {
            $this->metricsDescriptions[] = $metricsDescription;
            $metricsDescription->setMetrics($this);
        }

        return $this;
    }

    /**
     * @param MetricsDescription $metricsDescription
     * @return Metrics
     */
    public function removeMetricsDescription(MetricsDescription $metricsDescription): self
    {
        if ($this->metricsDescriptions->contains($metricsDescription)) {
            $this->metricsDescriptions->removeElement($metricsDescription);
            // set the owning side to null (unless already changed)
            if ($metricsDescription->getMetrics() === $this) {
                $metricsDescription->setMetrics(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|MetricsData[]
     */
    public function getMetricsData(): Collection
    {
        return $this->metricsData;
    }

    /**
     * @param MetricsData $metricsData
     * @return Metrics
     */
    public function addMetricsData(MetricsData $metricsData): self
    {
        if (!$this->metricsData->contains($metricsData)) {
            $this->metricsData[] = $metricsData;
            $metricsData->setMetrics($this);
        }

        return $this;
    }

    /**
     * @param MetricsData $metricsData
     * @return Metrics
     */
    public function removeMetricsData(MetricsData $metricsData): self
    {
        if ($this->metricsData->contains($metricsData)) {
            $this->metricsData->removeElement($metricsData);
            // set the owning side to null (unless already changed)
            if ($metricsData->getMetrics() === $this) {
                $metricsData->setMetrics(null);
            }
        }

        return $this;
    }
}
