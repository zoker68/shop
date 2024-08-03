<?php

namespace Zoker68\Shop\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Zoker68\Shop\Enums\ViewType;
use Zoker68\Shop\Exceptions\SetViewTypeException;
use Zoker68\Shop\Models\Category;
use Zoker68\Shop\Models\Product;
use Zoker68\Shop\Traits\Livewire\HasCartFunctions;
use Zoker68\Shop\Traits\Livewire\HasWishlistFunctions;

class SearchResults extends Component
{
    use HasCartFunctions, HasWishlistFunctions, WithPagination;

    public string $search;

    public ?Category $category = null;

    public ViewType $viewType;

    public array $filters = [];

    public function mount(): void
    {
        $this->viewType = ViewType::getType();
        $this->category = request()->category ? Category::published()->find(request()->category) : null;
        $this->search = request()->search;

        $this->loadWishlist();
    }

    public function render(): View
    {
        $products = Product::meiliSearch($this->search, $this->category, $this->filters)
            ->query(fn ($q) => $q->withAvg('reviews', 'rating')->withCount('reviews'))
            ->paginate();

        return view($this->viewType->getTemplate(), compact('products'));
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

    #[On('changeSort')]
    public function changeSorting(string $sort): void
    {
        $this->filters['sort'] = $sort;

        $this->resetPage();
    }
}
