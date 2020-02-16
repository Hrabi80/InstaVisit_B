<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ForRentRepository")
 */
class ForRent implements \JsonSerializable
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
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="integer")
     */
    private $surface;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $room_nb;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="text")
     */
    private $description2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description3;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description4;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mainIMG;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cover;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $piece;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Transport", inversedBy="housenm", cascade={"persist", "remove"})
     */
    private $transport;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Vcar", inversedBy="housenm", cascade={"persist", "remove"})
     */
    private $Vcar;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Map", inversedBy="housenm", cascade={"persist", "remove"})
     */
    private $map;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getSurface(): ?int
    {
        return $this->surface;
    }

    public function setSurface(int $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getRoomNb(): ?int
    {
        return $this->room_nb;
    }

    public function setRoomNb(int $room_nb): self
    {
        $this->room_nb = $room_nb;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }

    public function getDescription3(): ?string
    {
        return $this->description3;
    }

    public function setDescription3(?string $description3): self
    {
        $this->description3 = $description3;

        return $this;
    }

    public function getDescription4(): ?string
    {
        return $this->description4;
    }

    public function setDescription4(?string $description4): self
    {
        $this->description4 = $description4;

        return $this;
    }

    public function getMainIMG(): ?string
    {
        return $this->mainIMG;
    }

    public function setMainIMG(?string $mainIMG): self
    {
        $this->mainIMG = $mainIMG;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(?string $cover): self
    {
        $this->cover = $cover;

        return $this;
    }
    
    public function jsonSerialize() {

        return  get_object_vars($this);
    }

    public function getPiece(): ?int
    {
        return $this->piece;
    }

    public function setPiece(?int $piece): self
    {
        $this->piece = $piece;

        return $this;
    }

    public function getTransport(): ?Transport
    {
        return $this->transport;
    }

    public function setTransport(?Transport $transport): self
    {
        $this->transport = $transport;

        return $this;
    }

    public function getVcar(): ?Vcar
    {
        return $this->Vcar;
    }

    public function setVcar(?Vcar $Vcar): self
    {
        $this->Vcar = $Vcar;

        return $this;
    }

    public function getMap(): ?Map
    {
        return $this->map;
    }

    public function setMap(?Map $map): self
    {
        $this->map = $map;

        return $this;
    }
}
