<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\NewsletterRepository")
 */
class Newsletter implements \JsonSerializable
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
    private $UserMail;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserMail(): ?string
    {
        return $this->UserMail;
    }

    public function setUserMail(string $UserMail): self
    {
        $this->UserMail = $UserMail;

        return $this;
    }
    
    public function jsonSerialize() {

        return  get_object_vars($this);
    }
}
