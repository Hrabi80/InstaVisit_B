<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity(repositoryClass="App\Repository\ForRentMRepository")
 */
class ForRentM implements \JsonSerializable
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
     * @ORM\Column(type="string", length=255)
     */
    private $ciy;

    /**
     * @ORM\Column(type="float")
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
     * @ORM\OneToOne(targetEntity="App\Entity\Transport", mappedBy="houseLM_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $transport;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Vcar", mappedBy="houseLM_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $vcar;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Map", mappedBy="houseLM_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $map;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Equipement", mappedBy="house_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $equipement;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Couchage", mappedBy="house_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $couchage;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Cuisine", mappedBy="house_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $cuisine;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Ameublement", mappedBy="house_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $ameublement;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $piece;

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

    public function getCiy(): ?string
    {
        return $this->ciy;
    }

    public function setCiy(string $ciy): self
    {
        $this->ciy = $ciy;

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



    public function getTransport(): ?Transport
    {
        return $this->transport;
    }

    public function setTransport(?Transport $transport): self
    {
        $this->transport = $transport;

        // set (or unset) the owning side of the relation if necessary
        $newHouseLM_id = $transport === null ? null : $this;
        if ($newHouseLM_id !== $transport->getHouseLMId()) {
            $transport->setHouseLMId($newHouseLM_id);
        }

        return $this;
    }

    public function getVcar(): ?Vcar
    {
        return $this->vcar;
    }

    public function setVcar(?Vcar $vcar): self
    {
        $this->vcar = $vcar;

        // set (or unset) the owning side of the relation if necessary
        $newHouseLM_id = $vcar === null ? null : $this;
        if ($newHouseLM_id !== $vcar->getHouseLMId()) {
            $vcar->setHouseLMId($newHouseLM_id);
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
        $newHouseLM_id = $map === null ? null : $this;
        if ($newHouseLM_id !== $map->getHouseLMId()) {
            $map->setHouseLMId($newHouseLM_id);
        }

        return $this;
    }

    public function getEquipement(): ?Equipement
    {
        return $this->equipement;
    }

    public function setEquipement(?Equipement $equipement): self
    {
        $this->equipement = $equipement;

        // set (or unset) the owning side of the relation if necessary
        $newHouse_id = $equipement === null ? null : $this;
        if ($newHouse_id !== $equipement->getHouseId()) {
            $equipement->setHouseId($newHouse_id);
        }

        return $this;
    }

    public function getCouchage(): ?Couchage
    {
        return $this->couchage;
    }

    public function setCouchage(?Couchage $couchage): self
    {
        $this->couchage = $couchage;

        // set (or unset) the owning side of the relation if necessary
        $newHouse_id = $couchage === null ? null : $this;
        if ($newHouse_id !== $couchage->getHouseId()) {
            $couchage->setHouseId($newHouse_id);
        }

        return $this;
    }

    public function getCuisine(): ?Cuisine
    {
        return $this->cuisine;
    }

    public function setCuisine(?Cuisine $cuisine): self
    {
        $this->cuisine = $cuisine;

        // set (or unset) the owning side of the relation if necessary
        $newHouse_id = $cuisine === null ? null : $this;
        if ($newHouse_id !== $cuisine->getHouseId()) {
            $cuisine->setHouseId($newHouse_id);
        }

        return $this;
    }

    public function getAmeublement(): ?Ameublement
    {
        return $this->ameublement;
    }

    public function setAmeublement(?Ameublement $ameublement): self
    {
        $this->ameublement = $ameublement;

        // set (or unset) the owning side of the relation if necessary
        $newHouse_id = $ameublement === null ? null : $this;
        if ($newHouse_id !== $ameublement->getHouseId()) {
            $ameublement->setHouseId($newHouse_id);
        }

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
}
