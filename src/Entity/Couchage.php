<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CouchageRepository")
 */
class Couchage 
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
    private $lit;

    /**
     * @ORM\Column(type="integer")
     */
    private $doublelit;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $canapelit;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ForRentM", inversedBy="couchage", cascade={"persist", "remove"})
     */
    private $house_id;

    

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLit(): ?int
    {
        return $this->lit;
    }

    public function setLit(int $lit): self
    {
        $this->lit = $lit;

        return $this;
    }

    public function getDoublelit(): ?int
    {
        return $this->doublelit;
    }

    public function setDoublelit(int $doublelit): self
    {
        $this->doublelit = $doublelit;

        return $this;
    }

    public function getCanapelit(): ?int
    {
        return $this->canapelit;
    }

    public function setCanapelit(?int $canapelit): self
    {
        $this->canapelit = $canapelit;

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
