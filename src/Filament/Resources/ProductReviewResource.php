<?php

namespace Zoker\Shop\Filament\Resources;

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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Filament\Resources\ProductReviewResource\Pages;
use Zoker\Shop\Models\ProductReview;

class ProductReviewResource extends BaseResource
{
    protected static ?string $model = ProductReview::class;

    protected static ?string $slug = 'product-reviews';

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-bottom-center-text';

    protected static ?string $navigationGroup = 'Products';

    public static function getModelLabel(): string
    {
        return __('shop::product.reviews.admin.system.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('shop::product.reviews.admin.system.plural_title');
    }

    public function presetForm(): void
    {
        $this->addFormFields(ProductReview::getAdminFormSchema());

        $this->setFormColumns(3);
    }

    public function presetList(): void
    {
        $this->addListColumns([
            'product.name' => TextColumn::make('product.name')
                ->label(__('shop::product.reviews.admin.list.product'))
                ->searchable()
                ->sortable(),

            'user.name' => TextColumn::make('user.name')
                ->label(__('shop::product.reviews.admin.list.user'))
                ->searchable()
                ->sortable(),

            'rating' => TextColumn::make('rating')
                ->label(__('shop::product.reviews.admin.list.rating')),

            'review' => TextColumn::make('review')
                ->label(__('shop::product.reviews.admin.list.review'))
                ->wrap()
                ->limit()
                ->words(30),

            'published' => ToggleColumn::make('published')
                ->label(__('shop::product.reviews.admin.list.published')),
        ]);

        $this->addListFilters([
            'trashed' => TrashedFilter::make(),
        ]);

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
            'restore' => RestoreAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ], self::ACTION_MAIN_GROUP);

        $this->addListBulkActions([
            'delete' => DeleteBulkAction::make(),
            'restore' => RestoreBulkAction::make(),
            'forceDelete' => ForceDeleteBulkAction::make(),
        ], self::ACTION_MAIN_GROUP);
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
