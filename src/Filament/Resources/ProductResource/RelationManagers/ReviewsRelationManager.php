<?php

namespace Zoker\Shop\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Zoker\Shop\Models\ProductReview;

class ReviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'reviews';

    public function form(Form $form): Form
    {
        return $form
            ->schema(ProductReview::getAdminFormSchema());
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('created_at')
            ->columns([
                TextColumn::make('rating')
                    ->label(__('shop::product.reviews.admin.list.rating')),

                TextColumn::make('review')
                    ->label(__('shop::product.reviews.admin.list.review'))
                    ->wrap()
                    ->limit(200)
                    ->words(30),
                TextColumn::make('created_at')
                    ->label(__('shop::product.reviews.admin.list.created_at')),
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
