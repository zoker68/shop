<?php

return [
    'status_type' => [
        'general' => 'Общий',
        'payment' => 'Платеж',
        'shipping' => 'Доставка',
        'admin' => [
            'form' => [
                'name' => 'Название',
                'type' => 'Тип',
                'color' => 'Цвет для BackEnd',
                'hex_color' => 'Цвет для FrontEnd',
                'is_default' => 'По умолчанию?',
            ],
            'list' => [
                'name' => 'Название',
                'type' => 'Тип',
                'is_default' => 'По умолчанию?',
            ],
        ],
    ],
    'admin' => [
        'actions' => [
            'general_status' => [
                'title' => 'Изменить статус',
                'new_status' => 'Новый общий статус',
            ],
            'payment_status' => [
                'title' => 'Изменить статус',
                'new_status' => 'Новый статус',
            ],
            'shipping_status' => [
                'title' => 'Изменить статус',
                'new_status' => 'Новый статус',
            ],
        ],
        'view' => [
            'general' => [
                'title' => 'Общая информация',
                'general_status_id' => 'Статус заказа',
                'payment_status_id' => 'Статус оплаты',
                'shipping_status_id' => 'Статус доставки',
                'ip' => 'IP-адрес',
                'created_at' => 'Дата создания',
                'updated_at' => 'Дата последнего изменения',
                'shipped_at' => 'Дата отправки',
                'shipped_at_action' => [
                    'title' => '',
                    'new_date' => 'Выберите дату отправки',
                ],
                'paid_at' => 'Дата оплаты',
                'paid_at_action' => [
                    'title' => '',
                    'new_date' => 'Выберите дату оплаты',
                ],
                'payment_method' => 'Метод оплаты',
                'shipping_method' => 'Метод доставки',
            ],
            'user' => [
                'title' => 'Информация о пользователе',
                'user' => 'Пользователь',
                'user_data' => [
                    'name_surname' => 'Имя и фамилия',
                    'email' => 'Электронная почта',
                    'phone' => 'Телефон',
                    'birthday' => 'Дата рождения',
                    'company' => 'Компания',
                    'vat' => 'НДС',
                ],
                'guest' => 'Гость',
            ],
            'shipping_address' => [
                'title' => 'Адрес доставки',
                'country' => 'Страна',
                'region' => 'Регион',
                'city' => 'Город',
                'zip' => 'Почтовый индекс',
                'address' => 'Адрес',
            ],
            'billing_address' => [
                'title' => 'Адрес для выставления счета',
                'country' => 'Страна',
                'region' => 'Регион',
                'city' => 'Город',
                'zip' => 'Почтовый индекс',
                'address' => 'Адрес',
            ],
        ],
        'list' => [
            'user' => 'Пользователь',
            'email' => 'Электронная почта',
            'general_status' => 'Статус',
            'payment_status' => 'Статус оплаты',
            'shipping_status' => 'Статус доставки',
            'total' => 'Общая сумма',
            'filter' => [
                'general_status' => 'Статус',
                'payment_status' => 'Статус оплаты',
                'shipping_status' => 'Статус доставки',
            ],
            'user_guest' => 'Гость',
        ],
    ],
    'products' => [
        'admin' => [
            'product_data' => [
                'name' => 'Название продукта',
            ],
            'quantity' => 'Количество',
            'price' => 'Цена',
            'total' => 'Итого',
            'summary' => [
                'total_products' => 'Общее количество товаров',
                'total_shipping' => 'Общая стоимость доставки',
                'total_payment_fee' => 'Общая стоимость платежных сборов',
                'total_pre_payment' => 'Итого',
            ],
        ],
    ],
    'card' => [
        'show_link' => 'Посмотреть заказ',
        'number' => 'Номер заказа',
        'purchased' => 'Куплено',
        'payed' => 'Оплачено',
        'shipped' => 'Отправлено',
        'total' => 'Итого',
        'status' => 'Статус',
    ],
    'confirmation' => [
        'mail' => [
            'customer' => [
                'subject' => 'Заказ успешно создан',
                'header' => 'Заказ был создан',
                'thank_you' => 'Спасибо за ваш заказ! Мы рады подтвердить, что ваш заказ #:order_hash был успешно оформлен.',
                'details' => 'Детали заказа:',
                'will_another_mail' => 'Вы получите еще одно письмо с информацией о заказе. Если у вас есть вопросы, не стесняйтесь обращаться в нашу службу поддержки.',
                'order_status' => 'Вы можете просмотреть статус вашего заказа здесь:',
                'order_status_link' => 'Посмотреть заказ',
                'hello' => 'Здравствуйте :name :surname,',
                'detail_order_hash' => 'Номер заказа: #:order_hash ',
                'detail_date' => 'Дата заказа: :created_at_format',
                'detail_total' => 'Общая сумма: ',
            ],
            'admin' => [
                'subject' => 'У вас новый заказ',
                'header' => 'Заказ был создан',
                'text' => 'Вы получили новый заказ.',
                'link' => 'Посмотреть заказ',
            ],
        ],
    ],
];
