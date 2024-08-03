<?php

return [
    'breadcrumbs' => 'Checkout',
    'error' => [
        'mainData' => [
            'email' => [
                'required' => 'Email is required.',
                'email' => 'Please enter a valid email address.',
                'unique' => 'Email already registered. Please login.',
            ],
            'name' => [
                'required' => 'First name is required.',
                'between' => 'First name must be between :min and :max characters.',
            ],
            'surname' => [
                'required' => 'Last name is required.',
                'between' => 'Last name must be between :min and :max characters.',
            ],
            'company' => [
                'between' => 'Company name must be between :min and :max characters.',
            ],
            'vat' => [
                'between' => 'Vat number must be between :min and :max characters.',
            ],
            'phone' => [
                'required' => 'Phone number is required.',
                'between' => 'Phone number must be between :min and :max characters.',
            ],
            'birthday' => [
                'required' => 'Date of birth is required.',
                'before' => 'Date of birth must be before :date.',
                'after' => 'Date of birth must be after :date',
            ],
            'password' => [
                'required' => 'Password is required.',
                'min' => 'Password must be at least :min characters.',
                'same' => 'Passwords do not match.',
            ],
            'password_confirmation' => [
                'required' => 'Confirm password is required.',
            ],
        ],
        'address' => [
            'country' => [
                'required' => 'Please select a country',
                'exists' => 'Please select a valid country',
            ],
            'region' => [
                'exists' => 'Please select a valid region',
            ],
            'city' => [
                'required' => 'Town is required.',
                'between' => 'Town must be between :min and :max characters.',
            ],
            'zip' => [
                'required' => 'Zip code is required.',
                'between' => 'Zip code must be between :min and :max characters.',
            ],
            'address' => [
                'required' => 'Address is required.',
                'between' => 'Address must be between :min and :max characters.',
            ],
        ],

    ],
    'customer' => [
        'title' => 'Customer information',
        'email' => 'Email Address',
        'have_account' => 'Already have an account?',
        'have_account_link' => 'Sign in',
        'as_guest' => 'As Guest',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'phone' => 'Phone Number',
        'company' => 'Company Name',
        'birthday' => 'Birthday',
        'vat' => 'Vat Number',
        'edit' => 'Edit profile data',
    ],
    'shipping_address' => [
        'title' => 'Shipping Address',
    ],
    'billing_address' => [
        'same_as_shipping' => 'Billing address is the same as shipping address',
        'title' => 'Billing Address',
    ],
    'agree_with' => 'I agree with',
    'agree_with_link' => 'terms & conditions',
    'submit' => 'Continue',
    'side' => [
        'cart' => [
            'title' => 'Your Order',
            'products' => 'Products',
            'subtotal' => 'Subtotal',
            'shipping_price' => 'Shipping',
            'payment_fee' => 'Payment fee',
            'total' => 'Total',
        ],
    ],
    'address' => [
        'select' => [
            'label' => 'Select Address',
            'placeholder' => 'Select address or type new',
        ],
        'country' => [
            'label' => 'Country',
            'placeholder' => 'Select country',
        ],
        'region' => [
            'label' => 'Region',
            'placeholder' => 'Select region',
        ],
        'city' => 'Town/City',
        'zip' => 'Zip Code',
        'address' => 'Address',
    ],
    'shipping' => [
        'breadcrumbs' => 'Shipping Method',
        'title' => 'Select delivery method',
        'admin' => [
            'list' => [
                'name' => 'Name',
                'price' => 'Price',
                'published' => 'Published',
            ],
            'form' => [
                'name' => 'Name',
                'price' => 'Price',
                'published' => 'Published',
                'description' => 'Description',
                'sort' => 'Sort',
                'available_from' => [
                    'label' => 'Amount From Available',
                    'description' => 'The order amount with which the method is available',
                ],
                'available_until' => [
                    'label' => 'Amount Until Available',
                    'description' => 'Order amount up to which the method is available',
                ],
                'days' => 'Estimated delivery time',
            ],
        ],
        'error' => [
            'method_not_available' => 'The selected shipping method is not available for your order.',
        ],
        'days' => 'Delivery time:',
        'submit' => 'Select method and continue',
        'price' => 'Price:',
    ],
    'payment' => [
        'breadcrumbs' => 'Payment Method',
        'admin' => [
            'list' => [
                'name' => 'Name',
                'code' => 'Code',
                'published' => 'Published',
            ],
            'form' => [
                'name' => 'Name',
                'code' => 'Code',
                'published' => 'Published',
                'description' => 'Description',
                'sort' => 'Sort',
                'fee' => 'Fixed fee',
                'fee_percent' => 'Percentage fee',
            ],
        ],
        'title' => 'Select payment method',
        'submit' => 'Select method and continue',
        'fee' => 'Fixed fee:',
        'fee_percent' => 'Percentage fee:',
        'error' => [
            'method_not_available' => 'The selected payment method is not available for your order.',
        ],
    ],
    'confirm' => [
        'breadcrumbs' => 'Confirmation of an order',
        'error' => [
            'agreeToTerms' => 'Please agree to the terms and conditions.',
        ],
    ],
    'success' => [
        'breadcrumbs' => 'Success of an order',
        'title' => 'Your order is completed!',
        'text' => 'Thank you for your order! Your order is being processed and will be completed within 3-6 hours. You will receive an email confirmation when your order is completed.',
        'button' => 'continue shopping',
    ],
];
