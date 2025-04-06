<?php

namespace Zoker\Shop\Filament\Resources\ProductQuestionResource\Pages;

use Filament\Actions\CreateAction;
use Filament\Resources\Components\Tab;
use Zoker\Shop\Classes\Bases\BaseListRecords;
use Zoker\Shop\Filament\Resources\ProductQuestionResource;
use Zoker\Shop\Models\ProductQuestion;

class ListProductQuestion extends BaseListRecords
{
    protected static string $resource = ProductQuestionResource::class;

    protected function presetHeaderActions(): void
    {
        $this->addHeaderActions([
            'create' => CreateAction::make(),
        ]);
    }

    public function presetTabs(): void
    {
        $this->addTabs([
            'all' => Tab::make(__('shop::product.questions.admin.list.tab.all')),
            'published' => Tab::make(__('shop::product.questions.admin.list.tab.published'))
                ->modifyQueryUsing(fn ($query) => $query->published()),
            'moderation' => Tab::make(__('shop::product.questions.admin.list.tab.moderation'))
                ->modifyQueryUsing(fn ($query) => $query->unpublished())
                ->badge(ProductQuestion::unpublished()->count()),
        ]);
    }
}
