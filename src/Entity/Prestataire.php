<?php

namespace App\Entity;

use App\Repository\PrestataireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PrestataireRepository::class)]
class Prestataire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $siteWeb = null;

    #[ORM\Column(nullable: true)]
    private ?int $tel = null;

    #[ORM\Column]
    private ?int $tvaNum = null;

    #[ORM\OneToOne(inversedBy: 'prestataire', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?Utilisateur $utilisateurID = null;

    #[ORM\OneToMany(mappedBy: 'prestataire', targetEntity: stage::class, orphanRemoval: true)]
    private Collection $stage;

    public function __construct()
    {
        $this->stage = new ArrayCollection();
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

    public function getSiteWeb(): ?string
    {
        return $this->siteWeb;
    }

    public function setSiteWeb(?string $siteWeb): self
    {
        $this->siteWeb = $siteWeb;

        return $this;
    }

    public function getTel(): ?int
    {
        return $this->tel;
    }

    public function setTel(?int $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function getTvaNum(): ?int
    {
        return $this->tvaNum;
    }

    public function setTvaNum(int $tvaNum): self
    {
        $this->tvaNum = $tvaNum;

        return $this;
    }

    public function getUtilisateurID(): ?Utilisateur
    {
        return $this->utilisateurID;
    }

    public function setUtilisateurID(Utilisateur $utilisateurID): self
    {
        $this->utilisateurID = $utilisateurID;

        return $this;
    }

    /**
     * @return Collection<int, stage>
     */
    public function getStage(): Collection
    {
        return $this->stage;
    }

    public function addStage(stage $stage): self
    {
        if (!$this->stage->contains($stage)) {
            $this->stage->add($stage);
            $stage->setPrestataire($this);
        }

        return $this;
    }

    public function removeStage(stage $stage): self
    {
        if ($this->stage->removeElement($stage)) {
            // set the owning side to null (unless already changed)
            if ($stage->getPrestataire() === $this) {
                $stage->setPrestataire(null);
            }
        }

        return $this;
    }
}
