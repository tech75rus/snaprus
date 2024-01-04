<?php

namespace App\Entity;

use App\Repository\ProjectRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectRepository::class)]
class Project
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $imageOrigin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $bigImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $middleImage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $smallImage = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImageOrigin(): ?string
    {
        return $this->imageOrigin;
    }

    public function setImageOrigin(string $imageOrigin): self
    {
        $this->imageOrigin = $imageOrigin;

        return $this;
    }

    public function getBigImage(): ?string
    {
        return $this->bigImage;
    }

    public function setBigImage(?string $bigImage): static
    {
        $this->bigImage = $bigImage;

        return $this;
    }

    public function getMiddleImage(): ?string
    {
        return $this->middleImage;
    }

    public function setMiddleImage(?string $middleImage): static
    {
        $this->middleImage = $middleImage;

        return $this;
    }

    public function getSmallImage(): ?string
    {
        return $this->smallImage;
    }

    public function setSmallImage(?string $smallImage): static
    {
        $this->smallImage = $smallImage;

        return $this;
    }
}
