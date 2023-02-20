<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
#[UniqueEntity(fields: ['email'], message: 'Un compte lié à cet email existe dèjà')]
class Utilisateur implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(nullable: true)]
    private ?int $adresseNum = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseRue = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateInscription = null;

    #[ORM\Column(length: 255)]
    private ?string $typeUtilisateur = 'utilisateur';

    #[ORM\Column]
    private ?int $nbEssais = null;

    #[ORM\Column]
    private ?bool $banni = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    #[ORM\JoinColumn(nullable: true)]
    private ?Localite $localite = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    private ?CodePostal $codePostal = null;

    #[ORM\ManyToOne(inversedBy: 'utilisateurs')]
    private ?Commune $commune = null;

    #[ORM\Column(type: 'boolean')]
    private $isVerified = false;

    #[ORM\OneToOne(inversedBy: 'utilisateur', cascade: ['persist', 'remove'])]
    private ?Internaute $internautes = null;

    public function getId(): ?int
    {
        return $this->id;
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
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
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
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getAdresseNum(): ?int
    {
        return $this->adresseNum;
    }

    public function setAdresseNum(?int $adresseNum): self
    {
        $this->adresseNum = $adresseNum;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresseRue;
    }

    public function setAdresseRue(?string $adresseRue): self
    {
        $this->adresseRue = $adresseRue;

        return $this;
    }

    public function getDateInscription(): ?\DateTimeInterface
    {
        return $this->dateInscription;
    }

    public function setDateInscription(\DateTimeInterface $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getTypeUtilisateur(): ?string
    {
        return $this->typeUtilisateur;
    }

    public function setTypeUtilisateur(string $typeUtilisateur): self
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    public function getNbEssais(): ?int
    {
        return $this->nbEssais;
    }

    public function setNbEssais(int $nbEssais): self
    {
        $this->nbEssais = $nbEssais;

        return $this;
    }

    public function isBanni(): ?bool
    {
        return $this->banni;
    }

    public function setBanni(bool $banni): self
    {
        $this->banni = $banni;

        return $this;
    }

    public function getLocalite(): ?Localite
    {
        return $this->localite;
    }

    public function setLocalite(?Localite $localite): self
    {
        $this->localite = $localite;

        return $this;
    }

    public function getCodePostal(): ?CodePostal
    {
        return $this->codePostal;
    }

    public function setCodePostal(?CodePostal $codePostal): self
    {
        $this->codePostal = $codePostal;

        return $this;
    }

    public function getCommune(): ?Commune
    {
        return $this->commune;
    }

    public function setCommune(?Commune $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    public function getInternautes(): ?Internaute
    {
        return $this->internautes;
    }

    public function setInternautes(?Internaute $internautes): self
    {
        $this->internautes = $internautes;

        return $this;
    }
}
