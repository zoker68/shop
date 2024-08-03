<?php

namespace Zoker\Shop\Filament\Resources\ProductReviewResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Zoker\Shop\Filament\Resources\ProductReviewResource;
use Zoker\Shop\Models\ProductReview;

class ListProductReviews extends ListRecords
{
    protected static string $resource = ProductReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(__('shop::product.reviews.admin.list.tab.all')),
            'published' => Tab::make(__('shop::product.reviews.admin.list.tab.published'))
                ->modifyQueryUsing(fn ($query) => $query->published()),
            'moderation' => Tab::make(__('shop::product.reviews.admin.list.tab.moderation'))
                ->modifyQueryUsing(fn ($query) => $query->unpublished())
                ->badge(ProductReview::unpublished()->count()),
        ];
    }
}
