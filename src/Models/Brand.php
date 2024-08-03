<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Zoker\Shop\Observers\BrandObserver;
use Zoker\Shop\Traits\Models\Sluggable;

#[ObservedBy(BrandObserver::class)]
class Brand extends Model
{
    use HasFactory, Sluggable, SoftDeletes;

    protected array $sluggable = ['name'];

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
                        ->when(config('category.includeChildren'), fn ($q) => $q->whereIn('category_id', $category->getAllChildrenAndSelf()->pluck('id')))
                        ->when(! config('category.includeChildren'), fn ($q) => $q->where('category_id', $category->id));
                });
            })->get();
    }
}
