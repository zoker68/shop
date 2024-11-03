<?php

namespace Zoker\Shop\Filament\Resources\ProductResource\RelationManagers;

use Filament\Tables;
use Zoker\Shop\Classes\Bases\BaseRelationManager;
use Zoker\Shop\Models\ProductReview;

class ReviewsRelationManager extends BaseRelationManager
{
    protected static string $relationship = 'reviews';

    public function presetForm(): void
    {
        $this->addFormFields(ProductReview::getAdminFormSchema());
    }

    public function presetList(): void
    {
        $this->setListRecordTitleAttribute('created_at');

        $this->addListColumns([
            'rating' => Tables\Columns\TextColumn::make('rating')
                ->label(__('shop::product.reviews.admin.list.rating')),

            'review' => Tables\Columns\TextColumn::make('review')
                ->label(__('shop::product.reviews.admin.list.review'))
                ->wrap()
                ->limit(200)
                ->words(30),

            'created_at' => Tables\Columns\TextColumn::make('created_at')
                ->label(__('shop::product.reviews.admin.list.created_at')),
        ]);

        $this->addListHeaderActions([
            'create' => Tables\Actions\CreateAction::make(),
        ]);

        $this->addListActions([
            'edit' => Tables\Actions\EditAction::make(),
            'delete' => Tables\Actions\DeleteAction::make(),
        ]);

        $this->addListBulkActions([
            'delete' => Tables\Actions\DeleteBulkAction::make(),
        ]);
    }
}
