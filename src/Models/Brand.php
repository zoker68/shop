<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Zoker\Shop\Classes\Model;
use Zoker\Shop\Traits\Models\Sluggable;

class Brand extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected array $slugs = ['slug' => 'name'];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public static function getByCategory(Category $category): Collection
    {
        return self::query()
            ->published()
            ->whereHas('products', function ($query) use ($category) {
                if ($category->isRoot()) {
                    return;
                }

                $query->whereHas('pivotCategories', function ($query) use ($category) {
                    $query
                        ->when(config('shop.category.includeChildren'), fn ($q) => $q->whereIn('category_id', $category->getAllChildrenAndSelf()->pluck('id')))
                        ->when(! config('shop.category.includeChildren'), fn ($q) => $q->where('category_id', $category->id));
                });
            })->get();
    }
}
