<?php

namespace Zoker\Shop\Models;

use Bkwld\Croppa\Facades\Croppa;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Zoker\Shop\Classes\Bases\BaseModel;
use Zoker\Shop\Traits\Models\Sluggable;

class Brand extends BaseModel
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

    public function getLogoUrl(?int $width = null, ?int $height = null, ?array $options = null): string
    {
        if (Str::startsWith($this->image, ['https://', 'http://'])) {
            return $this->image;
        }

        $imageUrl = Storage::disk(config('shop.disk'))->url($this->logo);

        if ($width || $height || $options) {
            return Croppa::url($imageUrl, $width, $height, $options);
        }

        return $imageUrl;
    }
}
