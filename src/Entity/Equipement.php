<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipementRepository")
 */
class Equipement 
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean")
     */
    private $toilette;

    /**
     * @ORM\Column(type="boolean")
     */
    private $machine;

    /**
     * @ORM\Column(type="boolean")
     */
    private $internet;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $boite;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $interphone;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lavelange;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ForRentM", inversedBy="equipement", cascade={"persist", "remove"})
     */
    private $house_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getToilette(): ?bool
    {
        return $this->toilette;
    }

    public function setToilette(bool $toilette): self
    {
        $this->toilette = $toilette;

        return $this;
    }

    public function getMachine(): ?bool
    {
        return $this->machine;
    }

    public function setMachine(bool $machine): self
    {
        $this->machine = $machine;

        return $this;
    }

    public function getInternet(): ?bool
    {
        return $this->internet;
    }

    public function setInternet(bool $internet): self
    {
        $this->internet = $internet;

        return $this;
    }

    public function getBoite(): ?bool
    {
        return $this->boite;
    }

    public function setBoite(?bool $boite): self
    {
        $this->boite = $boite;

        return $this;
    }

    public function getInterphone(): ?bool
    {
        return $this->interphone;
    }

    public function setInterphone(?bool $interphone): self
    {
        $this->interphone = $interphone;

        return $this;
    }

    public function getLavelange(): ?bool
    {
        return $this->lavelange;
    }

    public function setLavelange(?bool $lavelange): self
    {
        $this->lavelange = $lavelange;

        return $this;
    }

    public function getHouseId(): ?ForRentM
    {
        return $this->house_id;
    }

    public function setHouseId(?ForRentM $house_id): self
    {
        $this->house_id = $house_id;

        return $this;
    }
    
   
}
