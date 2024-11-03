<?php

namespace Zoker\Shop\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Get;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Classes\Bases\BaseRelationManager;
use Zoker\Shop\Models\Address;
use Zoker\Shop\Models\Country;
use Zoker\Shop\Models\Region;

class AddressesRelationManager extends BaseRelationManager
{
    protected static string $relationship = 'addresses';

    protected static bool $isLazy = true;

    public function presetForm(): void
    {
        $this->addFormFields([
            'country_id' => Select::make('country_id')
                ->label(__('shop::auth.address.admin.form.country'))
                ->relationship('country', 'name')
                ->options(Country::published()->sorted()->pluck('name', 'id'))
                ->required()
                ->live(),

            'region_id' => Select::make('region_id')
                ->label(__('shop::auth.address.admin.form.region'))
                ->relationship('region', 'name')
                ->options(fn (Get $get) => Region::forCountryId($get('country_id'))->pluck('name', 'id'))
                ->preload()
                ->searchable()
                ->nullable(),

            'zip' => TextInput::make('zip')
                ->label(__('shop::auth.address.admin.form.zip'))
                ->required(),

            'city' => TextInput::make('city')
                ->label(__('shop::auth.address.admin.form.city'))
                ->required(),

            'address' => TextInput::make('address')
                ->label(__('shop::auth.address.admin.form.address'))
                ->columnSpanFull()
                ->required(),

            'created_at' => Placeholder::make('created_at')
                ->columnStart(1)
                ->label(__('shop::auth.address.admin.form.created_at'))
                ->content(fn (?Address $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            'updated_at' => Placeholder::make('updated_at')
                ->label(__('shop::auth.address.admin.form.updated_at'))
                ->content(fn (?Address $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
        ]);
    }

    public function presetList(): void
    {
        $this->addListColumns([
            'country.name' => TextColumn::make('country.name')
                ->label(__('shop::auth.address.admin.list.country_region'))
                ->searchable()
                ->sortable()
                ->description(fn (Address $record): string => $record->region?->name ?? '-'),

            'zip' => TextColumn::make('zip')
                ->label(__('shop::auth.address.admin.list.zip_city'))
                ->description(fn (Address $record): string => $record->city),

            'address' => TextColumn::make('address')
                ->label(__('shop::auth.address.admin.list.address'))
                ->verticallyAlignStart(),
        ]);

        $this->setListModifyQueryUsing(fn (Builder $query) => $query->with('country', 'region')->withoutGlobalScopes([
            SoftDeletingScope::class,
        ]));

        $this->addListFilters([
            'trashed' => TrashedFilter::make(),
        ]);

        $this->addListHeaderActions([
            'create' => CreateAction::make(),
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
}
