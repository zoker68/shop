<?php

namespace Zoker68\Shop\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker68\Shop\Filament\Resources\ProductReviewResource\Pages;
use Zoker68\Shop\Models\ProductReview;

class ProductReviewResource extends Resource
{
    protected static ?string $model = ProductReview::class;

    protected static ?string $slug = 'product-reviews';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema(ProductReview::getAdminFormSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                    ->label(__('zoker68.shop::product.reviews.admin.list.product'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('user.name')
                    ->label(__('zoker68.shop::product.reviews.admin.list.user'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('rating')
                    ->label(__('zoker68.shop::product.reviews.admin.list.rating')),

                TextColumn::make('review')
                    ->label(__('zoker68.shop::product.reviews.admin.list.review'))
                    ->wrap()
                    ->limit()
                    ->words(30),

                ToggleColumn::make('published')
                    ->label(__('zoker68.shop::product.reviews.admin.list.published')),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductReviews::route('/'),
            'create' => Pages\CreateProductReview::route('/create'),
            'edit' => Pages\EditProductReview::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['product', 'user']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['product.name', 'user.name'];
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->product) {
            $details['Product'] = $record->product->name;
        }

        if ($record->user) {
            $details['User'] = $record->user->name;
        }

        return $details;
    }
}
