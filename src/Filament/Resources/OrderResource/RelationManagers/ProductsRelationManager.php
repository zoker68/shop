<?php

namespace Zoker\Shop\Filament\Resources\OrderResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\Summarizers\Summarizer;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    protected static ?string $label = 'Products';

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('product_data.name')
            ->paginated(false)
            ->columns([
                TextColumn::make('product_data.name')
                    ->label(__('shop::order.products.admin.product_data.name')),
                TextColumn::make('quantity')
                    ->label(__('shop::order.products.admin.quantity')),
                TextColumn::make('price')
                    ->label(__('shop::order.products.admin.price'))
                    ->money(currency()->getCurrency(), currency()->getSubunit()),
                TextColumn::make('total')
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
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }
}
