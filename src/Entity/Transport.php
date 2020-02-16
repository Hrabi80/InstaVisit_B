<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TransportRepository")
 */
class Transport
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $Bus;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $metro;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $train;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $louage;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $louageM;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ToBuy", inversedBy="transport", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=true)
     */
    private $house_id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $BusST;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $metroST;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $trainST;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $louageST;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $taxiST;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ForRentM", inversedBy="transport", cascade={"persist", "remove"})
     */
    private $houseLM_id;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ForRent", inversedBy="transport", cascade={"persist", "remove"})
     */
    private $housenm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBus(): ?int
    {
        return $this->Bus;
    }

    public function setBus(?int $Bus): self
    {
        $this->Bus = $Bus;

        return $this;
    }

    public function getMetro(): ?int
    {
        return $this->metro;
    }

    public function setMetro(?int $metro): self
    {
        $this->metro = $metro;

        return $this;
    }

    public function getTrain(): ?int
    {
        return $this->train;
    }

    public function setTrain(?int $train): self
    {
        $this->train = $train;

        return $this;
    }

    public function getLouage(): ?int
    {
        return $this->louage;
    }

    public function setLouage(?int $louage): self
    {
        $this->louage = $louage;

        return $this;
    }

    public function getLouageM(): ?int
    {
        return $this->louageM;
    }

    public function setLouageM(?int $louageM): self
    {
        $this->louageM = $louageM;

        return $this;
    }

    public function getHouseId(): ?ToBuy
    {
        return $this->house_id;
    }

    public function setHouseId(ToBuy $house_id): self
    {
        $this->house_id = $house_id;

        return $this;
    }

    public function getBusST(): ?string
    {
        return $this->BusST;
    }

    public function setBusST(?string $BusST): self
    {
        $this->BusST = $BusST;

        return $this;
    }

    public function getMetroST(): ?string
    {
        return $this->metroST;
    }

    public function setMetroST(?string $metroST): self
    {
        $this->metroST = $metroST;

        return $this;
    }

    public function getTrainST(): ?string
    {
        return $this->trainST;
    }

    public function setTrainST(?string $trainST): self
    {
        $this->trainST = $trainST;

        return $this;
    }

    public function getLouageST(): ?string
    {
        return $this->louageST;
    }

    public function setLouageST(?string $louageST): self
    {
        $this->louageST = $louageST;

        return $this;
    }

    public function getTaxiST(): ?string
    {
        return $this->taxiST;
    }

    public function setTaxiST(?string $taxiST): self
    {
        $this->taxiST = $taxiST;

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
        $newTransport = $housenm === null ? null : $this;
        if ($newTransport !== $housenm->getTransport()) {
            $housenm->setTransport($newTransport);
        }

        return $this;
    }
}
