<?php

namespace Zoker\Shop\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Zoker\Shop\View\Components\Partials\Breadcrumbs;
use Zoker\Shop\View\Components\Partials\Navbar;

class ShopServiceProvider extends ServiceProvider
{
    public function register() {}

    public function boot(): void
    {
        Model::unguard();
        Model::preventLazyLoading(! app()->isProduction());

        $this->loadAllData();

        $this->registerBladeComponents();

        $this->allPublishes();

        $this->registerLivewireComponents();
    }

    private function allPublishes(): void
    {
        $this->publishesMigrations([
            __DIR__ . '/../../database/seeders/' => database_path('seeders'),
        ], 'shop-seeders');

        $this->publishes([
            __DIR__ . '/../../resources/views' => resource_path('views/vendor/shop'),
        ], 'shop-views');

        $this->publishes([
            __DIR__ . '/../../resources/lang' => $this->app->langPath('vendor/shop'),
        ], 'shop-lang');

        $this->publishes([
            __DIR__ . '/../../config/shop.php' => config_path('shop.php'),
        ], 'shop-config');
    }

    private function registerBladeComponents(): void
    {
        Blade::component('shop::partials.navbar', Navbar::class);
        Blade::component('shop::partials.breadcrumbs', Breadcrumbs::class);
    }

    private function registerLivewireComponents(): void
    {
        Livewire::component('shop.products', \Zoker\Shop\Livewire\Products::class);
    }

    private function loadAllData(): void
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/shop.php');
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'shop');
        $this->loadTranslationsFrom(__DIR__ . '/../../resources/lang', 'shop');
        $this->loadMigrationsFrom(__DIR__ . '/../../database/migrations');

        $this->mergeConfigFrom(
            __DIR__ . '/../../config/shop.php', 'shop'
        );

        Factory::guessFactoryNamesUsing(function (string $modelName) {
            return '\\Zoker\\Shop\\Database\\Factories\\' . class_basename($modelName) . 'Factory';
        });
    }
}
