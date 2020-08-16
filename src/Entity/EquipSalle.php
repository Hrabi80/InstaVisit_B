<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EquipSalleRepository")
 */
class EquipSalle
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
    private $eau;

    /**
     * @ORM\Column(type="boolean")
     */
    private $extincteur;



    /**
     * @ORM\Column(type="boolean")
     */
    private $telp;

    /**
     * @ORM\Column(type="boolean")
     */
    private $electrique;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Salle", inversedBy="equip", cascade={"persist", "remove"})
     */
    private $salle_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEau(): ?bool
    {
        return $this->eau;
    }

    public function setEau(bool $eau): self
    {
        $this->eau = $eau;

        return $this;
    }

    public function getExtincteur(): ?bool
    {
        return $this->extincteur;
    }

    public function setExtincteur(bool $extincteur): self
    {
        $this->extincteur = $extincteur;

        return $this;
    }



    public function getTel(): ?bool
    {
        return $this->telp;
    }

    public function setTel(bool $telp): self
    {
        $this->telp = $telp;

        return $this;
    }

    public function getElectrique(): ?bool
    {
        return $this->electrique;
    }

    public function setElectrique(bool $electrique): self
    {
        $this->electrique = $electrique;

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
