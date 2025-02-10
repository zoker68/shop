<?php

return [
    'breadcrumbs' => 'Zaključek nakupa',
    'error' => [
        'mainData' => [
            'email' => [
                'required' => 'E-poštni naslov je obvezen.',
                'email' => 'Vnesite veljaven e-poštni naslov.',
                'unique' => 'E-poštni naslov je že registriran. Prosimo, prijavite se.',
            ],
            'name' => [
                'required' => 'Ime je obvezno.',
                'between' => 'Ime mora imeti med :min in :max znakov.',
            ],
            'surname' => [
                'required' => 'Priimek je obvezen.',
                'between' => 'Priimek mora imeti med :min in :max znakov.',
            ],
            'company' => [
                'between' => 'Ime podjetja mora imeti med :min in :max znakov.',
            ],
            'vat' => [
                'between' => 'Davčna številka mora imeti med :min in :max znakov.',
            ],
            'phone' => [
                'required' => 'Telefonska številka je obvezna.',
                'between' => 'Telefonska številka mora imeti med :min in :max znakov.',
            ],
            'birthday' => [
                'required' => 'Datum rojstva je obvezen.',
                'before' => 'Datum rojstva mora biti pred :date.',
                'after' => 'Datum rojstva mora biti po :date.',
            ],
            'password' => [
                'required' => 'Geslo je obvezno.',
                'min' => 'Geslo mora vsebovati vsaj :min znakov.',
                'same' => 'Gesli se ne ujemata.',
            ],
            'password_confirmation' => [
                'required' => 'Potrditev gesla je obvezna.',
            ],
        ],
        'address' => [
            'country' => [
                'required' => 'Izberite državo',
                'exists' => 'Izberite veljavno državo',
            ],
            'region' => [
                'exists' => 'Izberite veljavno regijo',
            ],
            'city' => [
                'required' => 'Mesto je obvezno.',
                'between' => 'Mesto mora imeti med :min in :max znakov.',
            ],
            'zip' => [
                'required' => 'Poštna številka je obvezna.',
                'between' => 'Poštna številka mora imeti med :min in :max znakov.',
            ],
            'address' => [
                'required' => 'Naslov je obvezen.',
                'between' => 'Naslov mora imeti med :min in :max znakov.',
            ],
        ],
    ],
    'customer' => [
        'title' => 'Podatki o stranki',
        'email' => 'E-poštni naslov',
        'have_account' => 'Že imate račun?',
        'have_account_link' => 'Prijavite se',
        'as_guest' => 'Kot gost',
        'password' => 'Geslo',
        'password_confirmation' => 'Potrditev gesla',
        'first_name' => 'Ime',
        'last_name' => 'Priimek',
        'phone' => 'Telefonska številka',
        'company' => 'Ime podjetja',
        'birthday' => 'Datum rojstva',
        'vat' => 'Davčna številka',
        'edit' => 'Uredi profil',
    ],
    'shipping_address' => [
        'title' => 'Naslov za dostavo',
    ],
    'billing_address' => [
        'same_as_shipping' => 'Naslov za račun je enak naslovu za dostavo',
        'title' => 'Naslov za račun',
    ],
    'agree_with' => 'Strinjam se s',
    'agree_with_link' => 'pogoji uporabe',
    'submit' => 'Nadaljuj',
    'side' => [
        'cart' => [
            'title' => 'Vaše naročilo',
            'products' => 'Izdelki',
            'subtotal' => 'Delna vsota',
            'shipping_price' => 'Cena dostave',
            'payment_fee' => 'Provizija za plačilo',
            'total' => 'Skupaj',
        ],
    ],
    'address' => [
        'select' => [
            'label' => 'Izberi naslov',
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
    ],
    'shipping' => [
        'breadcrumbs' => 'Način dostave',
        'title' => 'Izberite način dostave',
        'error' => [
            'method_not_available' => 'Izbrani način dostave ni na voljo za vaše naročilo.',
        ],
        'days' => 'Čas dostave:',
        'submit' => 'Izberi način in nadaljuj',
        'price' => 'Cena:',
    ],
    'payment' => [
        'breadcrumbs' => 'Način plačila',
        'title' => 'Izberite način plačila',
        'submit' => 'Izberi način in nadaljuj',
        'fee' => 'Fiksna provizija:',
        'fee_percent' => 'Odstotna provizija:',
        'error' => [
            'method_not_available' => 'Izbrani način plačila ni na voljo za vaše naročilo.',
        ],
        'success' => [
            'mail' => [
                'subject' => 'Vaše naročilo je bilo plačano',
                'header' => 'Vaše naročilo je bilo uspešno plačano',
                'hello' => 'Pozdravljeni :name :surname',
                'text' => 'Vaše naročilo je bilo uspešno plačano.',
            ],
        ],
    ],
    'confirm' => [
        'breadcrumbs' => 'Potrditev naročila',
        'error' => [
            'agreeToTerms' => 'Prosimo, da se strinjate s pogoji uporabe.',
        ],
        'stripe' => [
            'shipping_fee' => 'Cena dostave (:shipping_method_name)',
            'payment_fee' => 'Provizija za plačilo (:payment_method_name)',
        ],
    ],
    'success' => [
        'breadcrumbs' => 'Uspešno naročilo',
        'title' => 'Vaše naročilo je zaključeno!',
        'text' => 'Hvala za vaše naročilo! Naročilo se obdeluje in bo zaključeno v roku 3-6 ur. Ko bo naročilo zaključeno, boste prejeli potrditveni e-poštni naslov.',
        'button' => 'Nadaljuj z nakupovanjem',
    ],
    'failed' => [
        'breadcrumbs' => 'Neuspešno plačilo',
        'title' => 'Vaše plačilo ni uspelo!',
        'text' => 'Vaše plačilo ni uspelo. Poskusite znova.',
        'button' => 'Poskusi znova',
    ],
];
