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
     * @Assert\File(
     *     maxSize = "6000000000000",
     *     mimeTypes = {"application/jpg", "application/x-pdf"},
     *     mimeTypesMessage = "Please upload a valid PDF"
     * )
     * @ORM\column(name="mainIMG",type="string", length=255, nullable=true)
     */

    protected $mainIMG;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $RoomNB;

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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

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


    public function jsonSerialize() {

        return  get_object_vars($this);
    }
}
