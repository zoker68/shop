<?php

namespace Zoker\Shop\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Zoker\Shop\View\Components\Partials\Breadcrumbs;
use Zoker\Shop\View\Components\Partials\Navbar;

class ShopServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot(): void
    {
        Model::unguard();
        Model::preventLazyLoading(! app()->isProduction());

        $this->loadRoutesFrom(__DIR__ . '/../../routes/shop.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'zoker.shop');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'zoker.shop');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/shop.php', 'zoker.shop'
        );

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return '\\Zoker\\Shop\\Database\\Factories\\' . class_basename($modelName) . 'Factory';
        });

        Blade::component('zoker.shop::partials.navbar', Navbar::class);
        Blade::component('zoker.shop::partials.breadcrumbs', Breadcrumbs::class);

        $this->publishesMigrations([
            __DIR__ . '/../../database/seeders/' => database_path('seeders'),
        ], 'shop-seeders');

        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/zoker.shop'),
        ], 'shop-views');

        $this->publishes([
            __DIR__ . '/../../resources/lang' => $this->app->langPath('vendor/zoker.shop'),
        ], 'shop-lang');

        $this->publishes([
            __DIR__ . '/../../config/shop.php' => config_path('shop.php'),
        ], 'shop-config');
    }
}
