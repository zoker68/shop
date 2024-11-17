# shop

# Install

- Delete folder "database"
- Add to composer.json:

```text
    "repositories": [
        {
            "type": "composer",
            "url": "https://zoker.repo.repman.io"
        }
    ]
```
- Require script:

```text
composer require zoker/shop
```
- Publish Seeders:
  
```text
php artisan vendor:publish --tag=shop-seeders
```
- Publish Config:
  
```text
php artisan vendor:publish --tag=shop-config
```

- Publish Views:

```text
php artisan vendor:publish --tag=shop-views
```
- Publish Translates (if you want!!!):

```text
php artisan vendor:publish --tag=shop-lang
```

- Storage link! ADD SAIL before, if you use sail

```text
php artisan storage:link
```

- Add Tailwind:

```text
npm install -D tailwindcss postcss autoprefixer
npx tailwindcss init -p
```
- Edit tailwind.config.js 
```text
content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        './app/Filament/**/*.php',
        './resources/views/filament/**/*.blade.php',
        './vendor/filament/**/*.blade.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.js',
    ],
```

- NPM install
```text
npm install
```

- Add filament css:

```text
php artisan filament:install --scaffold
```

- Publish Scout Config:

```text
php artisan vendor:publish --provider="Laravel\Scout\ScoutServiceProvider"
```

- Meilisearch Settings:
```php
'meilisearch' => [
        'host' => env('MEILISEARCH_HOST', 'http://localhost:7700'),
        'key' => env('MEILISEARCH_KEY'),
        'index-settings' => [
            'products' => [
                'filterableAttributes' => ['categories', 'published', 'status', 'properties'],
                'sortableAttributes' => ['name', 'description', 'created_at', 'price', 'sell_count'],
            ],
        ],
    ],
```

- Additional ENV:
```dotenv
MONEY_DEFAULTS_CURRENCY=RUB

SCOUT_DRIVER=meilisearch
MEILISEARCH_HOST=http://meilisearch:7700
MEILISEARCH_KEY=

MAIL_TO=zoker@localshop.com

SHOP_DISK=public
```

- Unnecessary ENV:

- Edit \App\Models\User model:
```php
<?php
namespace App\Models;
class User extends \Zoker\Shop\Models\User {}
```

# Seeder
```text
php artisan migrate:fresh --seed
```

# Events

## Extend form
### Event
```text
backend.form.extend
```
### Using
```php
Event::listen('backend.form.extend', function ($resource) {
    if (!$resource instanceof SomeResource) {
        return;
    }
    /* Extend form */
})
```
### Methods:
```php
$resource->addFormFields(array $fields, string $tab = self::GENERAL_TAB);

$resource->setFormColumns(int $columns, string $tab = self::GENERAL_TAB);

$resource->removeFormField(string $name, string $tab = self::GENERAL_TAB);

$resource->removeFormFields(array $names, string $tab = self::GENERAL_TAB);
```

## Extend table columns

### Event
```text
backend.table.extend
```
### Using
```php
Event::listen('backend.table.extend', function ($resource) {
    if (!$resource instanceof SomeResource) {
        return;
    }
        /* Extend table */
})
```

### Methods
```php
$resource->addListColumns(array $columns);

$resource->removeListColumn(string $name);

$resource->removeListColumns(array $names);

$resource->addListFilters(array $filters);

$resource->removeListFilter(string $name);

$resource->removeListFilters(array $names);

$resource->addListActions(array $actions, string $group = self::ACTIONS_NO_IN_GROUP);

$resource->removeListAction(string $name, string $group = self::ACTIONS_NO_IN_GROUP);

$resource->removeListActions(array $names, string $group = self::ACTIONS_NO_IN_GROUP);

$resource->addListBulkActions(array $actions, string $group = self::ACTIONS_NO_IN_GROUP);

$resource->removeListBulkAction(string $name, string $group = self::ACTIONS_NO_IN_GROUP);

$resource->removeListBulkActions(array $names, string $group = self::ACTIONS_NO_IN_GROUP);

$resource->setListReorderable(string $column);

$resource->setListDefaultSort(string $column, string $direction = 'asc');

$resource->setListModifyQueryUsing(Closure $callback);

$resource->setListDefaultGroup(string|Group $group)
```

# Extend classes (Models, Resources)

```php
Model::addMethod('methodName', function (Model $model) {
    /* Do something */
});
```
