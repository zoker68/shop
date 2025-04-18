<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Filament\Resources\CountryResource\Pages;
use Zoker\Shop\Filament\Resources\CountryResource\RelationManagers\RegionsRelationManager;
use Zoker\Shop\Models\Country;

class CountryResource extends BaseResource
{
    protected static ?string $model = Country::class;

    protected static ?string $slug = 'countries';

    protected static ?string $navigationIcon = 'heroicon-o-map';

    protected static ?string $navigationGroup = 'Locations';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('shop::country.admin.system.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('shop::country.admin.system.plural_title');
    }

    public function presetForm(): void
    {
        $this->addFormFields([
            'name' => TextInput::make('name')
                ->label(__('shop::country.admin.form.name'))
                ->required(),

            'code' => TextInput::make('code')
                ->columnStart(1)
                ->label(__('shop::country.admin.form.code'))
                ->required(),

            'phone_code' => TextInput::make('phone_code')
                ->label(__('shop::country.admin.form.phone'))
                ->required(),

            'published' => Toggle::make('published')
                ->label(__('shop::country.admin.form.published')),

            'pined' => Toggle::make('pined')
                ->label(__('shop::country.admin.form.pined')),
        ]);
    }

    public function presetList(): void
    {
        $this->setListDefaultSort('published', 'desc');

        $this->addListColumns([
            'name' => TextColumn::make('name')
                ->sortable()
                ->label(__('shop::country.admin.list.name')),

            'code' => TextColumn::make('code')
                ->sortable()
                ->label(__('shop::country.admin.list.code')),

            'phone_code' => TextColumn::make('phone_code')
                ->label(__('shop::country.admin.list.phone')),

            'published' => ToggleColumn::make('published')
                ->sortable()
                ->label(__('shop::country.admin.list.published')),

            'pined' => ToggleColumn::make('pined')
                ->sortable()
                ->label(__('shop::country.admin.list.pined')),
        ]);

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ]);

        $this->addListBulkActions([
            'delete' => DeleteBulkAction::make(),
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

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return $record->name;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        $details['Code'] = $record->code;
        $details['Phone'] = $record->phone_code;

        return $details;
    }

    public static function getRelations(): array
    {
        return [
            RegionsRelationManager::class,
        ];
    }
}
