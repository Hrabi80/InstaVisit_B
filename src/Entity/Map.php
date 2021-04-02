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

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Salle", inversedBy="map", cascade={"persist", "remove"})
     */
    private $salle_id;

    /**
     * @ORM\OneToOne(targetEntity=Coffe::class, mappedBy="map", cascade={"persist", "remove"})
     */
    private $coffe_id;

    /**
     * @ORM\OneToOne(targetEntity=InstaResto::class, mappedBy="map", cascade={"persist", "remove"})
     */
    private $resto_id;

    /**
     * @ORM\OneToOne(targetEntity=InstaCulure::class, mappedBy="map", cascade={"persist", "remove"})
     */
    private $culture_id;

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

    public function getSalleId(): ?Salle
    {
        return $this->salle_id;
    }

    public function setSalleId(?Salle $salle_id): self
    {
        $this->salle_id = $salle_id;

        return $this;
    }

    public function getCoffeId(): ?Coffe
    {
        return $this->coffe_id;
    }

    public function setCoffeId(?Coffe $coffe_id): self
    {
        $this->coffe_id = $coffe_id;

        // set (or unset) the owning side of the relation if necessary
        $newMap = null === $coffe_id ? null : $this;
        if ($coffe_id->getMap() !== $newMap) {
            $coffe_id->setMap($newMap);
        }

        return $this;
    }

    public function getInstaResto(): ?InstaResto
    {
        return $this->resto_id;
    }

    public function setInstaResto(?InstaResto $resto_id): self
    {
        $this->resto_id = $resto_id;

        // set (or unset) the owning side of the relation if necessary
        $newMap = null === $resto_id ? null : $this;
        if ($resto_id->getMap() !== $newMap) {
            $resto_id->setMap($newMap);
        }

        return $this;
    }

    public function getInstaCulure(): ?InstaCulure
    {
        return $this->culture_id;
    }

    public function setInstaCulure(?InstaResto $culture_id): self
    {
        $this->culture_id = $culture_id;

        // set (or unset) the owning side of the relation if necessary
        $newMap = null === $culture_id ? null : $this;
        if ($culture_id->getMap() !== $newMap) {
            $culture_id->setMap($newMap);
        }

        return $this;
    }
}
