<?php

return [
    'status_type' => [
        'general' => 'General',
        'payment' => 'Payment',
        'shipping' => 'Shipping',
        'admin' => [
            'system' => [
                'label' => 'Order Status',
                'plural_title' => 'Order Statuses',
            ],
            'form' => [
                'name' => 'Name',
                'type' => 'Type',
                'color' => 'BackEnd Color',
                'hex_color' => 'FrontEnd Color',
                'is_default' => 'Is Default?',
            ],
            'list' => [
                'name' => 'Name',
                'type' => 'Type',
                'is_default' => 'Is Default?',
            ],
        ],
    ],
    'admin' => [
        'system' => [
            'label' => 'Order',
            'plural_title' => 'Orders',
        ],
        'actions' => [
            'general_status' => [
                'title' => 'Change Status',
                'new_status' => 'New General Status',
            ],
            'payment_status' => [
                'title' => 'Change Status',
                'new_status' => 'New Status',
            ],
            'shipping_status' => [
                'title' => 'Change Status',
                'new_status' => 'New Status',
            ],
        ],
        'view' => [
            'general' => [
                'title' => 'General Information',
                'general_status_id' => 'Order Status',
                'payment_status_id' => 'Payment Status',
                'shipping_status_id' => 'Shipping Status',
                'ip' => 'IP Address',
                'created_at' => 'Created Date',
                'updated_at' => 'Last Modified Date',
                'shipped_at' => 'Shipped Date',
                'shipped_at_action' => [
                    'title' => '',
                    'new_date' => 'Select Shipped Date',
                ],
                'paid_at' => 'Paid Date',
                'paid_at_action' => [
                    'title' => '',
                    'new_date' => 'Select Paid Date',
                ],

                'payment_method' => 'Payment Method',
                'shipping_method' => 'Shipping Method',
            ],
            'user' => [
                'title' => 'User Information',
                'user' => 'User',
                'user_data' => [
                    'name_surname' => 'Name and Surname',
                    'email' => 'Email',
                    'phone' => 'Phone',
                    'birthday' => 'Birthday',
                    'company' => 'Company',
                    'vat' => 'VAT',
                ],
                'guest' => 'Guest',
            ],
            'shipping_address' => [
                'title' => 'Shipping Address',
                'country' => 'Country',
                'region' => 'Region',
                'city' => 'City',
                'zip' => 'Zip',
                'address' => 'Address',
            ],

            'billing_address' => [
                'title' => 'Billing Address',
                'country' => 'Country',
                'region' => 'Region',
                'city' => 'City',
                'zip' => 'Zip',
                'address' => 'Address',
            ],
        ],
        'list' => [
            'user' => 'User',
            'email' => 'Email',
            'general_status' => 'Status',
            'payment_status' => 'Payment Status',
            'shipping_status' => 'Shipping Status',
            'total' => 'Total',
            'filter' => [
                'general_status' => 'Status',
                'payment_status' => 'Payment Status',
                'shipping_status' => 'Shipping Status',
            ],
            'user_guest' => 'Guest',
        ],
    ],
    'products' => [
        'admin' => [
            'product_data' => [
                'name' => 'Product Name',
            ],
            'quantity' => 'Quantity',
            'price' => 'Price',
            'total' => 'Total',
            'summary' => [
                'total_products' => 'Total Products',
                'total_shipping' => 'Total Shipping',
                'total_payment_fee' => 'Total Payment Fee',
                'total_pre_payment' => 'Total',
            ],
        ],
    ],
    'card' => [
        'show_link' => 'View Order',
        'number' => 'Order Number',
        'purchased' => 'Purchased',
        'payed' => 'Payed',
        'shipped' => 'Shipped',
        'total' => 'Total',
        'status' => 'Status',
    ],
    'confirmation' => [
        'mail' => [
            'customer' => [
                'subject' => 'Order created successfully',
                'header' => 'Order has been created',
                'thank_you' => 'Thank you for your order! We are pleased to confirm that your order #:order_hash has been successfully placed.',
                'details' => 'Order Details:',
                'will_another_mail' => 'You will receive another email with information about order. If you have any questions, feel free to contact our support team.',
                'order_status' => 'You can view your order status here:',
                'order_status_link' => 'View Order',
                'hello' => 'Hello :name :surname,',
                'detail_order_hash' => 'Order Number: #:order_hash ',
                'detail_date' => 'Order Date: :created_at_format',
                'detail_total' => 'Total Amount: ',
            ],
            'admin' => [
                'subject' => 'You have a new order',
                'header' => 'Order has been created',
                'text' => 'You have received a new order. ',
                'link' => 'View Order',
            ],
        ],
    ],
];
