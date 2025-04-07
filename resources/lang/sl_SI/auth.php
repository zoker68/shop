<?php

return [
    'forgot_password' => [
        'error' => [
            'user_not_found' => 'Uporabnik ni najden',
        ],
        'mail' => [
            'subject' => 'Pozabljeno geslo',
        ],
        'success' => 'E-poštno sporočilo s povezavo za ponastavitev gesla je bilo poslano',
        'title' => 'Pozabljeno geslo',
        'text' => 'Vnesite svoj e-poštni naslov in poslali vam bomo povezavo za ponastavitev gesla',
        'form' => [
            'email' => 'E-pošta',
            'submit' => 'Pošlji povezavo za ponastavitev gesla',
        ],
    ],
    'login' => [
        'error' => [
            'email' => [
                'required' => 'Polje za e-pošto je obvezno',
                'email' => 'E-pošta ni veljavna',
            ],
            'password' => [
                'required' => 'Polje za geslo je obvezno',
                'incorrect' => 'E-pošta ali geslo ni pravilno',
            ],
        ],
        'title' => 'Prijava',
        'text' => 'Vnesite svoj e-poštni naslov in geslo za dostop do svojega računa',
        'form' => [
            'email' => 'E-pošta',
            'password' => 'Geslo',
            'submit' => 'Prijava',
        ],
        'forgot_password' => 'Ste pozabili geslo?',
    ],
    'reset_password' => [
        'error' => [
            'password' => [
                'required' => 'Polje za geslo je obvezno',
                'confirmed' => 'Gesli se ne ujemata',
                'min' => 'Geslo mora imeti vsaj 6 znakov',
            ],
        ],
        'title' => 'Ponastavitev gesla',
        'text' => 'Vnesite svoje novo geslo',
        'form' => [
            'password' => 'Novo geslo',
            'password_confirmation' => 'Potrdite novo geslo',
            'submit' => 'Spremeni geslo',
        ],
    ],
    'admin' => [
        'list' => [
            'email' => 'E-poštni naslov',
            'name' => 'Ime',
            'surname' => 'Priimek',
        ],
        'form' => [
            'email' => 'E-poštni naslov',
            'password' => 'Geslo',
            'password_confirmation' => 'Potrditev gesla',
            'name' => 'Ime',
            'surname' => 'Priimek',
            'phone' => 'Telefon',
            'birthday' => 'Rojstni dan',
            'company' => 'Podjetje',
            'vat' => 'Davčna številka',
            'created_at' => 'Datum ustvarjanja',
            'updated_at' => 'Datum zadnje spremembe',
            'email_verified_at' => 'Datum potrditve e-pošte',
        ],
        'system' => [
            'label' => 'Uporabnik',
            'plural_title' => 'Uporabniki',
        ],
    ],
    'address' => [
        'admin' => [
            'list' => [
                'country_region' => 'Država/Regija',
                'zip_city' => 'Poštna številka/Mesto',
                'address' => 'Naslov',
            ],
            'form' => [
                'country' => 'Država',
                'region' => 'Regija',
                'zip' => 'Poštna številka',
                'city' => 'Mesto',
                'address' => 'Naslov',
                'created_at' => 'Datum ustvarjanja',
                'updated_at' => 'Datum zadnje spremembe',
            ],
        ],
        'title' => 'Vaši naslovi',
        'title_edit' => 'Uredi naslov',
        'select' => [
            'label' => 'Izberite naslov',
            'placeholder' => 'Izberite naslov ali vnesite novega',
        ],
        'country' => [
            'label' => 'Država',
            'placeholder' => 'Izberite državo',
        ],
        'region' => [
            'label' => 'Regija',
            'placeholder' => 'Izberite regijo',
        ],
        'city' => 'Mesto',
        'zip' => 'Poštna številka',
        'address' => 'Naslov',
        'submit' => 'Shrani',
        'success' => 'Naslov je bil shranjen',
        'success_delete' => 'Naslov je bil izbrisan',
        'error' => [
            'country' => [
                'required' => 'Izberite državo',
                'exists' => 'Izberite veljavno državo',
            ],
            'region' => [
                'exists' => 'Izberite veljavno regijo',
            ],
            'city' => [
                'required' => 'Mesto je obvezno',
                'between' => 'Mesto mora imeti med :min in :max znaki.',
            ],
            'zip' => [
                'required' => 'Poštna številka je obvezna',
                'between' => 'Poštna številka mora imeti med :min in :max znaki.',
            ],
            'address' => [
                'required' => 'Naslov je obvezen',
                'between' => 'Naslov mora imeti med :min in :max znaki.',
            ],
            'no_addresses' => 'Naslov ni bil najden',
        ],
    ],
    'profile' => [
        'title' => 'Podatki profila',
        'email' => 'E-poštni naslov',
        'password' => 'Geslo',
        'password_confirmation' => 'Potrditev gesla',
        'first_name' => 'Ime',
        'last_name' => 'Priimek',
        'phone' => 'Telefonska številka',
        'company' => 'Ime podjetja',
        'birthday' => 'Rojstni dan',
        'vat' => 'Davčna številka',
        'save' => 'Shrani',
        'success' => 'Profil je bil uspešno posodobljen',
        'verification' => 'Spremenili ste e-poštni naslov. Preverite e-pošto in potrdite nov naslov.',
    ],
    'password' => [
        'title' => 'Sprememba gesla',
        'password' => [
            'label' => 'Trenutno geslo',
            'placeholder' => 'Vnesite trenutno geslo',
        ],
        'new_password' => [
            'label' => 'Novo geslo',
            'placeholder' => 'Vnesite novo geslo',
        ],
        'password_confirmation' => [
            'label' => 'Ponovno vnesite geslo',
            'placeholder' => 'Ponovite svoje geslo',
        ],
        'submit' => 'Shrani spremembe',
        'success' => 'Geslo je bilo spremenjeno',
    ],
    'orders' => [
        'no_orders' => 'Nimate naročil',

        'show' => [
            'number' => 'Številka naročila',
            'purchased' => 'Kupljeno',
            'payed' => 'Plačano',
            'shipped' => 'Poslano',
            'total' => 'Skupaj',
            'status' => 'Status',
            'general_status' => 'Splošni status',
            'payment_status' => 'Status plačila',
            'shipping_status' => 'Status pošiljanja',
            'shipping_address' => 'Naslov za dostavo',
            'billing_address_data' => 'Naslov za račun',
            'summary' => 'Povzetek',
            'total_products' => 'Vmesni znesek',
            'total_shipping' => 'Cena dostave',
            'total_payment' => 'Cena plačila',
            'total_pre_payment' => 'Skupna cena',
        ],
    ],
    'dashboard' => [
        'profile' => [
            'title' => 'Osebni profil',
            'edit_link' => 'Uredi',
        ],
        'orders' => [
            'title' => 'Nedavna naročila',
        ],
    ],
    'user_group' => [
        'admin' => [
            'list' => [
                'name' => 'Ime',
                'is_admin' => 'Dostop skrbnika',
            ],
            'form' => [
                'name' => 'Ime',
                'permissions' => 'Dovoljenja',
                'created_at' => 'Datum ustvarjanja',
                'updated_at' => 'Datum zadnje spremembe',
            ],
            'system' => [
                'label' => 'Skupina uporabnikov',
                'plural_title' => 'Skupine uporabnikov',
            ],
        ],
    ],
];
