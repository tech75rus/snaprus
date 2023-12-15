<?php

namespace App\Service;

use Exception;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class LoadImage {

    public string $directory;

    public function __construct(string $directory)
    {
        $this->directory = $directory;
    }

    public  function setImage(UploadedFile $image): void {
        $image->move($this->directory, $image->getClientOriginalName());
    }
}