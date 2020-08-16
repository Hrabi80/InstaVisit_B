<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\SalleRepository")
 */
class Salle implements \JsonSerializable
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
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $mail;

    /**
     * @ORM\Column(type="integer")
     */
    private $tel;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adress;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $responsable;

    /**
     * @ORM\Column(type="text")
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
     * @ORM\Column(type="float")
     */
    private $surface;

    /**
     * @ORM\Column(type="integer")
     */
    private $places;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $city;

    /**
     * @Assert\File(
     *     maxSize = "6000000000000",
     *     mimeTypes = {"application/jpg", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF"
     * )
     * @ORM\column(name="main",type="string", length=255, nullable=true)
     */
    private $main;

    /**
     * @Assert\File(
     *     maxSize = "110000000000",
     *     mimeTypes = {"application/jpg", "application/x-pdf"},
     *
     * )
     * @ORM\column(name="cover",type="string", length=255, nullable=true)
     */
    private $cover;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\CuisineSalle", mappedBy="salle_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $cuisine;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\EquipSalle", mappedBy="salle_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $equip;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Materiel", mappedBy="salle_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $materiel;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Techn", mappedBy="salle_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $tech;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Transport", mappedBy="salle_id", cascade={"persist", "remove"})
     */
    private $transport;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Map", mappedBy="salle_id", cascade={"persist", "remove"})
     */
    private $map;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
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

    public function setTel(int $tel): self
    {
        $this->tel = $tel;

        return $this;
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

    public function setDescription(string $description): self
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

    public function setSurface(float $surface): self
    {
        $this->surface = $surface;

        return $this;
    }

    public function getPlaces(): ?int
    {
        return $this->places;
    }

    public function setPlaces(int $places): self
    {
        $this->places = $places;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getMain(): ?string
    {
        return $this->main;
    }

    public function setMain(string $main): self
    {
        $this->main = $main;

        return $this;
    }

    public function getCover(): ?string
    {
        return $this->cover;
    }

    public function setCover(string $cover): self
    {
        $this->cover = $cover;

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

    public function jsonSerialize() {

        return  get_object_vars($this);
    }

    public function getCuisine(): ?CuisineSalle
    {
        return $this->cuisine;
    }

    public function setCuisine(?CuisineSalle $cuisine): self
    {
        $this->cuisine = $cuisine;

        // set (or unset) the owning side of the relation if necessary
        $newSalle_id = $cuisine === null ? null : $this;
        if ($newSalle_id !== $cuisine->getSalleId()) {
            $cuisine->setSalleId($newSalle_id);
        }

        return $this;
    }

    public function getEquip(): ?EquipSalle
    {
        return $this->equip;
    }

    public function setEquip(?EquipSalle $equip): self
    {
        $this->equip = $equip;

        // set (or unset) the owning side of the relation if necessary
        $newSalle_id = $equip === null ? null : $this;
        if ($newSalle_id !== $equip->getSalleId()) {
            $equip->setSalleId($newSalle_id);
        }

        return $this;
    }

    public function getMateriel(): ?Materiel
    {
        return $this->materiel;
    }

    public function setMateriel(?Materiel $materiel): self
    {
        $this->materiel = $materiel;

        // set (or unset) the owning side of the relation if necessary
        $newSalle_id = $materiel === null ? null : $this;
        if ($newSalle_id !== $materiel->getSalleId()) {
            $materiel->setSalleId($newSalle_id);
        }

        return $this;
    }

    public function getTech(): ?Techn
    {
        return $this->tech;
    }

    public function setTech(?Techn $tech): self
    {
        $this->tech = $tech;

        // set (or unset) the owning side of the relation if necessary
        $newSalle_id = $tech === null ? null : $this;
        if ($newSalle_id !== $tech->getSalleId()) {
            $tech->setSalleId($newSalle_id);
        }

        return $this;
    }

    public function getTransport(): ?Transport
    {
        return $this->transport;
    }

    public function setTransport(?Transport $transport): self
    {
        $this->transport = $transport;

        // set (or unset) the owning side of the relation if necessary
        $newSalle_id = $transport === null ? null : $this;
        if ($newSalle_id !== $transport->getSalleId()) {
            $transport->setSalleId($newSalle_id);
        }

        return $this;
    }

    public function getMap(): ?Map
    {
        return $this->map;
    }

    public function setMap(?Map $map): self
    {
        $this->map = $map;

        // set (or unset) the owning side of the relation if necessary
        $newSalle_id = $map === null ? null : $this;
        if ($newSalle_id !== $map->getSalleId()) {
            $map->setSalleId($newSalle_id);
        }

        return $this;
    }
}
