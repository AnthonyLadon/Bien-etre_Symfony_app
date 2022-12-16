<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    private ?string $motDePasse = null;

    #[ORM\Column]
    private ?int $adresseNum = null;

    #[ORM\Column(length: 255)]
    private ?string $adresseRue = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $inscriptionDate = null;

    #[ORM\Column(length: 255)]
    private ?string $typeUtilisateur = null;

    #[ORM\Column]
    private ?int $nbEssais = null;

    #[ORM\Column]
    private ?bool $banni = null;

    #[ORM\Column]
    private ?bool $confirmInscription = null;

    #[ORM\Column]
    private ?int $utilisateurId = null;

    #[ORM\Column(nullable: true)]
    private ?int $codePostalId = null;

    #[ORM\Column(nullable: true)]
    private ?int $communeId = null;

    #[ORM\Column]
    private ?int $InternauteId = null;

    #[ORM\Column]
    private ?int $localiteId = null;

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

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
    }

    public function getAdresseNum(): ?int
    {
        return $this->adresseNum;
    }

    public function setAdresseNum(int $adresseNum): self
    {
        $this->adresseNum = $adresseNum;

        return $this;
    }

    public function getAdresseRue(): ?string
    {
        return $this->adresseRue;
    }

    public function setAdresseRue(string $adresseRue): self
    {
        $this->adresseRue = $adresseRue;

        return $this;
    }

    public function getInscriptionDate(): ?\DateTimeInterface
    {
        return $this->inscriptionDate;
    }

    public function setInscriptionDate(\DateTimeInterface $inscriptionDate): self
    {
        $this->inscriptionDate = $inscriptionDate;

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

    public function isConfirmInscription(): ?bool
    {
        return $this->confirmInscription;
    }

    public function setConfirmInscription(bool $confirmInscription): self
    {
        $this->confirmInscription = $confirmInscription;

        return $this;
    }

    public function getUtilisateurId(): ?int
    {
        return $this->utilisateurId;
    }

    public function setUtilisateurId(int $utilisateurId): self
    {
        $this->utilisateurId = $utilisateurId;

        return $this;
    }

    public function getCodePostalId(): ?int
    {
        return $this->codePostalId;
    }

    public function setCodePostalId(?int $codePostalId): self
    {
        $this->codePostalId = $codePostalId;

        return $this;
    }

    public function getCommuneId(): ?int
    {
        return $this->communeId;
    }

    public function setCommuneId(?int $communeId): self
    {
        $this->communeId = $communeId;

        return $this;
    }

    public function getInternauteId(): ?int
    {
        return $this->InternauteId;
    }

    public function setInternauteId(int $InternauteId): self
    {
        $this->InternauteId = $InternauteId;

        return $this;
    }

    public function getLocaliteId(): ?int
    {
        return $this->localiteId;
    }

    public function setLocaliteId(int $localiteId): self
    {
        $this->localiteId = $localiteId;

        return $this;
    }
}
