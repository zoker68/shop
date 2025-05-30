<?php

return [
    'brand' => 'Brand:',
    'stock' => 'Availability:',
    'in_stock' => 'In Stock',
    'out_of_stock' => 'Out of Stock',
    'quantity' => 'Quantity',
    'add_to_cart' => 'Add to Cart',
    'wishlist' => [
        'remove' => 'In wishlist',
        'add' => 'Add to Wishlist',
    ],
    'tabs' => [
        'properties' => 'Product Info',
        'questions' => 'Question & Answer',
        'reviews' => 'Review (:count_reviews)',
    ],
    'ratings' => [
        'count' => '{0} No Rating|{1} 1 Rating|[2,*] :count Ratings',
    ],
    'questions' => [
        'count' => '{0} No Question about this product|[1,*] Question about this product (:count)',
        'store_admin' => 'Store Admin',
        'new' => [
            'placeholder' => 'Type your question',
            'submit' => 'Ask Question',
            'placeholder_guest' => 'For ask a question please log in',
            'success' => 'Question successfully added. We will answer you as soon as possible and publish it on our site. Thank you! ',
            'mail' => [
                'subject' => 'Question Added',
                'header' => 'You have new question about product',
                'product' => 'Product:',
                'question' => 'Question:',
                'before_link' => 'You can answer the question on the admin panel:',
                'link' => 'Answer the question',
            ],
        ],
        'errors' => [
            'required' => 'The question is required',
            'min' => 'The question must be at least :min characters',
            'max' => 'The question may not be greater than :max characters',
            'must_login' => 'You must be logged in to ask a question',
        ],
        'admin' => [
            'system' => [
                'label' => 'Question about product',
                'plural_title' => 'Questions about products',
            ],
            'list' => [
                'tab' => [
                    'all' => 'All',
                    'published' => 'Published',
                    'moderation' => 'Moderation',
                ],
                'product' => 'Product',
                'user' => 'User',
                'question' => 'Question',
                'answer' => 'Answer',
            ],
            'form' => [
                'created_at' => 'Created Date',
                'updated_at' => 'Modified date',
                'product' => 'Product',
                'user' => 'User',
                'question' => 'Question',
                'answer' => 'Answer',
            ],
        ],
    ],
    'reviews' => [
        'title' => 'Product Reviews',
        'admin' => [
            'system' => [
                'label' => 'Review about product',
                'plural_title' => 'Reviews about products',
            ],
            'list' => [
                'tab' => [
                    'all' => 'All',
                    'published' => 'Published',
                    'moderation' => 'Moderation',
                ],
                'product' => 'Product',
                'user' => 'User',
                'rating' => 'Rating',
                'review' => 'Review',
                'published' => 'Published',
                'created_at' => 'Created Date',
            ],
            'form' => [
                'created_at' => 'Created Date',
                'updated_at' => 'Last Modified Date',
                'product' => 'Product',
                'user' => 'User',
                'rating' => 'Rating',
                'review' => 'Review',
                'published' => 'Published',
            ],
        ],
        'new' => [
            'rating' => 'Rating:',
            'placeholder' => 'Type your review',
            'submit' => 'Add Review',
            'placeholder_guest' => 'For add a review please log in',
            'success' => 'Review successfully added. We will moderate as soon as possible and publish it on our site. Thank you! ',
            'mail' => [
                'subject' => 'Review added',
                'header' => 'You have new review about product',
                'product' => 'Product:',
                'rating' => 'Rating:',
                'question' => 'Question:',
                'before_link' => 'You can moderate this review in the admin panel:',
                'link' => 'Go to moderation',
            ],
        ],
        'errors' => [
            'must_login' => 'You must be logged in to ask a question',
            'rating' => [
                'required' => 'Rating is required',
                'between' => 'Rating must be between :min and :max',
            ],
            'review' => [
                'min' => 'Review must be at least :min characters',
                'max' => 'Review may not be greater than :max characters',
            ],
        ],
    ],
    'admin' => [
        'system' => [
            'label' => 'Product',
            'plural_title' => 'Products',
        ],
        'list' => [
            'tab' => [
                'all' => 'All',
                'approved' => 'Approved',
                'rejected' => 'Rejected',
                'moderation' => 'Moderation',
            ],
            'name' => 'Name',
            'slug' => 'URL',
            'description' => 'Description',
            'image' => 'Cover image',
            'stock' => 'Stock',
            'price' => 'Price',
            'published' => 'Published',
            'brand' => 'Brand',
            'categories' => 'Categories',
        ],
        'form' => [
            'name' => 'Name',
            'slug' => 'URL',
            'description' => 'Description',
            'description_short' => 'Short description',
            'image' => 'Cover image',
            'stock' => 'Stock',
            'price' => 'Price',
            'brand' => 'Brand',
            'published' => 'Published',
            'foreign_id' => 'Foreign ID',
        ],
    ],
];
