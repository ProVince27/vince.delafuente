<?php

namespace Icg\Model\Traits;

use Icg\Files\ImageService;

trait SetImage {

   /**
    * Set image by using base64 images
    */
    public function setImage($image, $prefix = false) {
        $pathPrefix = !$prefix ? $this->upload_prefix : $prefix;
        $this->image = static::saveImage($image, $pathPrefix);
        return $this;
    }

    public static function saveImage($image, $prefix = false) {
        $pathPrefix = !$prefix ? (new self())->upload_prefix : $prefix;
        $path = "images/$pathPrefix";
        $packagePath = public_path($path);
        $file = uniqid();

        ImageService::generateBase64Image(
            $packagePath,
            $image,
            [
            'name'        => $file,
            'enhancement' => 0,
            ]
        );

        return sprintf('%s/%s/%s', url('/'), $path, $file . '.png');
    }
}
