<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\TechnRepository")
 */
class Techn
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
    private $parking;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $horaire;

    /**
     * @ORM\Column(type="boolean")
     */
    private $bar;

    /**
     * @ORM\Column(type="boolean")
     */
    private $toilette;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Salle", inversedBy="tech", cascade={"persist", "remove"})
     */
    private $salle_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getParking(): ?bool
    {
        return $this->parking;
    }

    public function setParking(bool $parking): self
    {
        $this->parking = $parking;

        return $this;
    }

    public function getHoraire(): ?string
    {
        return $this->horaire;
    }

    public function setHoraire(string $horaire): self
    {
        $this->horaire = $horaire;

        return $this;
    }

    public function getBar(): ?bool
    {
        return $this->bar;
    }

    public function setBar(bool $bar): self
    {
        $this->bar = $bar;

        return $this;
    }

    public function getToilette(): ?bool
    {
        return $this->toilette;
    }

    public function setToilette(string $toilette): self
    {
        $this->toilette = $toilette;

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
