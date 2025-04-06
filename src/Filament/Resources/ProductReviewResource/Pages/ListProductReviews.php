<?php

namespace Zoker\Shop\Filament\Resources\ProductReviewResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\ProductReviewResource;
use Zoker\Shop\Models\ProductReview;

class ListProductReviews extends BaseListRecords
{
    protected static string $resource = ProductReviewResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }

    public function presetTabs(): void
    {
        $this->addTabs([
            'all' => Tab::make(__('shop::product.reviews.admin.list.tab.all')),
            'published' => Tab::make(__('shop::product.reviews.admin.list.tab.published'))
                ->modifyQueryUsing(fn ($query) => $query->published()),
            'moderation' => Tab::make(__('shop::product.reviews.admin.list.tab.moderation'))
                ->modifyQueryUsing(fn ($query) => $query->unpublished())
                ->badge(ProductReview::unpublished()->count()),
        ]);
    }
}
