<?php

namespace Icg\Files;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageService {

    private $width;

    private $height;
    /**
     * manage the image manipulation
     * @todo cant generate multiple size
     * @param [type] $directory
     * @param [type] $image
     * @param [type] $sizes
     * @return void
     */
    public static function generateBase64Image($directory, $image, $sizes) {
        self::makeDirectory($directory, $mode = 0775, true, true);
        // check if image is an url base64 or ??
        if (!isset($image)) {
            // throw new \Exception('Image file is required.');
            // request()->has('')
            return rejectResponse('Image content is required');
        }

        try {
            $image = Image::make(file_get_contents($image));
            $w     = $image->width();
            $h     = $image->height();
            if (isset($sizes['enhancement'])) {
                for ($i = 0; $i <= $sizes["enhancement"]; $i++) {
                    $size = $sizes["enhancement"];
                    $name = $sizes["name"];
                    if ($i == 0) {
                        $output = sprintf('%s/%s', $directory, $name, $size);
                        $image->save($output . '.png');
                    } else {
                        $output = sprintf('%s/%s@%s', $directory, $name, $i * 10);
                        $size   = 400 * $i;
                        $image->resize($size, $size)->save($output . '.png');
                    }
                }
            } else {
                $name   = isset($sizes["name"]) ? unique() : $sizes["name"];
                $output = sprintf('%s/%s', $directory, $name, $size);
                $image->save($output . '.png');
            }
        } catch (\Exception $ex) {
        }
    }

    private static function makedirectory($path) {
        File::makeDirectory($path, $mode = 0755, true, true);
    }

    private static function isDir($directory) {
        return File::exists($directory);
    }

    /* todo */
    public static function retrieveBase64Image() {
    }
}
