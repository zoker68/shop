<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Support\Enums\VerticalAlignment;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Zoker\Shop\Filament\Resources\ProductQuestionResource\Pages;
use Zoker\Shop\Models\ProductQuestion;

class ProductQuestionResource extends Resource
{
    protected static ?string $model = ProductQuestion::class;

    protected static ?string $slug = 'product-question';

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationGroup = 'Products';

    public static function form(Form $form): Form
    {
        return $form
            ->schema(ProductQuestion::getAdminFormSchema());
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('product.name')
                    ->label(__('zoker.shop::product.questions.admin.list.product'))
                    ->searchable()
                    ->sortable()
                    ->verticalAlignment(VerticalAlignment::Start),

                TextColumn::make('user.name')
                    ->label(__('zoker.shop::product.questions.admin.list.user'))
                    ->searchable()
                    ->sortable()
                    ->verticalAlignment(VerticalAlignment::Start),

                TextColumn::make('question')
                    ->label(__('zoker.shop::product.questions.admin.list.question'))
                    ->limit()
                    ->wrap()
                    ->words(15)
                    ->verticalAlignment(VerticalAlignment::Start),

                TextColumn::make('answer')
                    ->label(__('zoker.shop::product.questions.admin.list.answer'))
                    ->limit()
                    ->wrap()
                    ->html()
                    ->words(15)
                    ->verticalAlignment(VerticalAlignment::Start),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
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
