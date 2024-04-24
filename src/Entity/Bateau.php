<?php

namespace App\Entity;

use App\Repository\BateauRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: BateauRepository::class)]
class Bateau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?float $largeur = null;

    #[ORM\Column]
    private ?float $longueur = null;

    #[ORM\Column]
    private ?float $prixJour = null;

    #[ORM\Column(length: 50)]
    private ?string $img = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 50)]
    private ?string $pays = null;

    #[ORM\Column(length: 700)]
    private ?string $description = null;

    #[ORM\Column(length: 10)]
    private ?string $categorie = null;

    #[ORM\ManyToOne]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeBateau $idTypeBateau = null;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getLargeur(): ?float
    {
        return $this->largeur;
    }

    public function setLargeur(float $largeur): static
    {
        $this->largeur = $largeur;

        return $this;
    }

    public function getLongueur(): ?float
    {
        return $this->longueur;
    }

    public function setLongueur(float $longueur): static
    {
        $this->longueur = $longueur;

        return $this;
    }

    public function getPrixJour(): ?float
    {
        return $this->prixJour;
    }

    public function setPrixJour(float $prixJour): static
    {
        $this->prixJour = $prixJour;

        return $this;
    }

    public function getImg(): ?string
    {
        return $this->img;
    }

    public function setImg(string $img): static
    {
        $this->img = $img;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): static
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): static
    {
        $this->pays = $pays;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $categorie): static
    {
        $this->categorie = $categorie;

        return $this;
    }

    public function getIdTypeBateau(): ?TypeBateau
    {
        return $this->idTypeBateau;
    }

    public function setIdTypeBateau(?TypeBateau $idTypeBateau): static
    {
        $this->idTypeBateau = $idTypeBateau;

        return $this;
    }







}
