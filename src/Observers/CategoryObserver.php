<?php

namespace Zoker\Shop\Observers;

use Illuminate\Support\Facades\Cache;
use Zoker\Shop\Models\Category;

class CategoryObserver
{
    public function saving(Category $category): void {}

    public function saved(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }

    public function created(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }

    public function updated(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }

    public function deleted(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }

    public function restored(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }

    public function forceDeleted(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }
}
