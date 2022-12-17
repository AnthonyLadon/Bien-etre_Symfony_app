<?php

namespace App\Entity;

use App\Repository\UtilisateurRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UtilisateurRepository::class)]
class Utilisateur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $motDePasse = null;

    #[ORM\Column(nullable: true)]
    private ?int $adresseNum = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseRue = null;

    #[ORM\Column(length: 255)]
    private ?string $dateInscription = null;

    #[ORM\Column]
    private ?int $typeUtilisateur = null;

    #[ORM\Column]
    private ?int $NbEssais = null;

    #[ORM\Column]
    private ?bool $banni = null;

    #[ORM\Column]
    private ?bool $confirmationInscription = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }

    public function setMotDePasse(?string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;

        return $this;
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

    public function getDateInscription(): ?string
    {
        return $this->dateInscription;
    }

    public function setDateInscription(string $dateInscription): self
    {
        $this->dateInscription = $dateInscription;

        return $this;
    }

    public function getTypeUtilisateur(): ?int
    {
        return $this->typeUtilisateur;
    }

    public function setTypeUtilisateur(int $typeUtilisateur): self
    {
        $this->typeUtilisateur = $typeUtilisateur;

        return $this;
    }

    public function getNbEssais(): ?int
    {
        return $this->NbEssais;
    }

    public function setNbEssais(int $NbEssais): self
    {
        $this->NbEssais = $NbEssais;

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

    public function isConfirmationInscription(): ?bool
    {
        return $this->confirmationInscription;
    }

    public function setConfirmationInscription(bool $confirmationInscription): self
    {
        $this->confirmationInscription = $confirmationInscription;

        return $this;
    }
}
