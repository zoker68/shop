<?php

return [
    'forgot_password' => [
        'error' => [
            'user_not_found' => 'User not found',
        ],
        'mail' => [
            'subject' => 'Forgot Password',
        ],
        'success' => 'Mail with reset password link has been sent',
        'title' => 'Forgot Password',
        'text' => 'Enter your email address and we will send you a link to reset your password',
        'form' => [
            'email' => 'Email',
            'submit' => 'Send Password Reset Link',
        ],
    ],
    'login' => [
        'error' => [
            'email' => [
                'required' => 'Email field is required',
                'email' => 'Email is not valid',
            ],
            'password' => [
                'required' => 'Password field is required',
                'incorrect' => 'Email or password is incorrect',
            ],
        ],
        'title' => 'Authentication',
        'text' => 'Enter your email and password to access your account',
        'form' => [
            'email' => 'Email',
            'password' => 'Password',
            'submit' => 'Login',
        ],
        'forgot_password' => 'Forgot password?',
    ],
    'reset_password' => [
        'error' => [
            'password' => [
                'required' => 'Password field is required',
                'confirmed' => 'Passwords do not match',
                'min' => 'Password must be at least 6 characters',
            ],
        ],
        'title' => 'Reset Password',
        'text' => 'Enter your new password',
        'form' => [
            'password' => 'New password',
            'password_confirmation' => 'Confirm new password',
            'submit' => 'Change password',
        ],
    ],
    'admin' => [
        'list' => [
            'email' => 'Email Address',
            'name' => 'Name',
            'surname' => 'Surname',
        ],
        'form' => [
            'email' => 'Email Address',
            'password' => 'Password',
            'password_confirmation' => 'Password Confirmation',
            'name' => 'Name',
            'surname' => 'Surname',
            'phone' => 'Phone',
            'birthday' => 'Birthday',
            'company' => 'Company',
            'vat' => 'VAT',
            'created_at' => 'Created Date',
            'updated_at' => 'Last Modified Date',
            'email_verified_at' => 'Email Verified Date',
        ],
        'system' => [
            'label' => 'User',
            'plural_title' => 'Users',
        ],
    ],
    'address' => [
        'admin' => [
            'list' => [
                'country_region' => 'Country/Region',
                'zip_city' => 'Zip/City',
                'address' => 'Address',
            ],
            'form' => [
                'country' => 'Country',
                'region' => 'Region',
                'zip' => 'Zip',
                'city' => 'City',
                'address' => 'Address',
                'created_at' => 'Created Date',
                'updated_at' => 'Last Modified Date',
            ],
        ],
        'title' => 'Your Addresses',
        'title_edit' => 'Edit Address',
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
        'submit' => 'Save',
        'success' => 'Address has been saved',
        'success_delete' => 'Address has been deleted',
        'error' => [
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
            'no_addresses' => 'No address found',
        ],
    ],
    'profile' => [
        'title' => 'Profile Information',
        'email' => 'Email Address',
        'password' => 'Password',
        'password_confirmation' => 'Confirm Password',
        'first_name' => 'First Name',
        'last_name' => 'Last Name',
        'phone' => 'Phone Number',
        'company' => 'Company Name',
        'birthday' => 'Birthday',
        'vat' => 'Vat Number',
        'save' => 'Save',
        'success' => 'Profile updated successfully',
        'verification' => 'You change your email address. Please check your email and verify your new email address.',
        'error' => [
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
        ],
    ],
    'password' => [
        'title' => 'Change Password',
        'password' => [
            'label' => 'Current Password',
            'placeholder' => 'enter current password',
        ],
        'new_password' => [
            'label' => 'New Password',
            'placeholder' => 'enter new password',
        ],
        'password_confirmation' => [
            'label' => 'Retype Password',
            'placeholder' => 'repeat your password',
        ],
        'submit' => 'Save Changes',
        'success' => 'Password has been changed',
        'error' => [
            'password' => [
                'required' => 'Current password is required.',
                'not_correct' => 'Current password is not correct.',
            ],
            'new_password' => [
                'required' => 'New password is required.',
                'confirmed' => 'Retype password does not match.',
                'min' => 'New password must be at least :min characters.',
            ],
        ],
    ],
    'orders' => [
        'no_orders' => 'You have no orders',

        'show' => [
            'number' => 'Order Number',
            'purchased' => 'Purchased',
            'payed' => 'Payed',
            'shipped' => 'Shipped',
            'total' => 'Total',
            'status' => 'Status',
            'general_status' => 'General Status',
            'payment_status' => 'Payment Status',
            'shipping_status' => 'Shipping Status',
            'shipping_address' => 'Shipping Address',
            'billing_address_data' => 'Billing Address',
            'summary' => 'Total Summary',
            'total_products' => 'Subtotal',
            'total_shipping' => 'Shipping Fee',
            'total_payment' => 'Payment Fee',
            'total_pre_payment' => 'Total',
        ],
    ],
    'dashboard' => [
        'profile' => [
            'title' => 'Personal Profile',
            'edit_link' => 'Edit',
        ],
        'orders' => [
            'title' => 'Recent Orders',
        ],
    ],
    'user_group' => [
        'admin' => [
            'list' => [
                'name' => 'Name',
                'is_admin' => 'Admin Access',
            ],
            'form' => [
                'name' => 'Name',
                'permissions' => 'Permissions',
                'created_at' => 'Created Date',
                'updated_at' => 'Last Modified Date',
            ],
            'system' => [
                'label' => 'User Group',
                'plural_title' => 'User Groups',
            ],
        ],
    ],
];
