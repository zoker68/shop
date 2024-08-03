# shop

# Install

- Delete map "database"

- composer require zoker68/shop
- Publish factories and Seeders:
  
```text
php artisan vendor:publish --tag=shop-factories
```

- Publish Views:

```text
php artisan vendor:publish --tag=shop-views
```
- Publish Views (if you want!!!:

```text
php artisan vendor:publish --tag=shop-lang
```

- Install Filament:

```text
php artisan filament:install --panels
```
