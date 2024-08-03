<?php

namespace Zoker68\Shop\Filament\Resources\SkladCategoryResource\Pages;

use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Zoker68\Shop\Filament\Resources\SkladCategoryResource;
use Zoker68\Shop\Models\SkladCategory;

class ListSkladCategories extends ListRecords
{
    protected static string $resource = SkladCategoryResource::class;

    public function getTabs(): array
    {
        return [
            'all' => Tab::make('Все'),
            'no_category' => Tab::make('Без категории')
                ->modifyQueryUsing(fn ($query) => $query->whereNull('category_id'))
                ->badge(SkladCategory::noCategory()->count()),

        ];
    }

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
