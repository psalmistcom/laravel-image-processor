# Laravel Image Processor

![Packagist Version](https://img.shields.io/packagist/v/your-vendor/laravel-image-processor)
![PHP Version](https://img.shields.io/packagist/php-v/your-vendor/laravel-image-processor)
![Laravel Version](https://img.shields.io/badge/Laravel-9.x%20%7C%2010.x-ff2d20)
![License](https://img.shields.io/packagist/l/your-vendor/laravel-image-processor)

A powerful image manipulation package for Laravel with an elegant, fluent API. Easily resize, crop, and customize images before saving.

## ✨ Features

- 🖼️ Multiple manipulation methods (resize, crop, fit, watermark)
- ⚙️ Configurable presets for common image sizes
- 🏷️ Watermark support with positioning options
- 🔄 Image format conversion (jpg, png, webp)
- � Aspect ratio preservation
- 🚀 Supports both GD and Imagick drivers
- 📦 Simple installation and configuration

## 📦 Installation

Install via Composer:

```bash
composer require your-vendor/laravel-image-processor
```

Publish the config file (optional):

```bash
php artisan vendor:publish --provider="YourVendor\ImageProcessor\ImageProcessorServiceProvider" --tag="config"
```

⚙️ Configuration

Edit ![config/image-processor.php] to customize:

```bash
return [
    'driver' => env('IMAGE_DRIVER', 'gd'), // 'gd' or 'imagick'

    'defaults' => [
        'quality' => 90,
        'format' => 'jpg',
    ],

    'presets' => [
        'thumbnail' => [
            'width' => 150,
            'height' => 150,
            'method' => 'fit',
        ],
        // Add your custom presets here
    ],
];
```

🚀 Basic Usage

Process an Uploaded Image

```bash
use YourVendor\ImageProcessor\Facades\ImageProcessor;

$path = ImageProcessor::make($request->file('image'))
    ->resize(1200, 800)
    ->save('storage/app/public/images/processed.jpg');
```
