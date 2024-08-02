<?php

namespace Zoker68\Shop\Providers;

use Illuminate\Support\ServiceProvider;

class ShopServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/shop.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'zoker68.shop');
        $this->loadMigrationsFrom(__DIR__.'/../../database/migrations');
    }

}
