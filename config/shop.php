<?php

use Zoker\Shop\Enums\ProductsSorting;

return [

    'maintenance_mode' => false, // Access to site only for admin users

    'category' => [
        'includeChildren' => true, // Turn on the products from subcategories
        'perPage' => 12, // Number of products per page
        'defaultSort' => ProductsSorting::BESTSELLERS, // Default sort
        'filters' => [
            'hideVariantsMoreThan' => 5,
        ],
    ],
    'product' => [
        'allow_overstock' => false, // true = allow overstock
    ],
    'mail_recipients' => [
        'reviews' => env('MAIL_FOR_REVIEW', env('MAIL_TO', 'zoker@localshop')),
        'contact' => env('MAIL_FOR_CONTACT', env('MAIL_TO', 'zoker@localshop')),
    ],

    'reset_password_expire' => 15, //in minutes

    //TODO: delete
    'widgets' => [
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

        'plugins' => [
        ],
    ],

    'disk' => env('SHOP_DISK', 'public'),
];
