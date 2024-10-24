<?php

namespace Zoker\Shop\Filament\Resources\ProductResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Zoker\Shop\Enums\ProductStatus;
use Zoker\Shop\Filament\Resources\ProductResource;
use Zoker\Shop\Models\Product;

class ListProducts extends ListRecords
{
    protected static string $resource = ProductResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(__('shop::product.admin.list.tab.all')),
            ProductStatus::APPROVED->value => Tab::make(__('shop::product.admin.list.tab.approved'))
                ->modifyQueryUsing(fn ($query) => $query->where('status', ProductStatus::APPROVED)),
            ProductStatus::REJECTED->value => Tab::make(__('shop::product.admin.list.tab.rejected'))
                ->modifyQueryUsing(fn ($query) => $query->where('status', ProductStatus::REJECTED)),
            ProductStatus::MODERATION->value => Tab::make(__('shop::product.admin.list.tab.moderation'))
                ->modifyQueryUsing(fn ($query) => $query->where('status', ProductStatus::MODERATION))
                ->badge(Product::where('status', ProductStatus::MODERATION)->count()),
        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
