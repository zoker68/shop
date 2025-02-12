<?php

return [
    'breadcrumbs' => [
        'title' => 'Contact us',
        'contact_us' => 'contact us',
    ],
    'operation_hours' => 'Hours of operation',
    'form' => [
        'title' => 'Leave us a message',
        'text' => 'Use the form below to get in touch with the sales team',
        'name' => 'Name',
        'email' => 'Email',
        'subject' => 'Subject',
        'message' => 'Message',
        'submit' => 'send message',
    ],
    'error' => [
        'name' => [
            'required' => 'Name is required',
            'min' => 'Name must be at least :min characters',
            'max' => 'Name must be at most :max characters',
        ],
        'email' => [
            'required' => 'Email is required',
            'email' => 'Email is not valid',
        ],
        'subject' => [
            'required' => 'Subject is required',
            'min' => 'Subject must be at least :min characters',
        ],
        'message' => [
            'required' => 'Message is required',
            'min' => 'Message must be at least :min characters',
        ],
    ],
    'success' => 'Message sent successfully',
    'mail' => [
        'title' => 'New contact form question',
    ],
    'our_store' => 'our store',
];
