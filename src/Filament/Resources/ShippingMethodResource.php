<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
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
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Filament\Resources\ShippingMethodResource\Pages;
use Zoker\Shop\Models\ShippingMethod;

class ShippingMethodResource extends Resource
{
    protected static ?string $model = ShippingMethod::class;

    protected static ?string $slug = 'shipping-methods';

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Checkout';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('shop::checkout.shipping.admin.form.name'))
                    ->required(),

                Textarea::make('description')
                    ->label(__('shop::checkout.shipping.admin.form.description')),

                FileUpload::make('image')
                    ->label(__('shop::product.admin.form.image'))
                    ->image()
                    ->directory('shipping-methods')
                    ->imageEditor()
                    ->imageEditorAspectRatios(['1:1', '4:3', '16:9', '3:1', '4:1']),

                TextInput::make('sort')
                    ->label(__('shop::checkout.shipping.admin.form.sort'))
                    ->default(fn () => count(ShippingMethod::all()) + 1)
                    ->required()
                    ->integer(),

                TextInput::make('price')
                    ->label(__('shop::checkout.shipping.admin.form.price'))
                    ->default(0)
                    ->required()
                    ->numeric()
                    ->prefix(currency()->getPrefix())
                    ->postfix(currency()->getSuffix())
                    ->minValue(0)
                    ->afterStateHydrated(fn ($state, $set) => $set('price', $state / (currency()->getSubunit()))),

                TextInput::make('days')
                    ->label(__('shop::checkout.shipping.admin.form.days'))
                    ->default(0)
                    ->required()
                    ->string(),

                TextInput::make('available_from')
                    ->label(__('shop::checkout.shipping.admin.form.available_from.label'))
                    ->helperText(__('shop::checkout.shipping.admin.form.available_from.description'))
                    ->default(0)
                    ->numeric()
                    ->prefix(currency()->getPrefix())
                    ->postfix(currency()->getSuffix())
                    ->minValue(0)
                    ->afterStateHydrated(fn ($state, $set) => $set('available_from', $state / (currency()->getSubunit()))),

                TextInput::make('available_until')
                    ->label(__('shop::checkout.shipping.admin.form.available_until.label'))
                    ->helperText(__('shop::checkout.shipping.admin.form.available_until.description'))
                    ->default(0)
                    ->numeric()
                    ->prefix(currency()->getPrefix())
                    ->postfix(currency()->getSuffix())
                    ->minValue(0)
                    ->afterStateHydrated(fn ($state, $set) => $set('available_until', $state / (currency()->getSubunit()))),

                Toggle::make('published')
                    ->label(__('shop::checkout.shipping.admin.form.published')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort')
            ->reorderable('sort')
            ->columns([
                TextColumn::make('name')
                    ->label(__('shop::checkout.shipping.admin.list.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('price')
                    ->label(__('shop::checkout.shipping.admin.list.price'))
                    ->money(currency()->getCurrency(), currency()->getSubunit()),

                ToggleColumn::make('published')
                    ->label(__('shop::checkout.shipping.admin.list.published')),

            ])
            ->filters([
                TrashedFilter::make(),
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
            'index' => Pages\ListShippingMethods::route('/'),
            'create' => Pages\CreateShippingMethod::route('/create'),
            'edit' => Pages\EditShippingMethod::route('/{record}/edit'),
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
}
