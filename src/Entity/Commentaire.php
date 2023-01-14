<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentaireRepository::class)]
class Commentaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $contenu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEncodage = null;

    #[ORM\OneToMany(mappedBy: 'commentaire', targetEntity: Abus::class)]
    private Collection $abuses;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    private ?Internaute $internaute = null;

    #[ORM\ManyToOne(inversedBy: 'commentaires')]
    private ?Prestataire $prestataire = null;

    public function __construct()
    {
        $this->abuses = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getDateEncodage(): ?\DateTimeInterface
    {
        return $this->dateEncodage;
    }

    public function setDateEncodage(\DateTimeInterface $dateEncodage): self
    {
        $this->dateEncodage = $dateEncodage;

        return $this;
    }

    /**
     * @return Collection<int, Abus>
     */
    public function getAbuses(): Collection
    {
        return $this->abuses;
    }

    public function addAbuse(Abus $abuse): self
    {
        if (!$this->abuses->contains($abuse)) {
            $this->abuses->add($abuse);
            $abuse->setCommentaire($this);
        }

        return $this;
    }

    public function removeAbuse(Abus $abuse): self
    {
        if ($this->abuses->removeElement($abuse)) {
            // set the owning side to null (unless already changed)
            if ($abuse->getCommentaire() === $this) {
                $abuse->setCommentaire(null);
            }
        }

        return $this;
    }

    public function getInternaute(): ?Internaute
    {
        return $this->internaute;
    }

    public function setInternaute(?Internaute $internaute): self
    {
        $this->internaute = $internaute;

        return $this;
    }

    public function getPrestataire(): ?Prestataire
    {
        return $this->prestataire;
    }

    public function setPrestataire(?Prestataire $prestataire): self
    {
        $this->prestataire = $prestataire;

        return $this;
    }
}
