<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CuisineSalleRepository")
 */
class CuisineSalle
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
    private $four;

    /**
     * @ORM\Column(type="boolean")
     */
    private $plaque;

    /**
     * @ORM\Column(type="boolean")
     */
    private $frigo;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bac;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Salle", inversedBy="cuisine", cascade={"persist", "remove"})
     */
    private $salle_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFour(): ?bool
    {
        return $this->four;
    }

    public function setFour(bool $four): self
    {
        $this->four = $four;

        return $this;
    }

    public function getPlaque(): ?bool
    {
        return $this->plaque;
    }

    public function setPlaque(bool $plaque): self
    {
        $this->plaque = $plaque;

        return $this;
    }

    public function getFrigo(): ?bool
    {
        return $this->frigo;
    }

    public function setFrigo(bool $frigo): self
    {
        $this->frigo = $frigo;

        return $this;
    }

    public function getBac(): ?bool
    {
        return $this->bac;
    }

    public function setBac(bool $bac): self
    {
        $this->bac = $bac;

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
}
