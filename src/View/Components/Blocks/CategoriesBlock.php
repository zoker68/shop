<?php

namespace Zoker\Shop\View\Components\Blocks;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Zoker\FilamentStaticPages\Classes\BlockComponent;
use Zoker\Shop\Models\Category;

class CategoriesBlock extends BlockComponent
{
    public static string $label = 'Categories Block';

    public static string $viewTemplate = 'components.blocks.categories';

    public static string $viewNamespace = 'shop';

    public static string $icon = 'heroicon-o-folder-open';

    public function render(): View
    {
        $this->data['categories'] = $this->getCachedCategories();

        return parent::render();
    }

    public function getCachedCategories(): Collection
    {
        return cache()->remember(
            $this->getCacheKey(),
            now()->addDay(),
            fn () => $this->getCategories()
        );
    }

    public function getCategories(): Collection
    {
        return Category::findMany($this->data['categories']);
    }

    protected function getTemplate(): string
    {
        return parent::getTemplate() . '.' . $this->data['template'];
    }

    public static function getSchema(): array
    {
        return [
            Select::make('template')
                ->label('Template')
                ->columnSpanFull()
                ->options([
                    'big' => 'Grid with Big Image',
                    'small' => 'Grid with Small Image in circle',
                ])
                ->default('big')
                ->selectablePlaceholder(false),

            TextInput::make('heading')
                ->label('Block heading')
                ->maxValue(255)
                ->columnSpanFull(),

            Repeater::make('categories')
                ->label('Categories')
                ->columnSpanFull()
                ->maxItems(10)
                ->default([])
                ->simple(
                    Select::make('parent_id')
                        ->label(__('shop::category.admin.form.parent'))
                        ->options(fn () => Category::getCategoryOptions())
                        ->required()
                        ->searchable()
                        ->columnSpanFull(),
                )
                ->columnSpanFull(),

        ];
    }

    private function getCacheKey(): string
    {
        return 'categories_block_' . md5(serialize($this->data));
    }
}
