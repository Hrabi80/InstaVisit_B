<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\GalleryRepository")
 */
class Gallery
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
    private $FirstCover;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $secCover;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $thirCover;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fourCover;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $fiveCover;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $SexCover;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $SevenCover;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $eightCover;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\ToBuy", inversedBy="gallery", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $ID_House;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstCover(): ?string
    {
        return $this->FirstCover;
    }

    public function setFirstCover(string $FirstCover): self
    {
        $this->FirstCover = $FirstCover;

        return $this;
    }

    public function getSecCover(): ?string
    {
        return $this->secCover;
    }

    public function setSecCover(string $secCover): self
    {
        $this->secCover = $secCover;

        return $this;
    }

    public function getThirCover(): ?string
    {
        return $this->thirCover;
    }

    public function setThirCover(?string $thirCover): self
    {
        $this->thirCover = $thirCover;

        return $this;
    }

    public function getFourCover(): ?string
    {
        return $this->fourCover;
    }

    public function setFourCover(?string $fourCover): self
    {
        $this->fourCover = $fourCover;

        return $this;
    }

    public function getFiveCover(): ?string
    {
        return $this->fiveCover;
    }

    public function setFiveCover(?string $fiveCover): self
    {
        $this->fiveCover = $fiveCover;

        return $this;
    }

    public function getSexCover(): ?string
    {
        return $this->SexCover;
    }

    public function setSexCover(?string $SexCover): self
    {
        $this->SexCover = $SexCover;

        return $this;
    }

    public function getSevenCover(): ?string
    {
        return $this->SevenCover;
    }

    public function setSevenCover(?string $SevenCover): self
    {
        $this->SevenCover = $SevenCover;

        return $this;
    }

    public function getEightCover(): ?string
    {
        return $this->eightCover;
    }

    public function setEightCover(?string $eightCover): self
    {
        $this->eightCover = $eightCover;

        return $this;
    }

    public function getIDHouse(): ?ToBuy
    {
        return $this->ID_House;
    }

    public function setIDHouse(ToBuy $ID_House): self
    {
        $this->ID_House = $ID_House;

        return $this;
    }
}
