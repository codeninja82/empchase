<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ContactRepository::class)
 */
class Contact
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=20, nullable=true)
     */
    private $cphone;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $cemail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $subject;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $cmessage;

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

    public function getCphone(): ?string
    {
        return $this->cphone;
    }

    public function setCphone(?string $cphone): self
    {
        $this->cphone = $cphone;

        return $this;
    }

    public function getCemail(): ?string
    {
        return $this->cemail;
    }

    public function setCemail(string $cemail): self
    {
        $this->cemail = $cemail;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(?string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getCmessage(): ?string
    {
        return $this->cmessage;
    }

    public function setCmessage(?string $cmessage): self
    {
        $this->cmessage = $cmessage;

        return $this;
    }
}
