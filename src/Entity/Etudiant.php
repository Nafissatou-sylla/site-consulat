<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message:"le prenom est obligatoire")]
    private ?string $prenom = null;

    #[ORM\Column(length: 100)]
    #[Assert\NotBlank(message:"le nom est obligatoire")]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $telephone = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDeNaissance = null;

    #[ORM\Column(length: 100)]
    private ?string $lieuDeNaissance = null;

    #[ORM\Column(length: 150)]
    private ?string $email = null;

    #[ORM\ManyToOne(inversedBy: 'etudiants', cascade: ['persist'])]
    private ?Adresse $refAdresse = null;

    #[ORM\ManyToOne(inversedBy: 'etudiants', cascade: ['persist'])]
    private ?Formation $refFormation = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
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

    public function getTelephone(): ?int
    {
        return $this->telephone;
    }

    public function setTelephone(int $telephone): static
    {
        $this->telephone = $telephone;

        return $this;
    }

    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): static
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->lieuDeNaissance;
    }

    public function setLieuDeNaissance(string $lieuDeNaissance): static
    {
        $this->lieuDeNaissance = $lieuDeNaissance;

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

    public function getRefAdresse(): ?Adresse
    {
        return $this->refAdresse;
    }

    public function setRefAdresse(?Adresse $refAdresse): static
    {
        $this->refAdresse = $refAdresse;

        return $this;
    }

    public function getRefFormation(): ?Formation
    {
        return $this->refFormation;
    }

    public function setRefFormation(?Formation $refFormation): static
    {
        $this->refFormation = $refFormation;

        return $this;
    }
}
