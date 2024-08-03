<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Zoker\Shop\Filament\Resources\RegionResource\Pages;
use Zoker\Shop\Models\Region;

class RegionResource extends Resource
{
    protected static ?string $model = Region::class;

    protected static ?string $slug = 'regions';

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = 'Locations';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(Region::getAdminFormSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('country.name')
                    ->label(__('shop::region.admin.list.country'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label(__('shop::region.admin.list.name'))
                    ->sortable()
                    ->searchable(),

                TextColumn::make('code')
                    ->label(__('shop::region.admin.list.code')),

                ToggleColumn::make('published')
                    ->label(__('shop::region.admin.list.published')),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegions::route('/'),
            'create' => Pages\CreateRegion::route('/create'),
            'edit' => Pages\EditRegion::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'code'];
    }
}
