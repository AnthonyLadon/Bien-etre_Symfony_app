<?php

namespace App\Entity;

use App\Repository\CommuneRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommuneRepository::class)]
class Commune
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $commune = null;

    #[ORM\OneToMany(mappedBy: 'commune', targetEntity: Utilisateur::class)]
    private Collection $utilisateurs;

    #[ORM\OneToMany(mappedBy: 'commune', targetEntity: CodePostal::class)]
    private Collection $codePostaux;

    #[ORM\ManyToOne(inversedBy: 'communes')]
    private ?Localite $localite = null;


    public function __construct()
    {
        $this->utilisateurs = new ArrayCollection();
        $this->codePostaux = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommune(): ?string
    {
        return $this->commune;
    }

    public function setCommune(string $commune): self
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * @return Collection<int, Utilisateur>
     */
    public function getUtilisateurs(): Collection
    {
        return $this->utilisateurs;
    }

    public function addUtilisateur(Utilisateur $utilisateur): self
    {
        if (!$this->utilisateurs->contains($utilisateur)) {
            $this->utilisateurs->add($utilisateur);
            $utilisateur->setCommune($this);
        }

        return $this;
    }

    public function removeUtilisateur(Utilisateur $utilisateur): self
    {
        if ($this->utilisateurs->removeElement($utilisateur)) {
            // set the owning side to null (unless already changed)
            if ($utilisateur->getCommune() === $this) {
                $utilisateur->setCommune(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->commune;
    }

    /**
     * @return Collection<int, CodePostal>
     */
    public function getCodePostaux(): Collection
    {
        return $this->codePostaux;
    }

    public function addCodePostaux(CodePostal $codePostaux): self
    {
        if (!$this->codePostaux->contains($codePostaux)) {
            $this->codePostaux->add($codePostaux);
            $codePostaux->setCommune($this);
        }

        return $this;
    }

    public function removeCodePostaux(CodePostal $codePostaux): self
    {
        if ($this->codePostaux->removeElement($codePostaux)) {
            // set the owning side to null (unless already changed)
            if ($codePostaux->getCommune() === $this) {
                $codePostaux->setCommune(null);
            }
        }

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

}
