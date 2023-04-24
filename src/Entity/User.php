<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    private ?string $nom = null;

    #[ORM\Column(length: 50)]
    private ?string $prenom = null;

    #[ORM\Column(nullable: true)]
    private ?int $numeroDeTelephonene = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateDeNaissance = null;

    #[ORM\Column(length: 50)]
    private ?string $lieuDeNaissance = null;

    #[ORM\Column(length: 50)]
    private ?string $paysDeNaissance = null;

    #[ORM\Column]
    private array $roles = [];

    #[ORM\ManyToOne(inversedBy: 'users')]
    private ?Addresse $refAddress = null;

    #[ORM\ManyToMany(targetEntity: Role::class, inversedBy: 'users')]
    private Collection $refRole;

    public function __construct()
    {
        $this->refRole = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): self
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getNumeroDeTelephonene(): ?int
    {
        return $this->numeroDeTelephonene;
    }

    public function setNumeroDeTelephonene(?int $numeroDeTelephonene): self
    {
        $this->numeroDeTelephonene = $numeroDeTelephonene;

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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }


    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }

    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;

        return $this;
    }

    public function getLieuDeNaissance(): ?string
    {
        return $this->lieuDeNaissance;
    }

    public function setLieuDeNaissance(string $lieuDeNaissance): self
    {
        $this->lieuDeNaissance = $lieuDeNaissance;

        return $this;
    }

    public function getPaysDeNaissance(): ?string
    {
        return $this->paysDeNaissance;
    }

    public function setPaysDeNaissance(string $paysDeNaissance): self
    {
        $this->paysDeNaissance = $paysDeNaissance;

        return $this;
    }


    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }


    public function getRefAddress(): ?Addresse
    {
        return $this->refAddress;
    }

    public function setRefAddress(?Addresse $refAddress): self
    {
        $this->refAddress = $refAddress;

        return $this;
    }

    /**
     * @return Collection<int, Role>
     */
    public function getRefRole(): Collection
    {
        return $this->refRole;
    }

    public function addRefRole(Role $refRole): self
    {
        if (!$this->refRole->contains($refRole)) {
            $this->refRole->add($refRole);
        }

        return $this;
    }

    public function removeRefRole(Role $refRole): self
    {
        $this->refRole->removeElement($refRole);

        return $this;
    }
}