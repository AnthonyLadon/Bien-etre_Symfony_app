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

    #[ORM\OneToMany(mappedBy: 'prestataire', targetEntity: Stage::class, orphanRemoval: true)]
    private Collection $stage;

    #[ORM\OneToMany(mappedBy: 'prestataire', targetEntity: Promotion::class)]
    private Collection $promotion;

    #[ORM\OneToMany(mappedBy: 'prestataire', targetEntity: Commentaire::class)]
    private Collection $commentaires;

    #[ORM\OneToMany(mappedBy: 'images_Logo', targetEntity: Images::class)]
    private Collection $images;

    #[ORM\OneToMany(mappedBy: 'images_photo', targetEntity: Images::class)]
    private Collection $images_photo;

    #[ORM\ManyToMany(targetEntity: CategorieService::class, inversedBy: 'prestataires')]
    private Collection $proposer;

    #[ORM\ManyToMany(targetEntity: Internaute::class, inversedBy: 'prestataires')]
    private Collection $favori;

    #[ORM\OneToOne(mappedBy: 'prestataire', cascade: ['persist', 'remove'])]
    private ?Utilisateur $utilisateur = null;

    public function __construct()
    {
        $this->stage = new ArrayCollection();
        $this->promotion = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->images_photo = new ArrayCollection();
        $this->proposer = new ArrayCollection();
        $this->favori = new ArrayCollection();
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

    /**
     * @return Collection<int, Promotion>
     */
    public function getPromotion(): Collection
    {
        return $this->promotion;
    }

    public function addPromotion(Promotion $promotion): self
    {
        if (!$this->promotion->contains($promotion)) {
            $this->promotion->add($promotion);
            $promotion->setPrestataire($this);
        }

        return $this;
    }

    public function removePromotion(Promotion $promotion): self
    {
        if ($this->promotion->removeElement($promotion)) {
            // set the owning side to null (unless already changed)
            if ($promotion->getPrestataire() === $this) {
                $promotion->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commentaire>
     */
    public function getCommentaires(): Collection
    {
        return $this->commentaires;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaires->contains($commentaire)) {
            $this->commentaires->add($commentaire);
            $commentaire->setPrestataire($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaires->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getPrestataire() === $this) {
                $commentaire->setPrestataire(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Images $image): self
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setImagesLogo($this);
        }

        return $this;
    }

    public function removeImage(Images $image): self
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getImagesLogo() === $this) {
                $image->setImagesLogo(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Images>
     */
    public function getImagesPhoto(): Collection
    {
        return $this->images_photo;
    }

    public function addImagesPhoto(Images $imagesPhoto): self
    {
        if (!$this->images_photo->contains($imagesPhoto)) {
            $this->images_photo->add($imagesPhoto);
            $imagesPhoto->setImagesPhoto($this);
        }

        return $this;
    }

    public function removeImagesPhoto(Images $imagesPhoto): self
    {
        if ($this->images_photo->removeElement($imagesPhoto)) {
            // set the owning side to null (unless already changed)
            if ($imagesPhoto->getImagesPhoto() === $this) {
                $imagesPhoto->setImagesPhoto(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, CategorieService>
     */
    public function getProposer(): Collection
    {
        return $this->proposer;
    }

    public function addProposer(CategorieService $proposer): self
    {
        if (!$this->proposer->contains($proposer)) {
            $this->proposer->add($proposer);
        }

        return $this;
    }

    public function removeProposer(CategorieService $proposer): self
    {
        $this->proposer->removeElement($proposer);

        return $this;
    }

    /**
     * @return Collection<int, Internaute>
     */
    public function getFavori(): Collection
    {
        return $this->favori;
    }

    public function addFavori(Internaute $favori): self
    {
        if (!$this->favori->contains($favori)) {
            $this->favori->add($favori);
        }

        return $this;
    }

    public function removeFavori(Internaute $favori): self
    {
        $this->favori->removeElement($favori);

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        // unset the owning side of the relation if necessary
        if ($utilisateur === null && $this->utilisateur !== null) {
            $this->utilisateur->setPrestataire(null);
        }

        // set the owning side of the relation if necessary
        if ($utilisateur !== null && $utilisateur->getPrestataire() !== $this) {
            $utilisateur->setPrestataire($this);
        }

        $this->utilisateur = $utilisateur;

        return $this;
    }
}
