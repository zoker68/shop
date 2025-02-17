<?php

return [
    'status_type' => [
        'general' => 'Splošno',
        'payment' => 'Plačilo',
        'shipping' => 'Pošiljanje',
        'admin' => [
            'form' => [
                'name' => 'Ime',
                'type' => 'Vrsta',
                'color' => 'Barva na zadnjem delu',
                'hex_color' => 'Barva na sprednjem delu',
                'is_default' => 'Je privzeto?',
            ],
            'list' => [
                'name' => 'Ime',
                'type' => 'Vrsta',
                'is_default' => 'Je privzeto?',
            ],
        ],
    ],
    'admin' => [
        'actions' => [
            'general_status' => [
                'title' => 'Spremeni stanje',
                'new_status' => 'Novo splošno stanje',
            ],
            'payment_status' => [
                'title' => 'Spremeni stanje',
                'new_status' => 'Novo stanje',
            ],
            'shipping_status' => [
                'title' => 'Spremeni stanje',
                'new_status' => 'Novo stanje',
            ],
        ],
        'view' => [
            'general' => [
                'title' => 'Splošne informacije',
                'general_status_id' => 'Stanje naročila',
                'payment_status_id' => 'Stanje plačila',
                'shipping_status_id' => 'Stanje pošiljke',
                'ip' => 'IP naslov',
                'created_at' => 'Datum ustvarjanja',
                'updated_at' => 'Datum zadnje spremembe',
                'shipped_at' => 'Datum pošiljanja',
                'shipped_at_action' => [
                    'title' => '',
                    'new_date' => 'Izberi datum pošiljanja',
                ],
                'paid_at' => 'Datum plačila',
                'paid_at_action' => [
                    'title' => '',
                    'new_date' => 'Izberi datum plačila',
                ],
                'payment_method' => 'Način plačila',
                'shipping_method' => 'Način pošiljanja',
            ],
            'user' => [
                'title' => 'Informacije o uporabniku',
                'user' => 'Uporabnik',
                'user_data' => [
                    'name_surname' => 'Ime in priimek',
                    'email' => 'E-pošta',
                    'phone' => 'Telefon',
                    'birthday' => 'Datum rojstva',
                    'company' => 'Podjetje',
                    'vat' => 'DDV',
                ],
                'guest' => 'Gost',
            ],
            'shipping_address' => [
                'title' => 'Naslov za dostavo',
                'country' => 'Država',
                'region' => 'Regija',
                'city' => 'Mesto',
                'zip' => 'Poštna številka',
                'address' => 'Naslov',
            ],
            'billing_address' => [
                'title' => 'Računovodski naslov',
                'country' => 'Država',
                'region' => 'Regija',
                'city' => 'Mesto',
                'zip' => 'Poštna številka',
                'address' => 'Naslov',
            ],
        ],
        'list' => [
            'user' => 'Uporabnik',
            'email' => 'E-pošta',
            'general_status' => 'Stanje',
            'payment_status' => 'Stanje plačila',
            'shipping_status' => 'Stanje pošiljke',
            'total' => 'Skupaj',
            'filter' => [
                'general_status' => 'Stanje',
                'payment_status' => 'Stanje plačila',
                'shipping_status' => 'Stanje pošiljke',
            ],
            'user_guest' => 'Gost',
        ],
    ],
    'products' => [
        'admin' => [
            'product_data' => [
                'name' => 'Ime izdelka',
            ],
            'quantity' => 'Količina',
            'price' => 'Cena',
            'total' => 'Skupaj',
            'summary' => [
                'total_products' => 'Skupaj izdelkov',
                'total_shipping' => 'Skupaj stroški pošiljanja',
                'total_payment_fee' => 'Skupaj stroški plačila',
                'total_pre_payment' => 'Skupaj',
            ],
        ],
    ],
    'card' => [
        'show_link' => 'Poglej naročilo',
        'number' => 'Številka naročila',
        'purchased' => 'Kupljeno',
        'payed' => 'Plačano',
        'shipped' => 'Poslano',
        'total' => 'Skupaj',
        'status' => 'Stanje',
    ],
    'confirmation' => [
        'mail' => [
            'customer' => [
                'subject' => 'Naročilo je bilo uspešno ustvarjeno',
                'header' => 'Naročilo je bilo ustvarjeno',
                'thank_you' => 'Hvala za vaše naročilo! Z veseljem potrjujemo, da je bilo vaše naročilo #:order_hash uspešno oddano.',
                'details' => 'Podrobnosti naročila:',
                'will_another_mail' => 'Ko bo vaše naročilo pripravljeno, boste prejeli še eno sporočilo. Če imate kakršnakoli vprašanja, se obrnite na našo ekipo za podporo.',
                'order_status' => 'Status vašega naročila lahko preverite tukaj:',
                'order_status_link' => 'Poglej naročilo',
                'hello' => 'Pozdravljeni :name :surname,',
                'detail_order_hash' => 'Številka naročila: #:order_hash ',
                'detail_date' => 'Datum naročila: :created_at_format',
                'detail_total' => 'Skupni znesek: @money($order->total_pre_payment)',
            ],
            'admin' => [
                'subject' => 'Prejeli ste novo naročilo',
                'header' => 'Naročilo je bilo ustvarjeno',
                'text' => 'Prejeli ste novo naročilo.',
                'link' => 'Poglej naročilo',
            ],
        ],
    ],
];
