<?php

namespace Highq\ImageProcessor;

use Intervention\Image\ImageManager;
use Intervention\Image\Image as InterventionImage;

class ImageProcessor
{
    protected $manager;
    protected $image;
    protected $config;

    public function __construct()
    {
        $this->manager = new ImageManager(['driver' => config('image-processor.driver', 'gd')]);
        $this->config = config('image-processor');
    }

    public function make($image)
    {
        $this->image = is_string($image) ? $this->manager->make($image) : $image;
        return $this;
    }

    public function resize($width, $height, $aspectRatio = true)
    {
        $this->image->resize($width, $height, function ($constraint) use ($aspectRatio) {
            if ($aspectRatio) {
                $constraint->aspectRatio();
            }
        });

        return $this;
    }

    public function crop($width, $height, $x = null, $y = null)
    {
        $this->image->crop($width, $height, $x, $y);
        return $this;
    }

    public function fit($width, $height, $position = 'center')
    {
        $this->image->fit($width, $height, null, $position);
        return $this;
    }

    public function watermark($path, $position = 'bottom-right', $opacity = 50)
    {
        $watermark = $this->manager->make($path)->opacity($opacity);
        $this->image->insert($watermark, $position);
        return $this;
    }

    public function save($path, $quality = 90)
    {
        $this->image->save($path, $quality);
        return $path;
    }

    public function encode($format = 'jpg', $quality = 90)
    {
        return (string) $this->image->encode($format, $quality);
    }

    public function getImage()
    {
        return $this->image;
    }
}
