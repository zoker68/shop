<?php

namespace Zoker68\Shop\Filament\Resources\CountryResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Zoker68\Shop\Models\Region;

class RegionsRelationManager extends RelationManager
{
    protected static string $relationship = 'regions';

    public function form(Form $form): Form
    {
        return $form
            ->schema(Region::getAdminFormSchema());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label(__('zoker68.shop::region.admin.list.name')),
                Tables\Columns\ToggleColumn::make('published')
                    ->label(__('zoker68.shop::region.admin.list.published')),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
