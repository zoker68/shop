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
composer require zoker68/shop
```
- Publish Seeders:
  
```text
php artisan vendor:publish --tag=shop-seeders
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

