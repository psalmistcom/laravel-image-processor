<?php

namespace Highq\ImageProcessor;

use Illuminate\Support\ServiceProvider;
use Highq\ImageProcessor\ImageProcessor;

class ImageProcessorServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton('image-processor', function ($app) {
            return new ImageProcessor();
        });

        $this->mergeConfigFrom(
            __DIR__ . '/../config/image-processor.php',
            'image-processor'
        );
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/image-processor.php' => config_path('image-processor.php'),
        ], 'config');
    }
}
