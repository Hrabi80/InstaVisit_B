<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\LocalisationRepository")
 */

class Localisation implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $City;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $Gover;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCity(): ?string
    {
        return $this->City;
    }

    public function setCity(string $City): self
    {
        $this->City = $City;

        return $this;
    }

    public function getGover(): ?string
    {
        return $this->Gover;
    }

    public function setGover(?string $Gover): self
    {
        $this->Gover = $Gover;

        return $this;
    }
    
    
    public function jsonSerialize() {

        return  get_object_vars($this);
    }
}
