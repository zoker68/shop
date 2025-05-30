<?php

return [
    'admin' => [
        'list' => [
            'name' => 'Название',
            'parent' => 'Родительская категория',
            'published' => 'Опубликовано',
            'deleted_at' => 'Дата удаления',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата последнего изменения',
        ],
        'form' => [
            'name' => 'Название',
            'slug' => 'URL',
            'parent' => 'Родительская категория',
            'published' => 'Опубликовано',
            'cover' => 'Обложка',
        ],
        'error' => [
            'slug_exist' => 'Этот URL уже занят. Пожалуйста, выберите другой.',
        ],
        'system' => [
            'label' => 'Категория',
            'plural_title' => 'Категории',
        ],
    ],
];
