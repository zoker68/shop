<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Filament\Resources\ShippingMethodResource\Pages;
use Zoker\Shop\Models\ShippingMethod;
use Zoker\Shop\Traits\Resources\ExtendableResource;

class ShippingMethodResource extends Resource
{
    use ExtendableResource;

    protected static ?string $model = ShippingMethod::class;

    protected static ?string $slug = 'shipping-methods';

    protected static ?string $navigationIcon = 'heroicon-o-truck';

    protected static ?string $navigationGroup = 'Checkout';

    public function presetForm(): void
    {
        $this->addFormFields([
            'name' => TextInput::make('name')
                ->label(__('shop::checkout.shipping.admin.form.name'))
                ->required(),

            'description' => Textarea::make('description')
                ->label(__('shop::checkout.shipping.admin.form.description')),

            'image' => FileUpload::make('image')
                ->label(__('shop::product.admin.form.image'))
                ->image()
                ->directory('shipping-methods')
                ->imageEditor()
                ->imageEditorAspectRatios(['1:1', '4:3', '16:9', '3:1', '4:1']),

            'sort' => TextInput::make('sort')
                ->label(__('shop::checkout.shipping.admin.form.sort'))
                ->default(fn () => ShippingMethod::count() + 1)
                ->required()
                ->integer(),

            'price' => TextInput::make('price')
                ->label(__('shop::checkout.shipping.admin.form.price'))
                ->default(0)
                ->required()
                ->numeric()
                ->prefix(currency()->getPrefix())
                ->postfix(currency()->getSuffix())
                ->minValue(0)
                ->afterStateHydrated(fn ($state, $set) => $set('price', $state / (currency()->getSubunit()))),

            'days' => TextInput::make('days')
                ->label(__('shop::checkout.shipping.admin.form.days'))
                ->default(0)
                ->required()
                ->string(),

            'available_from' => TextInput::make('available_from')
                ->label(__('shop::checkout.shipping.admin.form.available_from.label'))
                ->helperText(__('shop::checkout.shipping.admin.form.available_from.description'))
                ->default(0)
                ->numeric()
                ->prefix(currency()->getPrefix())
                ->postfix(currency()->getSuffix())
                ->minValue(0)
                ->afterStateHydrated(fn ($state, $set) => $set('available_from', $state / (currency()->getSubunit()))),

            'available_until' => TextInput::make('available_until')
                ->label(__('shop::checkout.shipping.admin.form.available_until.label'))
                ->helperText(__('shop::checkout.shipping.admin.form.available_until.description'))
                ->default(0)
                ->numeric()
                ->prefix(currency()->getPrefix())
                ->postfix(currency()->getSuffix())
                ->minValue(0)
                ->afterStateHydrated(fn ($state, $set) => $set('available_until', $state / (currency()->getSubunit()))),

            'published' => Toggle::make('published')
                ->label(__('shop::checkout.shipping.admin.form.published')),
        ]);
    }

    public function presetList(): void
    {
        $this->setListDefaultSort('sort');

        $this->setListReorderable('sort');

        $this->addListColumns([
            'name' => TextColumn::make('name')
                ->label(__('shop::checkout.shipping.admin.list.name'))
                ->searchable()
                ->sortable(),

            'price' => TextColumn::make('price')
                ->label(__('shop::checkout.shipping.admin.list.price'))
                ->money(currency()->getCurrency(), currency()->getSubunit()),

            'published' => ToggleColumn::make('published')
                ->label(__('shop::checkout.shipping.admin.list.published')),
        ]);

        $this->addListFilters([
            'trashed' => TrashedFilter::make(),
        ]);

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
            'restore' => RestoreAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ]);

        $this->addListBulkActions([
            'delete' => DeleteBulkAction::make(),
            'restore' => RestoreBulkAction::make(),
            'forceDelete' => ForceDeleteBulkAction::make(),
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
