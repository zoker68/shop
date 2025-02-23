<?php

namespace Zoker\Shop\Models;

use Bkwld\Croppa\Facades\Croppa;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Get;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;
use Spatie\Sitemap\Contracts\Sitemapable;
use Spatie\Sitemap\Tags\Url;
use Zoker\Shop\Classes\Bases\BaseModel;
use Zoker\Shop\Observers\CategoryObserver;
use Zoker\Shop\Traits\Models\HasSeo;
use Zoker\Shop\Traits\Models\Sluggable;
use Zoker\Shop\Traits\Models\TreeTrait;

#[ObservedBy(CategoryObserver::class)]
class Category extends BaseModel implements Sitemapable
{
    use HasFactory, HasSeo, Sluggable, TreeTrait;

    protected array $slugs = ['slug' => ['name']];

    const string CACHE_KEY = 'all_categories';

    const string CACHE_SLUG_MAP_KEY = 'all_categories_slug_map';

    protected static ?Collection $allCategories = null;

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
            'name' => TextInput::make('name')
                ->label(__('shop::category.admin.form.name'))
                ->required()
                ->maxLength(255),

            'slug' => TextInput::make('slug')
                ->label(__('shop::category.admin.form.slug'))
                ->maxLength(255)
                ->live()
                ->unique(
                    ignoreRecord: true,
                    modifyRuleUsing: fn (Unique $rule, Get $get) => $rule->where('parent_id', $get('parent_id')),
                ),

            'parent_id' => Select::make('parent_id')
                ->label(__('shop::category.admin.form.parent'))
                ->options(fn ($record) => Category::getCategoryOptions($record))
                ->required()
                ->searchable()
                ->columnSpanFull(),

            'cover' => FileUpload::make('cover')
                ->label(__('shop::category.admin.form.cover'))
                ->image()
                ->disk(config('shop.disk'))
                ->directory('products')
                ->imageEditor()
                ->imageEditorAspectRatios([null, '4:3', '16:9', '3:1', '1:1']),

            'published' => Toggle::make('published')
                ->label(__('shop::category.admin.form.published'))
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

    public function getFullSlugAttribute(): string
    {
        /* $map = static::getFullSlugMap();
         if (! array_key_exists($this->id, $map)) {
             dd($map, $this->id);
         }*/

        return static::getFullSlugMap()[$this->id];
    }

    public static function getFullSlugMap(): array
    {
        return cache()->remember(
            self::CACHE_SLUG_MAP_KEY,
            now()->addDay(),
            fn () => static::handleCategoryForMap(self::getRootChildren(), [])
        )
            + [1 => '']; // For root
    }

    public static function handleCategoryForMap($categories, $map)
    {
        foreach ($categories as $category) {
            $parentSlug = isset($map[$category->parent_id]) ? $map[$category->parent_id] . '/' : '';
            $map[$category->id] = $parentSlug . $category->slug;
            $map = static::handleCategoryForMap(self::getAllCached()->where('parent_id', $category->id), $map);
        }

        return $map;
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
        if (! self::$allCategories) {
            self::$allCategories = Category::orderBy('order')->get();
        }

        return self::$allCategories;
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
            ->where('published', true)
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

    public function getCover(?int $width = null, ?int $height = null, ?array $options = null): string
    {
        if (! $this->cover) {
            return config('shop.cover_default_url') ?? '';
        }

        if ($width || $height || $options) {
            return Croppa::url($this->cover, $width, $height, $options);
        }

        return Storage::disk(config('shop.disk'))->url($this->cover);
    }

    public function toSitemapTag(): Url|string|array
    {
        return Url::create(route('category', $this))
            ->setLastModificationDate($this->updated_at);
    }
}
