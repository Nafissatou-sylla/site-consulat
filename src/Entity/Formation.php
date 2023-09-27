<?php

namespace App\Entity;

use App\Repository\FormationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormationRepository::class)]
class Formation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 150)]
    private ?string $universite = null;

    #[ORM\Column(length: 150)]
    private ?string $formationSuivie = null;

    #[ORM\Column(length: 50)]
    private ?string $niveau = null;

    #[ORM\Column(length: 150)]
    private ?string $villeDEtude = null;

    #[ORM\OneToMany(mappedBy: 'refFormation', targetEntity: Etudiant::class)]
    private Collection $etudiants;

    public function __construct()
    {
        $this->etudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUniversite(): ?string
    {
        return $this->universite;
    }

    public function setUniversite(string $universite): static
    {
        $this->universite = $universite;

        return $this;
    }

    public function getFormationSuivie(): ?string
    {
        return $this->formationSuivie;
    }

    public function setFormationSuivie(string $formationSuivie): static
    {
        $this->formationSuivie = $formationSuivie;

        return $this;
    }

    public function getNiveau(): ?string
    {
        return $this->niveau;
    }

    public function setNiveau(string $niveau): static
    {
        $this->niveau = $niveau;

        return $this;
    }

    public function getVilleDEtude(): ?string
    {
        return $this->villeDEtude;
    }

    public function setVilleDEtude(string $villeDEtude): static
    {
        $this->villeDEtude = $villeDEtude;

        return $this;
    }

    /**
     * @return Collection<int, Etudiant>
     */
    public function getEtudiants(): Collection
    {
        return $this->etudiants;
    }

    public function addEtudiant(Etudiant $etudiant): static
    {
        if (!$this->etudiants->contains($etudiant)) {
            $this->etudiants->add($etudiant);
            $etudiant->setRefFormation($this);
        }

        return $this;
    }

    public function removeEtudiant(Etudiant $etudiant): static
    {
        if ($this->etudiants->removeElement($etudiant)) {
            // set the owning side to null (unless already changed)
            if ($etudiant->getRefFormation() === $this) {
                $etudiant->setRefFormation(null);
            }
        }

        return $this;
    }
}
