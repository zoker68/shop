<?php

namespace Zoker\Shop\View\Components\Blocks;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Zoker\FilamentStaticPages\Classes\BlockComponent;
use Zoker\Shop\Enums\ProductsSorting;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Models\Product;

class TopProductBlock extends BlockComponent
{
    public static string $label = 'Top Product Block';

    public static string $viewTemplate = 'components.blocks.top-products';

    public static string $viewNamespace = 'shop';

    public static string $icon = 'heroicon-o-star';

    public function render(): View
    {
        $this->data['topRanking'] = cache()->remember(
            $this->getCacheKey(),
            now()->addHour(),
            fn () => $this->getTopProducts()
        );

        return parent::render();
    }

    private function getTopProducts(): array
    {
        return Category::findMany($this->data['categories'])
            ->map(function (Category $category) {
                return [
                    'category' => $category,
                    'products' => Product::query()
                        ->forCategory($category)
                        ->published()
                        ->withAvg('reviews', 'rating')
                        ->withCount('reviews')
                        ->take($this->data['limit'])
                        ->applySorting(ProductsSorting::from($this->data['sort']))
                        ->get(),
                ];
            })
            ->toArray();
    }

    public static function getSchema(): array
    {
        return [
            TextInput::make('heading')
                ->label('Block heading')
                ->maxValue(255),

            TextInput::make('limit')
                ->label('Count of products')
                ->default(5)
                ->required()
                ->numeric()
                ->minValue(1)
                ->maxValue(100)
                ->step(1),

            Select::make('sort')
                ->label('Sorting')
                ->options(ProductsSorting::getOptions())
                ->required(),

            Toggle::make('show_index')
                ->label('Show place in category')
                ->default(true),

            Repeater::make('categories')
                ->label('Categories to show')
                ->columnSpanFull()
                ->minItems(1)
                ->maxItems(10)
                ->simple(
                    Select::make('parent_id')
                        ->label(__('shop::category.admin.form.parent'))
                        ->options(fn () => Category::getCategoryOptions())
                        ->required()
                        ->searchable()
                        ->columnSpanFull(),
                ),
        ];
    }

    private function getCacheKey(): string
    {
        return 'top_products' . md5(serialize($this->data));
    }

    public static function getBlockHeader(array $state): string
    {
        return static::getLabel() . ($state['heading'] ? ' | ' . Str::of($state['heading'])->limit(60) : '');
    }
}
