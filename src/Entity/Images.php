<?php

namespace App\Entity;

use App\Repository\ImagesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImagesRepository::class)]
class Images
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $ordre = null;

    #[ORM\Column(nullable: true)]
    private ?string $image = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    private ?Prestataire $images_Logo = null;

    #[ORM\ManyToOne(inversedBy: 'images_photo')]
    private ?Prestataire $images_photo = null;

    #[ORM\OneToOne(mappedBy: 'image', cascade: ['persist', 'remove'])]
    private ?CategorieService $categorieService = null;

    #[ORM\OneToOne(inversedBy: 'image', cascade: ['persist', 'remove'])]
    private ?Internaute $image_internaute = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getOrdre(): ?int
    {
        return $this->ordre;
    }

    public function setOrdre(?int $ordre): self
    {
        $this->ordre = $ordre;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getImagesLogo(): ?Prestataire
    {
        return $this->images_Logo;
    }

    public function setImagesLogo(?Prestataire $images_Logo): self
    {
        $this->images_Logo = $images_Logo;

        return $this;
    }

    public function getImagesPhoto(): ?Prestataire
    {
        return $this->images_photo;
    }

    public function setImagesPhoto(?Prestataire $images_photo): self
    {
        $this->images_photo = $images_photo;

        return $this;
    }

    public function getCategorieService(): ?CategorieService
    {
        return $this->categorieService;
    }

    public function setCategorieService(?CategorieService $categorieService): self
    {
        // unset the owning side of the relation if necessary
        if ($categorieService === null && $this->categorieService !== null) {
            $this->categorieService->setImage(null);
        }

        // set the owning side of the relation if necessary
        if ($categorieService !== null && $categorieService->getImage() !== $this) {
            $categorieService->setImage($this);
        }

        $this->categorieService = $categorieService;

        return $this;
    }

    public function getImageInternaute(): ?Internaute
    {
        return $this->image_internaute;
    }

    public function setImageInternaute(?Internaute $image_internaute): self
    {
        $this->image_internaute = $image_internaute;

        return $this;
    }

    public function __toString()
    {
        return $this->image;
    }

}
