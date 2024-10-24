<?php

use Zoker\Shop\Enums\ProductsSorting;

return [
    'category' => [
        'includeChildren' => true, // Turn on the products from subcategories
        'perPage' => 12, // Number of products per page
        'defaultSort' => ProductsSorting::BESTSELLERS, // Default sort
        'filters' => [
            'hideVariantsMoreThan' => 5,
        ],
    ],
    'product' => [
        'cover' => [
            'ratio' => [ // null = free cropping
                null,
                '4:3',
            ],
        ],
        'allow_overstock' => false, // true = allow overstock
    ],
    'mail_recipients' => [
        'reviews' => env('MAIL_TO_REVIEW', env('MAIL_TO', 'zoker@localshop')),
    ],

    'reset_password_expire' => 15, //in minutes

    'widgets' => [
        'slider' => [
            'image_ratio' => [
                null, '4:3', '16:9', '1:1', '2:1', '3:1', '4:1',
            ],
        ],
        'tops' => [
            'ranking' => [
                'categories' => [
                    2, 3, 4, 5,
                ],
                'show_index' => true,
                'limit' => 4,
                'sort' => ProductsSorting::RANKING_DESC,
            ],
        ],

    ],

    'filament' => [
        'path' => app_path('Filament/Resources'),
        'namespace' => 'App\\Filament\\Resources',
    ],
];
