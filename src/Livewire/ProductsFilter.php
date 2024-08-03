<?php

namespace Zoker\Shop\Livewire;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\Url;
use Livewire\Component;
use Zoker\Shop\Enums\ProductStatus;
use Zoker\Shop\Enums\PropertyFilter;
use Zoker\Shop\Enums\PropertyType;
use Zoker\Shop\Models\Brand;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Models\Product;
use Zoker\Shop\Models\Property;

class ProductsFilter extends Component
{
    public Category $category;

    #[Url(except: [])]
    public array $filters = [];

    public array $selectedBrands;

    public array $priceRange = [];

    public array $priceStart = [];

    public function mount(): void
    {
        $this->priceStart = $this->priceRange = Product::getPriceRangeByCategory($this->category);

        $this->handleFiltersFromQueryString();
    }

    public function render(): View
    {
        $properties = $this->getPropertiesWithOptions();

        $brands = Brand::getByCategory($this->category);

        return view('shop::livewire.shop.products.filter', with([
            'brands' => $brands,
            'properties' => $properties,
        ]));
    }

    private function generateQueryVariable(): void
    {
        if (! empty($this->selectedBrands)) {
            $selectedBrandKeys = array_keys(array_filter($this->selectedBrands));
            $this->filters['brands'] = implode(',', $selectedBrandKeys);
        }

        $this->dispatch('updateFilters', $this->filters);
    }

    public function filter(): void
    {
        $this->generateQueryVariable();
    }

    public function handleFiltersFromQueryString(): void
    {
        if (! empty($this->filters['brands'])) {
            $this->selectedBrands = array_flip(explode(',', $this->filters['brands']));
            foreach ($this->selectedBrands as $key => $value) {
                $this->selectedBrands[$key] = true;
            }
        }

        if (! empty($this->filters['prices'])) {
            $currencySubunit = currency()->getSubunit();
            $this->priceStart = [
                'min' => $this->filters['prices']['min'] / $currencySubunit,
                'max' => $this->filters['prices']['max'] / $currencySubunit,
            ];
        }
    }

    public function getPropertiesWithOptions(): ?Collection
    {
        $properties = Property::query()
            ->productPropertyRelationHasValue()
            ->hasFilter()
            ->forCategory($this->category)
            ->orderBy('sort')
            ->get();

        $useValues = DB::table('product_property')
            ->select(['property_id', 'value', 'index_value'])
            ->join('products', 'product_property.product_id', '=', 'products.id')
            ->join('category_product', 'products.id', '=', 'category_product.product_id')
            ->when(! $this->category->isRoot(), fn (Builder $query) => $query
                ->when(config('shop.category.includeChildren'), fn ($q) => $q->whereIn('category_id', $this->category->getAllChildrenAndSelf()->pluck('id')))
                ->when(! config('shop.category.includeChildren'), fn ($q) => $q->where('category_id', $this->category->id))
            )
            ->where('products.published', true)
            ->where('products.status', ProductStatus::APPROVED)
            ->whereIn('property_id', $properties->pluck('id'))
            ->get()
            ->groupBy('property_id');

        return $properties->map(function ($property) use ($useValues) {
            $useValueForProperty = collect($useValues[$property->id] ?? [])
                ->pluck('value', 'index_value')
                ->toArray();

            if ($property->hasOptions()) {
                $options = [];

                foreach ($useValueForProperty as $index => $value) {
                    if (in_array($value, Arr::pluck($property->options, 'value'))) {
                        $options[$index] = $value;
                    }
                }

                $property->filterOptions = $options;
            } else {
                if ($property->type === PropertyType::Boolean) {
                    $useValueForProperty = PropertyType::Boolean->instance()->getOptionsForFilters($property->filter);
                }

                if ($property->filter === PropertyFilter::Range) {
                    $useValueForProperty = [
                        'min' => min($useValueForProperty),
                        'max' => max($useValueForProperty),
                    ];
                }

                $property->filterOptions = $useValueForProperty;
            }

            return $property;
        });
    }
}
