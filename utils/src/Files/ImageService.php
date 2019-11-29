<?php

namespace Icg\Files;

use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ImageService {

    private $storagePath;

    private $filename;

    private $image;

    private $extension = 'png';

    private $url = null;

    private $fileUrl = null;

    public function __construct($image, $storagePath, $url, $filename = null) {
        $tempFile          = file_get_contents($image, false, stream_context_create(array('ssl' => array('verify_peer' => false, 'verify_peer_name' => false))));
        $this->image       = Image::make($tempFile);
        $this->storagePath = $storagePath;
        $this->filename    = $filename;
        $this->url         = $url;
        $this->height      = $this->image->height();
        $this->width       = $this->image->width();
        $this->mime        = $this->image->mime();
        $this->size        = $this->image->filesize();
        $this->fileInfo    = $this->image->exif();
    }

    public function getImage() {
        return $this->image;
    }

    public function setExtension($e) {
        // @todo limit only available mime types
        $this->extension = $e;
        return $this;
    }

    public function getBaseUrl() {
        return url('/') . '/' . $this->url;
    }

    public function getFileName() {
        return $this->filename ?? uniqid();
    }

    public function save() {
        try {
            File::makeDirectory($this->storagePath, 0777, true, true);
            $file = $this->getFileName() . '.' . $this->extension;
            if ($this->image->save($this->storagePath . '/' . $file)) {
                $this->fileUrl = sprintf('%s/%s', $this->getBaseUrl(), $file);
                $this->image->destroy();
                return $this;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }

    public function getFileInfo() {
        return [
            'width'    => $this->width,
            'height'   => $this->height,
            'mime'     => $this->mime,
            'size'     => $this->size,
            'fileinfo' => $this->fileInfo,
            'url'      => $this->fileUrl,
        ];
    }

}