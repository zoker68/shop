<?php

namespace Zoker\Shop\View\Components\Blocks;

use Filament\Forms\Components\Group;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Illuminate\Contracts\View\View;
use Zoker\FilamentStaticPages\Classes\BlockComponent;
use Zoker\Shop\Enums\ProductsSorting;
use Zoker\Shop\Models\Category;

class ProductsBlock extends BlockComponent
{
    public static string $label = 'Products Block';

    public static string $viewTemplate = 'components.blocks.products';

    public static string $viewNamespace = 'shop';

    public static string $icon = 'heroicon-s-cube';

    public function render(): View
    {
        $this->data['settings'] = $this->data;

        return parent::render();
    }

    public static function getSchema(): array
    {
        return [
            Select::make('template')
                ->label('Template')
                ->columnSpanFull()
                ->options([
                    'default' => 'Default Grid',
                    'grid-compact' => 'Grid Compact',
                ])
                ->default('default')
                ->selectablePlaceholder(false),

            Group::make([
                Section::make('Main settings')
                    ->schema([

                        TextInput::make('heading')
                            ->label('Block heading')
                            ->maxValue(255),

                        TextInput::make('limit')
                            ->label('Count of products')
                            ->default(4)
                            ->required()
                            ->numeric()
                            ->minValue(1)
                            ->maxValue(100)
                            ->step(1),

                        Select::make('sort')
                            ->label('Sorting')
                            ->options(ProductsSorting::getOptions())
                            ->required(),
                    ]),
            ]),

            Group::make([
                Section::make('Link right side')
                    ->schema([
                        TextInput::make('link.text')
                            ->label('Link Text')
                            ->maxValue(255)
                            ->columnSpanFull(),
                        TextInput::make('link.url')
                            ->label('URL')
                            ->maxValue(255)
                            ->url(),

                        Select::make('link.target')
                            ->label('Link Target')
                            ->default('_self')
                            ->selectablePlaceholder(false)
                            ->options([
                                '_self' => '_self',
                                '_blank' => '_blank',
                                '_parent' => '_parent',
                                '_top' => '_top',
                            ]),

                    ]),
            ]),

            Group::make([
                Section::make('Filtering products')
                    ->schema([
                        Repeater::make('categories')
                            ->label('Categories')
                            ->hint('Select categories to show products. Subcategories will be included. For all categories, leave empty')
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
                            ),
                    ]),
            ])
                ->columnSpanFull(),

        ];
    }
}
