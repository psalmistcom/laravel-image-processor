<?php

return [
    'driver' => 'gd', // 'gd' or 'imagick'

    'defaults' => [
        'quality' => 90,
        'format' => 'jpg',
    ],

    'presets' => [
        'thumbnail' => [
            'width' => 150,
            'height' => 150,
            'method' => 'fit', // 'resize', 'crop', or 'fit'
        ],
        'medium' => [
            'width' => 500,
            'height' => 500,
            'method' => 'resize',
            'aspect_ratio' => true,
        ],
        'large' => [
            'width' => 1024,
            'height' => 768,
            'method' => 'resize',
            'aspect_ratio' => true,
        ],
    ],
];
