<?php

namespace Zoker\Shop\Livewire\Header;

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

    public function mount(): void
    {
        $this->categories = Category::getRootChildren();
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

        return view('zoker.shop::livewire.header.search-widget', compact('result'));
    }

    public function selectCategory($categoryId): void
    {
        $this->category = $categoryId ? $this->categories->firstWhere('id', $categoryId) : null;
    }

    public function search(): Collection
    {
        if (! empty($this->search)) {
            $result = Product::search($this->search)
                ->when($this->category, fn ($q) => $q->whereIn('categories', $this->category->getAllChildrenAndSelf()->pluck('id')->toArray()))
                ->take(5)
                ->get();
        } else {
            $result = collect();
        }

        return $result;
    }
}
