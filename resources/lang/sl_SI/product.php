<?php

return [
    'brand' => 'Blagovna znamka:',
    'stock' => 'Razpoložljivost:',
    'in_stock' => 'Na skladišču',
    'out_of_stock' => 'Izven skladišča',
    'quantity' => 'Količina',
    'add_to_cart' => 'Dodaj v košarico',
    'wishlist' => [
        'remove' => 'V seznamu želja',
        'add' => 'Dodaj v seznam želja',
    ],
    'tabs' => [
        'properties' => 'Informacije o izdelku',
        'questions' => 'Vprašanja in odgovori',
        'reviews' => 'Ocene (:count_reviews)',
    ],
    'ratings' => [
        'count' => '{0} Brez ocen|{1} 1 ocena|{2} 2 oceni|[3,*] :count ocen',
    ],
    'questions' => [
        'count' => '{0} Ni vprašanj o tem izdelku|{1} 1 vprašanje o tem izdelku|[2,*] Vprašanja o tem izdelku (:count)',
        'store_admin' => 'Admin trgovine',
        'new' => [
            'placeholder' => 'Vpišite vaše vprašanje',
            'submit' => 'Postavite vprašanje',
            'placeholder_guest' => 'Za postavitev vprašanja se prijavite',
            'success' => 'Vprašanje uspešno dodano. Odgovorili vam bomo čim prej in ga objavili na naši strani. Hvala!',
            'mail' => [
                'subject' => 'Vprašanje dodano',
                'header' => 'Imate novo vprašanje o izdelku',
                'product' => 'Izdelek:',
                'question' => 'Vprašanje:',
                'before_link' => 'Vprašanje lahko odgovorite v administracijskem pogledu:',
                'link' => 'Odgovori na vprašanje',
            ],
        ],
        'errors' => [
            'required' => 'Vprašanje je obvezno',
            'min' => 'Vprašanje mora biti dolgo vsaj :min znakov',
            'max' => 'Vprašanje ne sme biti daljše od :max znakov',
            'must_login' => 'Za postavitev vprašanja se morate prijaviti',
        ],
        'admin' => [

            'system' => [
                'label' => 'Vprasanje za izdelek',
                'plural_title' => 'Vprasanja za izdelke',
            ],
            'list' => [
                'tab' => [
                    'all' => 'Vse',
                    'published' => 'Objavljeno',
                    'moderation' => 'Moderiranje',
                ],
                'product' => 'Izdelek',
                'user' => 'Uporabnik',
                'question' => 'Vprašanje',
                'answer' => 'Odgovor',
            ],
            'form' => [
                'created_at' => 'Datum ustvarjanja',
                'updated_at' => 'Datum zadnje spremembe',
                'product' => 'Izdelek',
                'user' => 'Uporabnik',
                'question' => 'Vprašanje',
                'answer' => 'Odgovor',
            ],
        ],
    ],
    'reviews' => [
        'title' => 'Ocene izdelkov',
        'admin' => [
            'system' => [
                'label' => 'Ocena za izdelek',
                'plural_title' => 'Ocene za izdelke',
            ],
            'list' => [
                'tab' => [
                    'all' => 'Vse',
                    'published' => 'Objavljeno',
                    'moderation' => 'Moderiranje',
                ],
                'product' => 'Izdelek',
                'user' => 'Uporabnik',
                'rating' => 'Ocena',
                'review' => 'Ocena',
                'published' => 'Objavljeno',
                'created_at' => 'Datum ustvarjanja',
            ],
            'form' => [
                'created_at' => 'Datum ustvarjanja',
                'updated_at' => 'Datum zadnje spremembe',
                'product' => 'Izdelek',
                'user' => 'Uporabnik',
                'rating' => 'Ocena',
                'review' => 'Ocena',
                'published' => 'Objavljeno',
            ],
        ],
        'new' => [
            'rating' => 'Ocena:',
            'placeholder' => 'Vpišite vašo oceno',
            'submit' => 'Dodaj oceno',
            'placeholder_guest' => 'Za dodajanje ocene se prijavite',
            'success' => 'Ocena uspešno dodana. Moderirali jo bomo čim prej in objavili na naši strani. Hvala!',
            'mail' => [
                'subject' => 'Ocena dodana',
                'header' => 'Imate novo oceno o izdelku',
                'product' => 'Izdelek:',
                'rating' => 'Ocena:',
                'question' => 'Vprašanje:',
                'before_link' => 'Oceno lahko moderirate v administracijskem pogledu:',
                'link' => 'Pojdite na moderacijo',
            ],
        ],
        'errors' => [
            'must_login' => 'Za postavitev vprašanja se morate prijaviti',
            'rating' => [
                'required' => 'Ocena je obvezna',
                'between' => 'Ocena mora biti med :min in :max',
            ],
            'review' => [
                'min' => 'Ocena mora imeti vsaj :min znakov',
                'max' => 'Ocena ne sme biti daljša od :max znakov',
            ],
        ],
    ],
    'admin' => [
        'system' => [
            'label' => 'Izdelek',
            'plural_title' => 'Izdelki',
        ],
        'list' => [
            'tab' => [
                'all' => 'Vse',
                'approved' => 'Odobreno',
                'rejected' => 'Zavrnitev',
                'moderation' => 'Moderacija',
            ],
            'name' => 'Ime',
            'slug' => 'URL',
            'description' => 'Opis',
            'image' => 'Slika naslovnice',
            'stock' => 'Zaloga',
            'price' => 'Cena',
            'published' => 'Objavljeno',
            'brand' => 'Blagovna znamka',
            'categories' => 'Kategorije',
        ],
        'form' => [
            'name' => 'Ime',
            'slug' => 'URL',
            'description' => 'Opis',
            'description_short' => 'Kratek opis',
            'image' => 'Slika naslovnice',
            'stock' => 'Zaloga',
            'price' => 'Cena',
            'brand' => 'Blagovna znamka',
            'published' => 'Objavljeno',
            'foreign_id' => 'Tuj ID',
        ],
    ],
];
