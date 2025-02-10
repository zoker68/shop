<?php

return [
    'admin' => [
        'list' => [
            'name' => 'Ime',
            'parent' => 'Nadrejena kategorija',
            'published' => 'Objavljeno',
            'deleted_at' => 'Izbrisano ob',
            'created_at' => 'Ustvarjeno ob',
            'updated_at' => 'Zadnja sprememba ob',
        ],
        'form' => [
            'name' => 'Ime',
            'slug' => 'URL',
            'parent' => 'Nadrejena kategorija',
            'published' => 'Objavljeno',
            'cover' => 'Naslovna slika',
        ],
        'error' => [
            'slug_exist' => 'Ta URL je že zaseden. Prosimo, izberite drugega.',
        ],
    ],
];
