<?php

namespace Zoker\Shop\Livewire;

use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Zoker\Shop\Enums\ProductsSorting;
use Zoker\Shop\Models\Product;
use Zoker\Shop\Traits\Livewire\HasCartFunctions;
use Zoker\Shop\Traits\Livewire\HasWishlistFunctions;

class ProductsBlock extends Component
{
    use HasCartFunctions, HasWishlistFunctions;

    private $products;

    public $data;

    public function mount(): void
    {
        $this->loadWishlist();
    }

    public function render(): View
    {

        $products = $this->getProductCache();

        return view('shop::livewire.blocks.products', compact('products'));
    }

    private function getProductCache(): Collection
    {
        return cache()->remember(
            $this->getCacheKey(),
            now()->addHour(),
            fn () => $this->getProducts()
        );

    }

    private function getProducts(): Collection
    {
        return Product::query()
            ->published()
            ->forCategories($this->data['categories'])
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->take($this->data['limit'])
            ->applySorting(ProductsSorting::from($this->data['sort']))
            ->get();
    }

    private function getCacheKey(): string
    {
        return 'products' . md5(serialize($this->data));
    }
}
