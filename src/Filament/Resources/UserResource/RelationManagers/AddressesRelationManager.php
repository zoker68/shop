<?php

namespace Zoker\Shop\Filament\Resources\UserResource\RelationManagers;

use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables\Actions\BulkActionGroup;
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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Models\Address;
use Zoker\Shop\Models\Country;
use Zoker\Shop\Models\Region;

//TODO: Extend relation managers
class AddressesRelationManager extends RelationManager
{
    protected static string $relationship = 'addresses';

    protected static bool $isLazy = true;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('country_id')
                    ->label(__('shop::auth.address.admin.form.country'))
                    ->relationship('country', 'name')
                    ->options(Country::published()->sorted()->pluck('name', 'id'))
                    ->required()
                    ->live(),

                Select::make('region_id')
                    ->label(__('shop::auth.address.admin.form.region'))
                    ->relationship('region', 'name')
                    ->options(fn (Get $get) => Region::forCountryId($get('country_id'))->pluck('name', 'id'))
                    ->preload()
                    ->searchable()
                    ->nullable(),

                TextInput::make('zip')
                    ->label(__('shop::auth.address.admin.form.zip'))
                    ->required(),

                TextInput::make('city')
                    ->label(__('shop::auth.address.admin.form.city'))
                    ->required(),

                TextInput::make('address')
                    ->label(__('shop::auth.address.admin.form.address'))
                    ->columnSpanFull()
                    ->required(),

                Placeholder::make('created_at')
                    ->columnStart(1)
                    ->label(__('shop::auth.address.admin.form.created_at'))
                    ->content(fn (?Address $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label(__('shop::auth.address.admin.form.updated_at'))
                    ->content(fn (?Address $record): string => $record?->updated_at?->diffForHumans() ?? '-'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->modifyQueryUsing(fn (Builder $query) => $query->with('country', 'region'))
            ->columns([
                TextColumn::make('country.name')
                    ->label(__('shop::auth.address.admin.list.country_region'))
                    ->searchable()
                    ->sortable()
                    ->description(fn (Address $record): string => $record->region?->name ?? '-'),

                TextColumn::make('zip')
                    ->label(__('shop::auth.address.admin.list.zip_city'))
                    ->description(fn (Address $record): string => $record->city),

                TextColumn::make('address')
                    ->label(__('shop::auth.address.admin.list.address'))
                    ->verticallyAlignStart(),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->headerActions([
                CreateAction::make(),
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
            ])
            ->modifyQueryUsing(fn (Builder $query) => $query->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]));
    }
}
