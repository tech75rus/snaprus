<?php

namespace App\Service;

use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class LoadImage {

    public string $directory;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
    }

    public function setImage(UploadedFile $image): void {
        $image->move($this->directory, $image->getClientOriginalName());
        switch ($image->getClientOriginalExtension()) {
            case 'jpeg' || 'jpg' || 'JPG' || 'JPEG':
                $gd = imagecreatefromjpeg($this->directory . '/' . $image->getClientOriginalName());
                $big = $this->directory . '/' . pathinfo($image->getClientOriginalName(), \PATHINFO_FILENAME) . '-big' . '.webp';
                $middle = $this->directory . '/' . pathinfo($image->getClientOriginalName(), \PATHINFO_FILENAME) . '.webp';
                $small = $this->directory . '/' . pathinfo($image->getClientOriginalName(), \PATHINFO_FILENAME) . '.webp';
                imagescale($gd, 600, 600);
                imagewebp($gd, $big);
                imagedestroy($gd);
                break;
            case 'png' || 'PNG':
                $gd = imagecreatefrompng($this->directory . '/' . $image->getClientOriginalName());
                imagewebp($gd, $this->directory . '/' . pathinfo($image->getClientOriginalName(), \PATHINFO_FILENAME) . '.webp');
                imagedestroy($gd);
                break;
            case 'webp' || 'WEBP':
                $gd = imagecreatefromwebp($this->directory . '/' . $image->getClientOriginalName());
                imagewebp($gd, $this->directory . '/' . pathinfo($image->getClientOriginalName(), \PATHINFO_FILENAME) . '.webp');
                imagedestroy($gd);
                break;
        }
    }
}