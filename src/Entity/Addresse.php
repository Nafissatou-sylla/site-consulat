<?php

namespace App\Entity;

use App\Repository\AddresseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddresseRepository::class)]
class Addresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $numeroDeRue = null;

    #[ORM\Column(length: 100)]
    private ?string $nomDeRue = null;

    #[ORM\Column]
    private ?int $codePostal = null;

    #[ORM\Column(length: 50)]
    private ?string $ville = null;

    #[ORM\Column(length: 50)]
    private ?string $pays = null;

    #[ORM\OneToMany(mappedBy: 'refAddress', targetEntity: User::class)]
    private Collection $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNumeroDeRue(): ?int
    {
        return $this->numeroDeRue;
    }

    public function setNumeroDeRue(int $numeroDeRue): self
    {
        $this->numeroDeRue = $numeroDeRue;

        return $this;
    }

    public function getNomDeRue(): ?string
    {
        return $this->nomDeRue;
    }

    public function setNomDeRue(string $nomDeRue): self
    {
        $this->nomDeRue = $nomDeRue;

        return $this;
    }

    public function getCodePostal(): ?int
    {
        return $this->codePostal;
    }

    public function setCodePostal(int $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getPays(): ?string
    {
        return $this->pays;
    }

    public function setPays(string $pays): self
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users->add($user);
            $user->setRefAddress($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getRefAddress() === $this) {
                $user->setRefAddress(null);
            }
        }

        return $this;
    }
}
