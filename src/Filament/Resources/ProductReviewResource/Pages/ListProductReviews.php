<?php

namespace Zoker68\Shop\Filament\Resources\ProductReviewResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Zoker68\Shop\Filament\Resources\ProductReviewResource;
use Zoker68\Shop\Models\ProductReview;

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
            'all' => Tab::make(__('zoker68.shop::product.reviews.admin.list.tab.all')),
            'published' => Tab::make(__('zoker68.shop::product.reviews.admin.list.tab.published'))
                ->modifyQueryUsing(fn ($query) => $query->published()),
            'moderation' => Tab::make(__('zoker68.shop::product.reviews.admin.list.tab.moderation'))
                ->modifyQueryUsing(fn ($query) => $query->unpublished())
                ->badge(ProductReview::unpublished()->count()),
        ];
    }
}