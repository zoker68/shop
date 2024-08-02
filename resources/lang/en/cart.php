<?php

return [
    'exceptions' => [
        'published' => 'Product not found or not published',
        'stock' => 'Requested quantity not available in stock',
        'product_not_find_in_cart' => 'Product not found in cart',
    ],
    'added' => 'Product successfully added to cart',
    'removed' => 'Product successfully removed from cart',
    'error' => [
        'required' => 'Quantity is required',
        'integer' => 'Quantity must be an number',
        'min' => 'Quantity must be greater than 0',
        'empty' => 'Cart is empty',
        'stock' => 'This quantity is not in stock. Available quantity: :quantity',
        'outOfStock' => 'Some items in your cart are out of stock',
        'available' => 'This product is not available at the moment',
        'notAvailable' => 'Some items in your cart are currently unavailable',
    ],
    'breadcrumbs' => 'Shopping cart',
    'column' => [
        'product' => 'Product',
        'quantity' => 'Quantity',
        'total_price' => 'Total Price',
    ],
    'to_checkout' => 'Process to checkout',
    'side' => [
        'title' => 'Order Summary',
        'subtotal' => 'Subtotal',
        'shipping_price' => 'Delivery',
        'payment_fee' => 'Payment fee',
        'total' => 'Total',
    ],
];
