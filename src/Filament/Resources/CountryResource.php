<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Filament\Resources\CountryResource\Pages;
use Zoker\Shop\Filament\Resources\CountryResource\RelationManagers\RegionsRelationManager;
use Zoker\Shop\Models\Country;

class CountryResource extends Resource
{
    protected static ?string $model = Country::class;

    protected static ?string $slug = 'countries';

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Locations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('zoker.shop::country.admin.form.name'))
                    ->required(),

                TextInput::make('code')
                    ->columnStart(1)
                    ->label(__('zoker.shop::country.admin.form.code'))
                    ->required(),

                TextInput::make('phone_code')
                    ->label(__('zoker.shop::country.admin.form.phone'))
                    ->required(),

                Toggle::make('published')
                    ->label(__('zoker.shop::country.admin.form.published')),

                Toggle::make('pined')
                    ->label(__('zoker.shop::country.admin.form.pined')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('published', 'desc')
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->label(__('zoker.shop::country.admin.list.name')),

                TextColumn::make('code')
                    ->sortable()
                    ->label(__('zoker.shop::country.admin.list.code')),

                TextColumn::make('phone_code')
                    ->label(__('zoker.shop::country.admin.list.phone')),

                ToggleColumn::make('published')
                    ->sortable()
                    ->label(__('zoker.shop::country.admin.list.published')),

                ToggleColumn::make('pined')
                    ->sortable()
                    ->label(__('zoker.shop::country.admin.list.pined')),
            ])
            ->filters([
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCountries::route('/'),
            'create' => Pages\CreateCountry::route('/create'),
            'edit' => Pages\EditCountry::route('/{record}/edit'),
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
        return ['name', 'code'];
    }

    public static function getRelations(): array
    {
        return [
            RegionsRelationManager::class,
        ];
    }
}
