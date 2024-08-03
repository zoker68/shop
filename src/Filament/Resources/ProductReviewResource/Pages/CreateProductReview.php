<?php

namespace Zoker\Shop\Filament\Resources\ProductReviewResource\Pages;

use Filament\Resources\Pages\CreateRecord;
use Zoker\Shop\Filament\Resources\ProductReviewResource;

class CreateProductReview extends CreateRecord
{
    protected static string $resource = ProductReviewResource::class;

    protected function getHeaderActions(): array
    {
        return [

        ];
    }
}
