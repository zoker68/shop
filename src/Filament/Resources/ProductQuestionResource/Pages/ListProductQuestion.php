<?php

namespace Zoker\Shop\Filament\Resources\ProductQuestionResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Zoker\Shop\Filament\Resources\ProductQuestionResource;
use Zoker\Shop\Models\ProductQuestion;

class ListProductQuestion extends ListRecords
{
    protected static string $resource = ProductQuestionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'all' => Tab::make(__('shop::product.questions.admin.list.tab.all')),
            'published' => Tab::make(__('shop::product.questions.admin.list.tab.published'))
                ->modifyQueryUsing(fn ($query) => $query->published()),
            'moderation' => Tab::make(__('shop::product.questions.admin.list.tab.moderation'))
                ->modifyQueryUsing(fn ($query) => $query->unpublished())
                ->badge(ProductQuestion::unpublished()->count()),
        ];
    }
}
