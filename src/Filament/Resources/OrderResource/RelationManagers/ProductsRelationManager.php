<?php

namespace Zoker\Shop\Filament\Resources\OrderResource\RelationManagers;

use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Columns\TextColumn;
use Zoker\Shop\Classes\Bases\BaseRelationManager;

class ProductsRelationManager extends BaseRelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $label = 'Products';

    public function presetList(): void
    {
        $this->setListRecordTitleAttribute('product_data.name');

        $this->setListPaginated(false);

        $this->addListColumns([
            'product_data.name' => TextColumn::make('product_data.name')
                ->label(__('shop::order.products.admin.product_data.name')),
            'quantity' => TextColumn::make('quantity')
                ->label(__('shop::order.products.admin.quantity')),
            'price' => TextColumn::make('price')
                ->label(__('shop::order.products.admin.price'))
                ->money(currency()->getCurrency(), currency()->getSubunit()),
            'total' => TextColumn::make('total')
                ->label(__('shop::order.products.admin.total'))
                ->money(currency()->getCurrency(), currency()->getSubunit())
                ->summarize([
                    Summarizer::make('total_products')
                        ->label(__('shop::order.products.admin.summary.total_products'))
                        ->using(fn (): string => $this->getOwnerRecord()->total_products)->money(currency()->getCurrency(), currency()->getSubunit()),
                    Summarizer::make('total_shipping')
                        ->label(__('shop::order.products.admin.summary.total_shipping'))
                        ->using(fn (): string => $this->getOwnerRecord()->total_shipping)->money(currency()->getCurrency(), currency()->getSubunit()),
                    Summarizer::make('total_payment_fee')
                        ->label(__('shop::order.products.admin.summary.total_payment_fee'))
                        ->using(fn (): string => $this->getOwnerRecord()->total_payment_fee)->money(currency()->getCurrency(), currency()->getSubunit()),
                    Summarizer::make('total_pre_payment')
                        ->label(__('shop::order.products.admin.summary.total_pre_payment'))
                        ->using(fn (): string => $this->getOwnerRecord()->total_pre_payment)->money(currency()->getCurrency(), currency()->getSubunit()),
                ]),
        ]);
    }
}
