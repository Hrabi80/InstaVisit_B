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
     * @ORM\JoinColumn(nullable=true)
     */
    private $house_id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ForRentM", inversedBy="map", cascade={"persist", "remove"})
     */
    private $houseLM_id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ForRent", inversedBy="map", cascade={"persist", "remove"})
     */
    private $housenm;

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

    public function getHouseLMId(): ?ForRentM
    {
        return $this->houseLM_id;
    }

    public function setHouseLMId(?ForRentM $houseLM_id): self
    {
        $this->houseLM_id = $houseLM_id;

        return $this;
    }

    public function getHousenm(): ?ForRent
    {
        return $this->housenm;
    }

    public function setHousenm(?ForRent $housenm): self
    {
        $this->housenm = $housenm;

        // set (or unset) the owning side of the relation if necessary
        $newMap = $housenm === null ? null : $this;
        if ($newMap !== $housenm->getMap()) {
            $housenm->setMap($newMap);
        }

        return $this;
    }
}
