<?php

return [
    'exceptions' => [
        'published' => 'Izdelek ni bil najden ali ni objavljen',
        'stock' => 'Zahtevana količina ni na voljo na zalogi',
        'product_not_find_in_cart' => 'Izdelek ni bil najden v košarici',
        'quantity_not_changed' => 'Količina ni bila spremenjena',
    ],
    'added' => 'Izdelek je bil uspešno dodan v košarico',
    'removed' => 'Izdelek je bil uspešno odstranjen iz košarice',
    'error' => [
        'required' => 'Količina je obvezna',
        'integer' => 'Količina mora biti število',
        'min' => 'Količina mora biti večja od 0',
        'empty' => 'Košarica je prazna',
        'stock' => 'Te količine ni na zalogi. Na voljo: :quantity',
        'outOfStock' => 'Nekateri izdelki v vaši košarici niso na zalogi',
        'available' => 'Ta izdelek trenutno ni na voljo',
        'notAvailable' => 'Nekateri izdelki v vaši košarici trenutno niso na voljo',
    ],
    'breadcrumbs' => 'Nakupovalna košarica',
    'column' => [
        'product' => 'Izdelek',
        'quantity' => 'Količina',
        'total_price' => 'Skupna cena',
    ],
    'to_checkout' => 'Nadaljuj na blagajno',
    'side' => [
        'title' => 'Povzetek naročila',
        'subtotal' => 'Vmesni seštevek',
        'shipping_price' => 'Dostava',
        'payment_fee' => 'Provizija za plačilo',
        'total' => 'Skupaj',
    ],
];
