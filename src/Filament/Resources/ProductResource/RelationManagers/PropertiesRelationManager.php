<?php

namespace Zoker\Shop\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Str;
use Zoker\Shop\Models\Property;

class PropertiesRelationManager extends RelationManager
{
    protected static string $relationship = 'properties';

    public function form(Form $form): Form
    {
        return $form
            ->schema(function (Property $record) {

                return [
                    Forms\Components\TextInput::make('name')
                        ->disabled()
                        ->maxLength(255),
                    Grid::make(1)
                        ->schema(fn (Get $get): array => $record->formSetValue()),
                ];
            });
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('value'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->label(__('shop::properties.admin.add_property'))
                    ->recordTitle(fn ($record) => $record->name)
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['index_value'] = Str::slug($data['value']);

                        return $data;
                    })
                    ->form(fn (Tables\Actions\AttachAction $action): array => [
                        Select::make('recordId')
                            ->label(__('shop::properties.admin.property'))
                            ->required()
                            ->options(fn () => Property::listNonDuplicatedForProductId(Relation::noConstraints(fn () => $action->getTable()->getRelationship())->getParent()->getKey())->pluck('name', 'id'))
                            ->preload()
                            ->reactive()
                            ->searchable()
                            ->afterStateUpdated(fn (Select $component) => $component
                                ->getContainer()
                                ->getComponent('dynamicTypeFields')
                                ->getChildComponentContainer()
                                ->fill()),
                        Grid::make(1)
                            ->schema(function (Get $get): array {
                                if (! $get('recordId')) {
                                    return [];
                                }

                                return Property::find($get('recordId'))->formSetValue();
                            })
                            ->key('dynamicTypeFields'),
                    ]),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DetachAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DetachBulkAction::make(),
                ]),
            ]);
    }
}
