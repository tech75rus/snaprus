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

    public function setImage(UploadedFile $image): array {
        $array = [];
        $projectPath = $this->directory . uniqid() . '/';
        $image->move($projectPath, $image->getClientOriginalName());
        $array['orogin'] = $projectPath . $image->getClientOriginalName();
        $imagePath = $projectPath . pathinfo($image->getClientOriginalName(), \PATHINFO_FILENAME);
        switch ($image->getClientOriginalExtension()) {
            case 'jpeg' || 'jpg' || 'JPG' || 'JPEG' || 'png' || 'PNG':
                $imagick = new \Imagick($projectPath . $image->getClientOriginalName());
                $imagick->setImageFormat('WEBP');
                $imagick->setImageCompressionQuality(80);
                $imagick->writeImage($imagePath . '.webp');
                $array['big'] = $imagePath . '.webp';
                $imagick->thumbnailImage(900, 900, true);
                $imagick->writeImage($imagePath . '-900'. '.webp');
                $array['middle'] = $imagePath . '-900'. '.webp';
                $imagick->thumbnailImage(500, 500, true);
                $imagick->writeImage($imagePath . '-500'. '.webp');
                $array['small'] = $imagePath . '-500'. '.webp';
                break;
            case 'webp' || 'WEBP':
                $imagick = new \Imagick($projectPath . $image->getClientOriginalName());
                $array['big'] = $imagePath;
                $imagick->thumbnailImage(900, 900, true);
                $imagick->writeImage($imagePath . '-900'. '.webp');
                $array['middle'] = $imagePath . '-900'. '.webp';
                $imagick->thumbnailImage(500, 500, true);
                $imagick->writeImage($imagePath . '-500'. '.webp');
                $array['small'] = $imagePath . '-500'. '.webp';
                break;
        }
        return $array;
    }
}