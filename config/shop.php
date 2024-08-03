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
];
