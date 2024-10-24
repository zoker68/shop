<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Resources\Resource;
use Filament\Support\Enums\VerticalAlignment;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Zoker\Shop\Filament\Resources\ProductQuestionResource\Pages;
use Zoker\Shop\Models\ProductQuestion;
use Zoker\Shop\Traits\Resources\ExtendableResource;

class ProductQuestionResource extends Resource
{
    use ExtendableResource;

    protected static ?string $model = ProductQuestion::class;

    protected static ?string $slug = 'product-question';

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'Products';

    public function presetForm(): void
    {
        $this->addFormFields(ProductQuestion::getAdminFormSchema());
    }

    public function presetList(): void
    {
        $this->addListColumns([
            'product.name' => TextColumn::make('product.name')
                ->label(__('shop::product.questions.admin.list.product'))
                ->searchable()
                ->sortable()
                ->verticalAlignment(VerticalAlignment::Start),

            'user.name' => TextColumn::make('user.name')
                ->label(__('shop::product.questions.admin.list.user'))
                ->searchable()
                ->sortable()
                ->verticalAlignment(VerticalAlignment::Start),

            'question' => TextColumn::make('question')
                ->label(__('shop::product.questions.admin.list.question'))
                ->limit()
                ->wrap()
                ->words(15)
                ->verticalAlignment(VerticalAlignment::Start),

            'answer' => TextColumn::make('answer')
                ->label(__('shop::product.questions.admin.list.answer'))
                ->limit()
                ->wrap()
                ->html()
                ->words(15)
                ->verticalAlignment(VerticalAlignment::Start),
        ]);

        $this->setListDefaultSort('created_at', 'desc');

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ], self::ACTION_MAIN_GROUP);

        $this->addListBulkActions([
            DeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductQuestion::route('/'),
            'create' => Pages\CreateProductQuestion::route('/create'),
            'edit' => Pages\EditProductQuestion::route('/{record}/edit'),
        ];
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
