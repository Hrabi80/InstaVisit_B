<?php

namespace App\Entity;

use App\Repository\CoffeeRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=CoffeeRepository::class)
 */
class Coffee  implements \JsonSerializable
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $responsable;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description2;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $description3;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surface;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $places;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $city;

    /**
     * @Assert\File(
     *     maxSize = "6000000000000",
     *     mimeTypes = {"application/jpg", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF"
     * )
     * @ORM\column(name="profileimage",type="string", length=255, nullable=true)
     */
    private $profileimage;

    /**
     * @Assert\File(
     *     maxSize = "6000000000000",
     *     mimeTypes = {"application/jpg", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF"
     * )
     * @ORM\column(name="coverimage",type="string", length=255, nullable=true)
     */
    private $coverimage;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Transport", mappedBy="coffee", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $transport;

    /**
     * @ORM\OneToOne(targetEntity=Map::class, inversedBy="coffee", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $map;

    /**
     * @ORM\OneToOne(targetEntity=Vcar::class, inversedBy="coffee", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $car;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(?string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

        return $this;
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

    public function getResponsable(): ?string
    {
        return $this->responsable;
    }

    public function setResponsable(?string $responsable): self
    {
        $this->responsable = $responsable;

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

    public function getSurface(): ?float
    {
        return $this->surface;
    }

    public function setSurface(?float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(?int $places): self
    {
        $this->places = $places;

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

    public function getProfileimage(): ?string
    {
        return $this->profileimage;
    }

    public function setProfileimage(?string $profileimage): self
    {
        $this->profileimage = $profileimage;

        return $this;
    }

    public function getCoverimage(): ?string
    {
        return $this->coverimage;
    }

    public function setCoverimage(?string $coverimage): self
    {
        $this->coverimage = $coverimage;

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
    public function jsonSerialize() {

        return  get_object_vars($this);
    }
}
