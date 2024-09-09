<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Laravel\Scout\Builder as ScoutBuiler;
use Laravel\Scout\Searchable;
use Veelasky\LaravelHashId\Eloquent\HashableId;
use Zoker\Shop\Enums\ProductsSorting;
use Zoker\Shop\Enums\ProductStatus;
use Zoker\Shop\Observers\ProductObserver;
use Zoker\Shop\Traits\Models\Sluggable;

#[ObservedBy(ProductObserver::class)]
class Product extends Model
{
    use HasFactory, HashableId, Searchable, Sluggable, SoftDeletes;

    protected $casts = [
        'status' => ProductStatus::class,
    ];

    protected $sluggable = 'name';

    /* --------------------- Relations Start --------------------- */
    public function brand(): BelongsTo
    {
        return $this->belongsTo(Brand::class);
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    public function pivotCategories(): HasMany
    {
        return $this->hasMany(CategoryProduct::class);
    }

    public function properties(): BelongsToMany
    {
        return $this->belongsToMany(Property::class)->withPivot('value', 'index_value');
    }

    public function productProperty(): HasMany
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function wishlist(): HasMany
    {
        return $this->hasMany(Wishlist::class, 'product_id');
    }

    public function questions(): HasMany
    {
        return $this->hasMany(ProductQuestion::class, 'product_id');
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(ProductReview::class, 'product_id');
    }
    /* --------------------- Relations End --------------------- */

    /* --------------------- Mutators and Accessors Start  --------------------- */
    protected function price(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => $value * (currency()->getSubunit()),
        );
    }

    /* --------------------- Mutators and Accessors End  --------------------- */

    /* --------------------- Scopes Start --------------------- */
    public function scopeApplyFilters(Builder $query, $filters): Builder
    {
        return $query
            ->when(! empty($filters), function (Builder $query) use ($filters) {
                $query
                    ->when(! empty($filters['brands']), function (Builder $query) use ($filters) {
                        $query->filterByBrandSlugs($filters['brands']);
                    })
                    ->when(! empty($filters['prices']), function (Builder $query) use ($filters) {
                        $query->filterByPrice($filters['prices']);
                    });

            });
    }

    public function scopeFilterByPrice(Builder $query, array $prices): Builder
    {
        return $query->whereBetween('price', $prices);
    }

    public function scopeFilterByBrandSlugs(Builder $query, string $brands): Builder
    {
        return $query->whereHas('brand', function ($query) use ($brands) {
            $brands = explode(',', $brands);
            $query->whereIn('slug', $brands);
        });
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query
            ->where('published', true)
            ->where('status', ProductStatus::APPROVED);
    }

    public function scopeModerated(Builder $query): Builder
    {
        return $query->where('moderated', true);
    }

    public function scopeUnModerated(Builder $query): Builder
    {
        return $query->where('moderated', false);
    }

    public function scopeForCategory(Builder $query, Category $category): Builder
    {
        if ($category->isRoot()) {
            return $query;
        }

        return $query->whereHas('categories', function ($query) use ($category) {
            $query->when(config('shop.category.includeChildren'), fn ($q) => $q->whereIn('category_id', $category->getAllChildrenAndSelf()->pluck('id')))
                ->when(! config('shop.category.includeChildren'), fn ($q) => $q->where('category_id', $category->id));
        });
    }

    public function scopeApplySorting(Builder $query, ProductsSorting $sorting): Builder
    {
        return $sorting->getSortQuery($query);
    }

    public function scopeApplyPropertyFilters(Builder $query, ?array $filters): Builder
    {
        return Property::prepareFilterQuery($query, $filters);
    }
    /* --------------------- Scopes End --------------------- */

    /* --------------------- Methods Start --------------------- */
    public function approve(): void
    {
        $this->status = ProductStatus::APPROVED;
        $this->save();
    }

    public function reject(): void
    {
        $this->status = ProductStatus::REJECTED;
        $this->save();
    }

    public function getCoverImage(): string
    {
        $protocols = ['https://', 'http://'];
        if (Str::startsWith($this->image, $protocols)) {
            return $this->image;
        }

        return Storage::url($this->image);
    }

    public static function getPriceRangeByCategory(Category $category): array
    {
        $range = self::query()
            ->selectRaw('MIN(price) as min, MAX(price) as max')
            ->published()
            ->forCategory($category)
            ->first();

        $currencySubunit = currency()->getSubunit();

        return [
            'min' => $range->min / $currencySubunit,
            'max' => $range->max / $currencySubunit,
        ];
    }

    public function getBreadcrumbs()
    {
        $breadCrumbs = $this->categories->first()->getBreadcrumbs();

        $breadCrumbs[] = [
            'title' => $this->name,
            'url' => $this->url,
        ];

        return $breadCrumbs;
    }

    public function isAvailable(): bool
    {
        return $this->published && $this->status == ProductStatus::APPROVED;
    }

    public function sell(int $quantity): void
    {
        $this->update([
            'stock' => DB::raw('stock - ' . $quantity),
            'sell_count' => DB::raw('sell_count + ' . $quantity),
        ]);
    }

    public function toSearchableArray(): array
    {
        $searchable = $this->toArray();

        if ($this->brand) {
            $searchable['brand'] = $this->brand->name;
        }
        $searchable['status'] = $this->status->value;
        $searchable['categories'] = $this->categories->pluck('id')->toArray();

        $searchable['properties'] = null;
        $this->properties->each(function ($property) use (&$searchable) {
            $searchable['property'][$property->id] = $property->pivot->value;
        });

        return $searchable;
    }

    protected function makeAllSearchableUsing(Builder $query): Builder
    {
        return $query->with('brand', 'properties', 'categories');
    }

    public function makeSearchableUsing(Collection $models): Collection
    {
        return $models->load('brand', 'properties', 'categories');
    }

    public function shouldBeSearchable(): bool
    {
        return $this->published && $this->status == ProductStatus::APPROVED;
    }

    public static function meiliSearch(string $query, ?Category $category, array $filters = []): ScoutBuiler
    {
        return self::search($query)
            ->when()
            ->when($category, fn ($q) => $q->whereIn('categories', $category->getAllChildrenAndSelf()->pluck('id')->toArray()))
            ->when(true, function ($query) use ($filters) {
                $sorting = ProductsSorting::getSortingOption($filters['sort'] ?? null);

                return $query->orderBy($sorting->getSortColumn(), $sorting->getSortDirection());
            });
    }
}
