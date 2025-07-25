<?php

namespace App\Entity;

use App\Repository\ContactRequestRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;

#[ORM\Entity(repositoryClass: ContactRequestRepository::class)]
class ContactRequest
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $lastName = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $firstName = null;

    #[ORM\Column(length: 100)]
    private ?string $email = null;

    #[ORM\Column(length: 100)]
    private ?string $typeOfConstructionSite = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $message = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(?string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getTypeOfConstructionSite(): ?string
    {
        return $this->typeOfConstructionSite;
    }

    public function setTypeOfConstructionSite(string $typeOfConstructionSite): static
    {
        $this->typeOfConstructionSite = $typeOfConstructionSite;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }
}
