<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ToBuyRepository")
 */
class ToBuy implements \JsonSerializable
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
    private $city;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $surface;

    /**
     * @ORM\Column(type="text")
     */
    private $description;
    /**
     * @ORM\Column(type="text")
     */
    private $description2;
    /**
     * @ORM\Column(type="text")
     */
    private $description3;



    /**
     * @Assert\File(
     *     maxSize = "6000000000000",
     *     mimeTypes = {"application/jpg", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF"
     * )
     * @ORM\column(name="mainIMG",type="string", length=255, nullable=true)
     */

    protected $mainIMG;
    /**
     * @Assert\File(
     *     maxSize = "110000000000",
     *     mimeTypes = {"application/jpg", "application/x-pdf"},
     *
     * )
     * @ORM\column(name="cover",type="string", length=255, nullable=true)
     */

    protected $cover;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $RoomNB;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Vcar", mappedBy="ID_house", cascade={"persist", "remove"})
     */
    private $Vcaract;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Gallery", mappedBy="ID_House", cascade={"persist", "remove"})
     */
    private $gallery;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Transport", mappedBy="house_id", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $transport;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Map", mappedBy="house_id", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $map;

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

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
    public function getDescription2(): ?string
    {
        return $this->description2;
    }
    public function getDescription3(): ?string
    {
        return $this->description3;
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
    public function setDescription2(string $description2): self
    {
        $this->description2 = $description2;

        return $this;
    }
    public function setDescription3(string $description3): self
    {
        $this->description3 = $description3;

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

    public function getRoomNB(): ?int
    {
        return $this->RoomNB;
    }

    public function setRoomNB(int $RoomNB): self
    {
        $this->RoomNB = $RoomNB;

        return $this;
    }
    /*
    * Sets file.
    *
    * @param UploadedFile $mainIMG
    */
      public function setMainIMG(/*UploadedFile */$mainIMG/*= null*/)
    {

        $this->mainIMG = $mainIMG;
        return $this;
    }

     /**
     * Get mainIMG
     *
     * @return string
     */

     public function getMainIMG()
    {
        return $this->mainIMG;
    }

    /*
    * Sets file.
    *
    * @param UploadedFile $cover
    */
      public function setCover(/*UploadedFile */$cover/*= null*/)
    {

        $this->cover = $cover;
        return $this;
    }

     /**
     * Get cover
     *
     * @return string
     */

     public function getCover()
    {
        return $this->cover;
    }


    public function jsonSerialize() {

        return  get_object_vars($this);
    }

    public function getVcaract(): ?Vcar
    {
        return $this->Vcaract;
    }

    public function setVcaract(Vcar $Vcaract): self
    {
        $this->Vcaract = $Vcaract;

        // set the owning side of the relation if necessary
        if ($this !== $Vcaract->getIDHouse()) {
            $Vcaract->setIDHouse($this);
        }

        return $this;
    }

    public function getGallery(): ?Gallery
    {
        return $this->gallery;
    }

    public function setGallery(Gallery $gallery): self
    {
        $this->gallery = $gallery;

        // set the owning side of the relation if necessary
        if ($this !== $gallery->getIDHouse()) {
            $gallery->setIDHouse($this);
        }

        return $this;
    }

    public function getTransport(): ?Transport
    {
        return $this->transport;
    }

    public function setTransport(Transport $transport): self
    {
        $this->transport = $transport;

        // set the owning side of the relation if necessary
        if ($this !== $transport->getHouseId()) {
            $transport->setHouseId($this);
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
        $newHouse_id = $map === null ? null : $this;
        if ($newHouse_id !== $map->getHouseId()) {
            $map->setHouseId($newHouse_id);
        }

        return $this;
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
