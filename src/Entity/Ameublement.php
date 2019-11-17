<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\AmeublementRepository")
 */
class Ameublement 
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
    private $canape;

    /**
     * @ORM\Column(type="integer")
     */
    private $mytable;

    /**
     * @ORM\Column(type="integer")
     */
    private $chaise;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $MyTV;

    /**
     * @ORM\Column(type="integer")
     */
    private $bureau;

    /**
     * @ORM\Column(type="integer")
     */
    private $dressing;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ForRentM", inversedBy="ameublement", cascade={"persist", "remove"})
     */
    private $house_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCanape(): ?int
    {
        return $this->canape;
    }

    public function setCanape(?int $canape): self
    {
        $this->canape = $canape;

        return $this;
    }

    public function getMytable(): ?int
    {
        return $this->mytable;
    }

    public function setMytable(int $mytable): self
    {
        $this->mytable = $mytable;

        return $this;
    }

    public function getChaise(): ?int
    {
        return $this->chaise;
    }

    public function setChaise(int $chaise): self
    {
        $this->chaise = $chaise;

        return $this;
    }

    public function getMyTV(): ?int
    {
        return $this->MyTV;
    }

    public function setMyTV(?int $MyTV): self
    {
        $this->MyTV = $MyTV;

        return $this;
    }

    public function getBureau(): ?int
    {
        return $this->bureau;
    }

    public function setBureau(int $bureau): self
    {
        $this->bureau = $bureau;

        return $this;
    }

    public function getDressing(): ?int
    {
        return $this->dressing;
    }

    public function setDressing(int $dressing): self
    {
        $this->dressing = $dressing;

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
