<?php

namespace App\Services;

use Gedmo\Sluggable\Util\Urlizer;
use Symfony\Component\HttpFoundation\File\UploadedFile;

Class UploaderHelper{

    private $uploadsPath;

    public function __construct(string $uploadsPath){
        $this->uploadsPath = $uploadsPath;
    }

    public function uploadImages(UploadedFile $uploadedFile): string
    {
        $destination = $this->uploadsPath;

        $originalImageName = pathinfo($uploadedFile->getClientOriginalName(), PATHINFO_FILENAME);
        $newImageName = Urlizer::urlize($originalImageName).'-'.uniqid().'.'.$uploadedFile->guessExtension();


        $uploadedFile->move(
        $destination,
        $newImageName
        );

        return $newImageName;
    }

}