<?php

namespace Zoker68\Shop\Models;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Zoker68\Shop\Observers\CategoryObserver;
use Zoker68\Shop\Traits\Models\Sluggable;
use Zoker68\Shop\Traits\Models\TreeTrait;

#[ObservedBy(CategoryObserver::class)]
class Category extends Model
{
    use HasFactory, Sluggable, TreeTrait;

    protected array $sluggable = ['name'];

    const CACHE_KEY = 'all_categories';

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('published', true);
    }

    public static function getAdminFormSchema(): array
    {
        return [
            TextInput::make('name')
                ->label(__('zoker68.shop::category.admin.form.name'))
                ->required()
                ->maxLength(255),
            TextInput::make('slug')
                ->label(__('zoker68.shop::category.admin.form.slug'))
                ->maxLength(255)
                ->required()
                ->unique(ignoreRecord: true),
            Select::make('parent_id')
                ->label(__('zoker68.shop::category.admin.form.parent'))
                ->options(fn ($record) => Category::getCategoryOptions($record))
                ->searchable()
                ->columnSpanFull(),
            Toggle::make('published')
                ->label(__('zoker68.shop::category.admin.form.published'))
                ->required(),
        ];
    }

    public function getFullNameAttribute(): string
    {
        $name = $this->name;
        $currentCategory = $this;
        $allCategories = self::getAllCached();

        while ($currentCategory = $allCategories->firstWhere('id', $currentCategory['parent_id'])) {
            $name = $currentCategory['name'] . ' - ' . $name;
        }

        return $name;
    }

    public static function getCategoryOptions(?self $excludeCategory = null): array
    {
        return self::query()
            ->when($excludeCategory,
                fn ($query) => $query->whereNotIn('id', $excludeCategory->getAllChildrenAndSelf()->pluck('id')->toArray())
            )
            ->get()
            ->sortBy('full_name', SORT_NATURAL)
            ->pluck('full_name', 'id')->toArray();
    }

    public static function getAllCached(): Collection
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            return Category::orderBy('order')->get();
        });
    }

    /**
     * @return Collection<self>
     */
    public function getNested(): Collection
    {
        return static::getAllNested($this);
    }

    /**
     * @return Collection<self>
     */
    public static function getAllNested(?self $category = null): Collection
    {
        return self::getAllCached()
            ->when($category, fn ($query) => $query->where('parent_id', $category->id))
            ->when(! $category, fn ($query) => $query->where('parent_id', 1))
            ->sortBy('order')
            ->each(fn (self $category) => $category->children = self::getAllNested($category));
    }

    public function getBreadcrumbs(): array
    {
        $currentCategory = $this;

        do {
            $breadcrumbs[] = [
                'title' => $currentCategory->name,
                'url' => route('category', $currentCategory),
            ];
        } while ($currentCategory = self::getAllCached()->firstWhere('id', $currentCategory->parent_id));

        return array_reverse($breadcrumbs);
    }
}