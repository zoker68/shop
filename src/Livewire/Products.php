<?php

namespace Zoker68\Shop\Livewire;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;
use Zoker68\Shop\Enums\ProductsSorting;
use Zoker68\Shop\Enums\ViewType;
use Zoker68\Shop\Exceptions\SetViewTypeException;
use Zoker68\Shop\Models\Category;
use Zoker68\Shop\Models\Product;
use Zoker68\Shop\Traits\Livewire\HasCartFunctions;
use Zoker68\Shop\Traits\Livewire\HasWishlistFunctions;

class Products extends Component
{
    use HasCartFunctions, HasWishlistFunctions, WithPagination;

    public Category $category;

    private $products;

    public ViewType $viewType;

    #[Url(except: [])]
    public array $filters = [];

    public function mount(): void
    {
        $this->viewType = ViewType::getType();
        $this->loadWishlist();
    }

    public function render(): View
    {
        $products = $this->getProducts();

        return view($this->viewType->getTemplate(), compact('products'));
    }

    public function getProducts(): LengthAwarePaginator
    {
        return Product::query()
            ->published()
            ->forCategory($this->category)
            ->applyFilters($this->filters)
            ->applyPropertyFilters($this->filters)
            ->applySorting(ProductsSorting::getSortingOption($this->filters['sort'] ?? null))
            ->withAvg('reviews', 'rating')
            ->withCount('reviews')
            ->paginate(config('category.perPage'));
    }

    #[On('updateFilters')]
    public function updateFilters($filters): void
    {
        $this->filters = $filters;

        $this->clearQueryString();

        $this->resetPage();
    }

    #[On('changeSort')]
    public function changeSorting($sort): void
    {
        $this->filters['sort'] = $sort;

        $this->resetPage();
    }

    public function clearQueryString(): void
    {
        $filters = $this->filters;

        if (empty($filters['brands'])) {
            $filters['brands'] = null;
        }

        if (empty($filters['prices'])) {
            $filters['prices'] = null;
        }

        $filters = array_filter($filters, function ($value) {
            if (is_array($value)) {
                return array_filter($value, fn ($v) => $v !== 'false' && $v !== false);
            }

            return $value !== null && $value !== '';
        });

        $this->filters = $filters;
    }

    #[On('changeViewType')]
    public function changeViewType(string $type = 'grid'): void
    {
        try {
            $this->viewType = ViewType::setType($type);
        } catch (SetViewTypeException $exception) {
            $this->throwAlert('error', $exception->getMessage());
        }
    }

    #[On('updateRangeFilter')]
    public function updateRangeFilter($min, $max, $property): void
    {
        if ($min > $max) {
            [$min, $max] = [$max, $min];
        }

        if ($property == 'price') {
            $currencySubunit = currency()->getSubunit();

            $this->filters['prices'] = [
                'min' => $min * $currencySubunit,
                'max' => $max * $currencySubunit,
            ];
        } else {
            $this->filters[$property] = [
                'min' => $min,
                'max' => $max,
            ];
        }

        $this->clearQueryString();

        $this->resetPage();
    }
}
