<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\MaterielRepository")
 */
class Materiel
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $tables;

    /**
     * @ORM\Column(type="integer")
     */
    private $chair;

    /**
     * @ORM\Column(type="boolean")
     */
    private $sono;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Salle", inversedBy="materiel", cascade={"persist", "remove"})
     */
    private $salle_id;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTables(): ?int
    {
        return $this->tables;
    }

    public function setTables(int $tables): self
    {
        $this->tables = $tables;

        return $this;
    }

    public function getChair(): ?int
    {
        return $this->chair;
    }

    public function setChair(int $chair): self
    {
        $this->chair = $chair;

        return $this;
    }

    public function getSono(): ?bool
    {
        return $this->sono;
    }

    public function setSono(bool $sono): self
    {
        $this->sono = $sono;

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
