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
                $imagick = new \Imagick($this->directory . '/' . $image->getClientOriginalName());
                // $imagick->enhanceImage();
                // $imagick->cropThumbnailImage(500, 500, true);
                $imagick->setImageFormat('WEBP');
                // $imagick->thumbnailImage(500, 200, true);
                $imagick->setImageCompressionQuality(80);
                $imagick->writeImage($this->directory . '/' . pathinfo($image->getClientOriginalName(), \PATHINFO_FILENAME) . '.webp');
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