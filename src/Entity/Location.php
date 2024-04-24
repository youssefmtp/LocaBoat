<?php

namespace App\Entity;

use App\Repository\LocationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LocationRepository::class)]
class Location
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $num = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $debutLocation = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $finLocation = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?Bateau $idBateau = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $idUser = null;

    public function getNum(): ?int
    {
        return $this->num;
    }

    public function getDebutLocation(): ?\DateTimeInterface
    {
        return $this->debutLocation;
    }

    public function setDebutLocation(\DateTimeInterface $debutLocation): static
    {
        $this->debutLocation = $debutLocation;

        return $this;
    }

    public function getFinLocation(): ?\DateTimeInterface
    {
        return $this->finLocation;
    }

    public function setFinLocation(\DateTimeInterface $finLocation): static
    {
        $this->finLocation = $finLocation;

        return $this;
    }

    public function getIdBateau(): ?Bateau
    {
        return $this->idBateau;
    }

    public function setIdBateau(?Bateau $idBateau): static
    {
        $this->idBateau = $idBateau;

        return $this;
    }

    public function getIdUser(): ?User
    {
        return $this->idUser;
    }

    public function setIdUser(?User $idUser): static
    {
        $this->idUser = $idUser;

        return $this;
    }

    
}
