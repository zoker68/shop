<?php

namespace Zoker\Shop\Providers;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;
use Zoker\FilamentStaticPages\Classes\BlocksComponentRegistry;
use Zoker\Shop\Console\Commands\ScoutIndexUpdateCommand;
use Zoker\Shop\Console\Commands\SyncLogClearCommand;
use Zoker\Shop\Livewire\Account\Wishlist;
use Zoker\Shop\Livewire\Auth\AddressEdit;
use Zoker\Shop\Livewire\Auth\Login;
use Zoker\Shop\Livewire\Cart;
use Zoker\Shop\Livewire\Checkout;
use Zoker\Shop\Livewire\Confirm;
use Zoker\Shop\Livewire\Contact;
use Zoker\Shop\Livewire\Header\CartWidget;
use Zoker\Shop\Livewire\Header\SearchWidget;
use Zoker\Shop\Livewire\Header\WishlistWidget;
use Zoker\Shop\Livewire\Payment;
use Zoker\Shop\Livewire\Product;
use Zoker\Shop\Livewire\Products;
use Zoker\Shop\Livewire\ProductsBlock as ProductsBlockLivewire;
use Zoker\Shop\Livewire\ProductsFilter;
use Zoker\Shop\Livewire\SearchResults;
use Zoker\Shop\Livewire\Shipping;
use Zoker\Shop\View\Components\Blocks\ContactBlock;
use Zoker\Shop\View\Components\Blocks\ProductsBlock;
use Zoker\Shop\View\Components\Blocks\TopProductBlock;

class ShopServiceProvider extends ServiceProvider
{
    public function register()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                ScoutIndexUpdateCommand::class,
                SyncLogClearCommand::class,
            ]);
        }

        BlocksComponentRegistry::register(ContactBlock::class);
        BlocksComponentRegistry::register(ProductsBlock::class);
        BlocksComponentRegistry::register(TopProductBlock::class);
    }

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
        Blade::componentNamespace('Zoker\\Shop\\View\\Components', 'shop');

        //        Blade::component(ContactBlock::class, 'shop::contact-block');
        //        Blade::component(Products::class, 'products-block');
    }

    private function registerLivewireComponents(): void
    {
        Livewire::component('shop.products', Products::class);
        Livewire::component('shop.product', Product::class);
        Livewire::component('shop.product-filter', ProductsFilter::class);
        Livewire::component('shop.search-results', SearchResults::class);

        Livewire::component('shop.cart', Cart::class);
        Livewire::component('shop.checkout', Checkout::class);
        Livewire::component('shop.shipping', Shipping::class);
        Livewire::component('shop.payment', Payment::class);
        Livewire::component('shop.confirm', Confirm::class);

        Livewire::component('shop.widget.cart', CartWidget::class);
        Livewire::component('shop.widget.wishlist', WishlistWidget::class);
        Livewire::component('shop.widget.search', SearchWidget::class);

        Livewire::component('shop.auth.address-edit', AddressEdit::class);
        Livewire::component('shop.account.login', Login::class);

        Livewire::component('shop.account.wishlist', Wishlist::class);

        Livewire::component('shop.contact', Contact::class);

        Livewire::component('shop.products-block', ProductsBlockLivewire::class);
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
