<?php

namespace App\Entity;

use App\Repository\ValuationInpersonRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ValuationInpersonRepository::class)
 */
class ValuationInperson
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text")
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $email;

    /**
     * @ORM\Column(type="text")
     */
    private $phone;

    /**
     * @ORM\Column(type="text")
     */
    private $adress;

    /**
     * @ORM\Column(type="text")
     */
    private $city;

    /**
     * @ORM\Column(type="text")
     */
    private $zip;

    /**
     * @ORM\Column(type="text")
     */
    private $ptype;

    /**
     * @ORM\Column(type="integer")
     */
    private $nrooms;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbrooms;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $comments;

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

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): self
    {
        $this->phone = $phone;

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

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getZip(): ?string
    {
        return $this->zip;
    }

    public function setZip(string $zip): self
    {
        $this->zip = $zip;

        return $this;
    }

    public function getPtype(): ?string
    {
        return $this->ptype;
    }

    public function setPtype(string $ptype): self
    {
        $this->ptype = $ptype;

        return $this;
    }

    public function getNrooms(): ?int
    {
        return $this->nrooms;
    }

    public function setNrooms(int $nrooms): self
    {
        $this->nrooms = $nrooms;

        return $this;
    }

    public function getNbrooms(): ?int
    {
        return $this->nbrooms;
    }

    public function setNbrooms(int $nbrooms): self
    {
        $this->nbrooms = $nbrooms;

        return $this;
    }

    public function getComments(): ?string
    {
        return $this->comments;
    }

    public function setComments(?string $comments): self
    {
        $this->comments = $comments;

        return $this;
    }
}
