<?php

use Zoker\Shop\Enums\ProductsSorting;

return [

    'maintenance_mode' => env('MAINTENANCE_MODE', false), // Access to site only for admin users

    'category' => [
        'includeChildren' => true, // Turn on the products from subcategories
        'perPage' => 12, // Number of products per page
        'defaultSort' => ProductsSorting::BESTSELLERS, // Default sort
        'filters' => [
            'hideVariantsMoreThan' => 1,
        ],
    ],
    'product' => [
        'allow_overstock' => false, // true = allow overstock
    ],
    'mail_recipients' => [
        'reviews' => env('MAIL_FOR_REVIEW', env('MAIL_TO', 'zoker@localshop')),
        'contact' => env('MAIL_FOR_CONTACT', env('MAIL_TO', 'zoker@localshop')),
        'order' => env('MAIL_FOR_ORDER', env('MAIL_TO', 'zoker@localshop')),
    ],

    'reset_password_expire' => 15, // in minutes

    'filament' => [
        'path' => app_path('Filament/Resources'),
        'namespace' => 'App\\Filament\\Resources',

        'plugins' => [
        ],
    ],

    'disk' => env('SHOP_DISK', 'public'),

    'payment_status_id' => [// null - use default status
        'new' => null,
        'success' => 9,
        'fail' => null,
    ],

    'stripe' => [
        'success_route' => 'checkout.success',
        'cancel_route' => 'checkout.failed',
    ],

    'cover_default_url' => null,
];
