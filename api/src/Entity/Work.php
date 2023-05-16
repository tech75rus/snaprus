<?php

namespace App\Entity;

use App\Repository\WorkRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: WorkRepository::class)]
class Work
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'work', targetEntity: Likes::class)]
    private Collection $likes;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeImmutable $create_at = null;

    #[ORM\Column(options: ["default" => "CURRENT_TIMESTAMP"])]
    private ?\DateTimeImmutable $update_at = null;

    #[ORM\Column(options: ["default" => "json_object()"])]
    private array $image = [];

    public function __construct()
    {
        $this->create_at = new \DateTimeImmutable();
        $this->update_at = new \DateTimeImmutable();
        $this->likes = new ArrayCollection();
    }

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

    /**
     * @return Collection<int, Likes>
     */
    public function getLikes(): Collection
    {
        return $this->likes;
    }

    public function addLike(Likes $like): self
    {
        if (!$this->likes->contains($like)) {
            $this->likes->add($like);
            $like->setWork($this);
        }

        return $this;
    }

    public function removeLike(Likes $like): self
    {
        if ($this->likes->removeElement($like)) {
            // set the owning side to null (unless already changed)
            if ($like->getWork() === $this) {
                $like->setWork(null);
            }
        }

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

    public function getCreateAt(): ?\DateTimeImmutable
    {
        return $this->create_at;
    }

    public function setCreateAt(\DateTimeImmutable $create_at): self
    {
        $this->create_at = $create_at;

        return $this;
    }

    public function getUpdateAt(): ?\DateTimeImmutable
    {
        return $this->update_at;
    }

    public function setUpdateAt(\DateTimeImmutable $update_at): self
    {
        $this->update_at = $update_at;

        return $this;
    }

    public function getImage(): array
    {
        return $this->image;
    }

    public function setImage(array $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function setImages($imageFiles): self
    {
        $arrayImage = [];
        if (empty($imageFiles)) {
            return $this;
        }
        if (!file_exists($this->dirImage)) { // существует ли директория
            mkdir($this->dirImage, 0777, true);
        }

        $uniqProduct = uniqid('/'); // уникальное имя папки продукта
        $arrayImage[$uniqProduct] = []; // сохраняем уникальное имя пакпки в массиве

        mkdir($this->dirImage . $uniqProduct); // создаем папку продукта

        foreach ($imageFiles as $img) {
            $uniqImage = uniqid('/'); // уникальное имя папки изображение
            $arrayImage[$uniqProduct][$uniqImage] = []; // сохраняем его в массиве

            $text = strstr($img, ',', false); // обрезаем не нужное
            $base64 = substr($text, 1); // еще немного обрезаем
            $bin = base64_decode($base64); // декодируем иизображение
            if (strlen($bin) > 7400000) { // проверям на размер изображения
                continue;
            }

            $result = imagecreatefromstring($bin); // создаем изображение для GD

            $uniqOrigin = uniqid('/origin-') . '.webp';
            mkdir($this->dirImage . $uniqProduct . $uniqImage); // создаем папку для изображения
            $fullPath = $this->dirImage . $uniqProduct . $uniqImage . $uniqOrigin;
            imagewebp($result, $fullPath);
            $arrayImage[$uniqProduct][$uniqImage][] = $uniqOrigin;

            $gd = imagecreatefromwebp($fullPath);

            $uniq600 = uniqid('/600x600-') . '.webp';
            $result = imagescale($gd, 600, 600);
            $fullPath = $this->dirImage . $uniqProduct . $uniqImage . $uniq600;
            imagewebp($result, $fullPath); // сохраняем изображение
            $arrayImage[$uniqProduct][$uniqImage][] = $uniq600;

            $uniq300 = uniqid('/300x300-') . '.webp';
            $result = imagescale($gd, 300, 300);
            $fullPath = $this->dirImage . $uniqProduct . $uniqImage . $uniq300;
            imagewebp($result, $fullPath);
            $arrayImage[$uniqProduct][$uniqImage][] = $uniq300;

            $uniq150 = uniqid('/150x150-') . '.webp';
            $result = imagescale($gd, 150, 150);
            $fullPath = $this->dirImage . $uniqProduct . $uniqImage . $uniq150;
            imagewebp($result, $fullPath);
            $arrayImage[$uniqProduct][$uniqImage][] = $uniq150;

        }

        $this->image =  $arrayImage;

        return $this;
    }

    public function deleteImages(array $images = []): bool
    {
        if (empty($images)) {
            return false;
        }
        $productPath = '';
        $imagePath = [];
        $fullPath = [];
        foreach ($images as $product => $img) {
            $productPath = $this->dirImage . $product;
            foreach ($img as $key => $items) {
                $imagePath[] = $this->dirImage . $product . $key;
                foreach ($items as $item) {
                    $text = $this->dirImage . $product . $key;
                    $text .= $item;
                    $fullPath[] = $text;
                }
            }
        }
        foreach ($fullPath as $path) {
            unlink($path);
        }
        foreach ($imagePath as $item) {
            rmdir($item);
        }
        rmdir($productPath);
        return true;
    }
}
