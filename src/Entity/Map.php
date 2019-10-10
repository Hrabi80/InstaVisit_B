<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MapRepository")
 */
class Map
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=800, nullable=true)
     */
    private $map;

    /**
     * @ORM\Column(type="string", length=800, nullable=true)
     */
    private $virtualTour;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ToBuy", inversedBy="map", cascade={"persist", "remove"})
     */
    private $house_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMap(): ?string
    {
        return $this->map;
    }

    public function setMap(?string $map): self
    {
        $this->map = $map;

        return $this;
    }

    public function getVirtualTour(): ?string
    {
        return $this->virtualTour;
    }

    public function setVirtualTour(?string $virtualTour): self
    {
        $this->virtualTour = $virtualTour;

        return $this;
    }

    public function getHouseId(): ?ToBuy
    {
        return $this->house_id;
    }

    public function setHouseId(?ToBuy $house_id): self
    {
        $this->house_id = $house_id;

        return $this;
    }
}
