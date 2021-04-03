<?php

namespace App\Entity;

use App\Repository\CoffeRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CoffeRepository::class)
 */
class Coffe implements \JsonSerializable
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $surface;

    /**
     * @ORM\Column(type="string", length=15000, nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description2;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description3;

    /**
     * @Assert\File(
     *     maxSize = "6000000000000",
     *     mimeTypes = {"application/jpg", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF"
     * )
     * @ORM\column(name="image",type="string", length=255, nullable=true)
     */
    private $image;

    /**
     * @Assert\File(
     *     maxSize = "6000000000000",
     *     mimeTypes = {"application/jpg", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF"
     * )
     * @ORM\column(name="cover",type="string", length=255, nullable=true)
     */
    private $cover;

    /**
     * @ORM\OneToOne(targetEntity=Transport::class, inversedBy="coffe_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $transport;

    /**
     * @ORM\OneToOne(targetEntity=Map::class, inversedBy="coffe_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $map;

    /**
     * @ORM\OneToOne(targetEntity=Vcar::class, inversedBy="coffe", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $car;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(?string $adress): self
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

    public function getSurface(): ?string
    {
        return $this->surface;
    }

    public function setSurface(?string $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription2(): ?string
    {
        return $this->description2;
    }

    public function setDescription2(?string $description2): self
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

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

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

    public function getTransport(): ?Transport
    {
        return $this->transport;
    }

    public function setTransport(?Transport $transport): self
    {
        $this->transport = $transport;

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

    public function getCar(): ?Vcar
    {
        return $this->car;
    }

    public function setCar(?Vcar $car): self
    {
        $this->car = $car;

        return $this;
    }
}
