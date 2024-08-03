<?php

namespace Zoker\Shop\Livewire;

use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;
use Zoker\Shop\Enums\ViewType;
use Zoker\Shop\Exceptions\SetViewTypeException;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Models\Product;
use Zoker\Shop\Traits\Livewire\HasCartFunctions;
use Zoker\Shop\Traits\Livewire\HasWishlistFunctions;

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
