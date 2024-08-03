<?php

namespace Zoker68\Shop\Observers;

use Illuminate\Support\Facades\Cache;
use Zoker68\Shop\Models\Category;

class CategoryObserver
{
    public function saving(Category $category): void
    {
        $category->checkSlug();
    }

    public function saved(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }

    /**
     * Handle the Category "created" event.
     */
    public function created(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }

    /**
     * Handle the Category "updated" event.
     */
    public function updated(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }

    /**
     * Handle the Category "deleted" event.
     */
    public function deleted(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }

    /**
     * Handle the Category "restored" event.
     */
    public function restored(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }

    /**
     * Handle the Category "force deleted" event.
     */
    public function forceDeleted(Category $category): void
    {
        Cache::forget(Category::CACHE_KEY);
    }
}
