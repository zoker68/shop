<?php

namespace Zoker68\Shop\Filament\Resources;

use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker68\Shop\Enums\PropertyFilter;
use Zoker68\Shop\Enums\PropertyType;
use Zoker68\Shop\Filament\Resources\PropertyResource\Pages;
use Zoker68\Shop\Models\Property;

class PropertyResource extends Resource
{
    protected static ?string $model = Property::class;

    protected static ?string $slug = 'properties';

    protected static ?string $navigationIcon = 'heroicon-o-adjustments-horizontal';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('zoker68.shop::properties.admin.form.name'))
                    ->required(),

                Select::make('type')
                    ->label(__('zoker68.shop::properties.admin.form.type'))
                    ->columnStart(1)
                    ->live()
                    ->options(PropertyType::getOptions())
                    ->required(),

                Select::make('filter')
                    ->label(__('zoker68.shop::properties.admin.form.filter'))
                    ->live()
                    ->options(function (Get $get) {
                        if (! $get('type')) {
                            return [];
                        }

                        return PropertyType::from($get('type'))->instance()->getFiltersWithLabel();
                    })
                    ->hidden(fn (Get $get) => ! $get('type'))
                    ->required(),

                Repeater::make('options')
                    ->label(__('zoker68.shop::properties.admin.form.options'))
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

    public static function table(Table $table): Table
    {
        return $table
            ->reorderable('sort')
            ->columns([
                TextColumn::make('name')
                    ->label(__('zoker68.shop::properties.admin.list.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label(__('zoker68.shop::properties.admin.list.type')),

                TextColumn::make('filter')
                    ->label(__('zoker68.shop::properties.admin.list.filter')),
            ])
            ->filters([

            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
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
