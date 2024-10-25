<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;
use Zoker\Shop\Classes\Model;
use Zoker\Shop\Enums\PropertyFilter;
use Zoker\Shop\Enums\PropertyType;
use Zoker\Shop\Observers\PropertyObserver;

#[ObservedBy(PropertyObserver::class)]
class Property extends Model
{
    use HasFactory;

    protected $casts = [
        'type' => PropertyType::class,
        'filter' => PropertyFilter::class,
        'options' => 'array',
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('value', 'index_value');
    }

    public function productProperty(): HasMany
    {
        return $this->hasMany(ProductProperty::class);
    }

    public function scopeListNonDuplicatedForProductId(Builder $query, int $productId): Builder
    {
        return $query->whereDoesntHave('products', fn ($query) => $query->where('product_id', $productId));
    }

    public function formSetValue(): array
    {
        return $this->type->instance()->formSetValue($this);
    }

    public function getOptionsList(): array
    {
        return collect($this->options)->pluck('value', 'value')->toArray();
    }

    public function scopeForCategory(Builder $query, Category $category): Builder
    {
        return $query->whereHas('products', fn (Builder $query) => $query->forCategory($category)->published());
    }

    public function scopeHasFilter(Builder $query): Builder
    {
        return $query->where('filter', '!=', PropertyFilter::None);
    }

    public function scopeProductPropertyRelationHasValue(Builder $query): Builder
    {
        return $query->whereHas('productProperty', fn (Builder $query) => $query->whereNotNull('value'));
    }

    public function hasOptions(): bool
    {
        if (! $this->canHaveOptions()) {
            return false;
        }

        if (empty($this->options)) {
            return false;
        }

        return true;
    }

    public function canHaveOptions(): bool
    {
        return $this->type->instance()->hasOptions() && $this->filter->instance()->hasOptions();
    }

    public function getBladeComponentName(): string
    {
        return $this->filter->instance()->getBladeComponentName($this->type);
    }

    public static function prepareFilterQuery(Builder $query, ?array $filters): Builder
    {
        $filteredProperties = self::extractPropertyIdsAndValues($filters);
        if (empty($filteredProperties)) {
            return $query;
        }

        $propertyQueries = self::getPropertyQueries($filteredProperties);
        foreach ($propertyQueries as $propertyQuery) {
            $query->whereHas('productProperty', function ($query) use ($propertyQuery) {
                $query->where($propertyQuery);
            });
        }

        return $query;
    }

    private static function extractPropertyIdsAndValues(?array $filters): array
    {
        if (empty($filters)) {
            return [];
        }

        return array_filter($filters, fn ($value, $key) => (is_int($key) && ! empty($value) || $value == 0), ARRAY_FILTER_USE_BOTH);
    }

    private static function getPropertyQueries(array $filteredProperties): Collection
    {
        return self::query()
            ->whereIn('id', array_keys($filteredProperties))
            ->get()
            ->map(function ($property) use ($filteredProperties) {
                if ($property->type === PropertyType::Boolean && $filteredProperties[$property->id] === 'any') {
                    return;
                }

                return $property->filter->getQueryForFilter($property->id, $filteredProperties[$property->id]);
            })
            ->filter();
    }

    public function getValueBladeComponentName(): ?string
    {
        return $this->type->instance()->getValueBladeComponentName($this);
    }
}
