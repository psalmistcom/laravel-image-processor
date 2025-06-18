<?php

namespace Highq\ImageProcessor\Facades;

use Illuminate\Support\Facades\Facade;

class ImageProcessor extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'image-processor';
    }
}
