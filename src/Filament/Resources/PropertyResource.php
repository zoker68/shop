<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Enums\PropertyFilter;
use Zoker\Shop\Enums\PropertyType;
use Zoker\Shop\Filament\Resources\PropertyResource\Pages;
use Zoker\Shop\Models\Property;
use Zoker\Shop\Traits\Resources\ExtendableResource;

class PropertyResource extends Resource
{
    use ExtendableResource;

    protected static ?string $model = Property::class;

    protected static ?string $slug = 'properties';

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    public function presetForm(): void
    {
        $this->addFormFields([
            'name' => TextInput::make('name')
                ->label(__('shop::properties.admin.form.name'))
                ->required(),

            'type' => Select::make('type')
                ->label(__('shop::properties.admin.form.type'))
                ->columnStart(1)
                ->live()
                ->options(PropertyType::getOptions())
                ->required(),

            'filter' => Select::make('filter')
                ->label(__('shop::properties.admin.form.filter'))
                ->live()
                ->options(function (Get $get) {
                    if (! $get('type')) {
                        return [];
                    }

                    return PropertyType::from($get('type'))->instance()->getFiltersWithLabel();
                })
                ->hidden(fn (Get $get) => ! $get('type'))
                ->required(),

            'options' => Repeater::make('options')
                ->label(__('shop::properties.admin.form.options'))
                ->live()
                ->hidden(fn (Get $get) => ! self::shouldShowOptions($get))
                ->schema(function (Get $get) {
                    if (! $get('type')) {
                        return [];
                    }

                    return PropertyType::from($get('type'))->getOptionsForm();
                })
                ->defaultItems(0)
                ->grid(4)
                ->columnSpanFull(),
        ]);
    }

    public function presetTable(): void
    {
        $this->setTableReorderable('sort');

        $this->addTableColumns([
            'name' => TextColumn::make('name')
                ->label(__('shop::properties.admin.list.name'))
                ->searchable()
                ->sortable(),

            'type' => TextColumn::make('type')
                ->label(__('shop::properties.admin.list.type')),

            'filter' => TextColumn::make('filter')
                ->label(__('shop::properties.admin.list.filter')),
        ]);

        $this->addTableActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
            'restore' => RestoreAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ]);

        $this->addTableBulkActions([
            'delete' => DeleteBulkAction::make(),
            'restore' => RestoreBulkAction::make(),
            'forceDelete' => ForceDeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProperties::route('/'),
            'create' => Pages\CreateProperty::route('/create'),
            'edit' => Pages\EditProperty::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name'];
    }

    private static function shouldShowOptions(Get $get): bool
    {
        return $get('filter') && $get('type') && PropertyType::from($get('type'))->instance()->hasOptions() && PropertyFilter::from($get('filter'))->instance()->hasOptions();
    }
}
