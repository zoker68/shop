<?php

return [
    'breadcrumbs' => [
        'title' => 'Kontaktirajte nas',
        'contact_us' => 'kontaktirajte nas',
    ],
    'operation_hours' => 'Delovni čas',
    'form' => [
        'title' => 'Pošljite nam sporočilo',
        'text' => 'Uporabite spodnji obrazec za stik s prodajno ekipo',
        'name' => 'Ime',
        'email' => 'E-pošta',
        'subject' => 'Zadeva',
        'message' => 'Sporočilo',
        'submit' => 'pošlji sporočilo',
    ],
    'error' => [
        'name' => [
            'required' => 'Ime je obvezno',
            'min' => 'Ime mora vsebovati vsaj :min znakov',
            'max' => 'Ime lahko vsebuje največ :max znakov',
        ],
        'email' => [
            'required' => 'E-pošta je obvezna',
            'email' => 'E-poštni naslov ni veljaven',
        ],
        'subject' => [
            'required' => 'Zadeva je obvezna',
            'min' => 'Zadeva mora vsebovati vsaj :min znakov',
        ],
        'message' => [
            'required' => 'Sporočilo je obvezno',
            'min' => 'Sporočilo mora vsebovati vsaj :min znakov',
        ],
    ],
    'success' => 'Sporočilo je bilo uspešno poslano',
    'mail' => [
        'title' => 'Novo vprašanje iz kontaktnega obrazca',
    ],
];
