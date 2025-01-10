<?php

namespace Zoker\Shop\Livewire\Header;

use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Models\Product;

class SearchWidget extends Component
{
    public string $search = '';

    public Collection $categories;

    public ?Category $category = null;

    public int $resultTotal = 0;

    public function mount(): void
    {
        $this->categories = Category::getRootChildren()->where('published', true);
        if (request()->search) {
            $this->search = request()->search;
        }
        if (request()->category) {
            $this->selectCategory(request()->category);
        }
    }

    public function render(): View
    {
        $result = $this->search();

        return view('shop::livewire.header.search-widget', compact('result'));
    }

    public function selectCategory($categoryId): void
    {
        $this->category = $categoryId ? $this->categories->firstWhere('id', $categoryId) : null;
    }

    public function search(): Collection|LengthAwarePaginator
    {
        $this->resultTotal = 0;
        if (! empty($this->search)) {

            $result = Product::search($this->search)
                ->when($this->category, fn ($q) => $q->whereIn('categories', $this->category->getAllChildrenAndSelf()->pluck('id')->toArray()))
                ->paginate(5);
        } else {
            $result = collect();
        }

        return $result;
    }
}
