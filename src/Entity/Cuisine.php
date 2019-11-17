<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CuisineRepository")
 */
class Cuisine 
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
    private $lave;

    /**
     * @ORM\Column(type="boolean")
     */
    private $congelateur;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $refri;

    /**
     * @ORM\Column(type="boolean")
     */
    private $microonde;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ForRentM", inversedBy="cuisine", cascade={"persist", "remove"})
     */
    private $house_id;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getLave(): ?bool
    {
        return $this->lave;
    }

    public function setLave(bool $lave): self
    {
        $this->lave = $lave;

        return $this;
    }

    public function getCongelateur(): ?bool
    {
        return $this->congelateur;
    }

    public function setCongelateur(bool $congelateur): self
    {
        $this->congelateur = $congelateur;

        return $this;
    }

    public function getRefri(): ?bool
    {
        return $this->refri;
    }

    public function setRefri(?bool $refri): self
    {
        $this->refri = $refri;

        return $this;
    }

    public function getMicroonde(): ?bool
    {
        return $this->microonde;
    }

    public function setMicroonde(bool $microonde): self
    {
        $this->microonde = $microonde;

        return $this;
    }
    
}
