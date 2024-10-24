<?php

namespace Zoker\Shop\Filament\Resources\ProductResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Zoker\Shop\Models\ProductQuestion;
use Zoker\Shop\Traits\Resources\ExtendableRelationManager;

class QuestionsRelationManager extends RelationManager
{
    use ExtendableRelationManager;

    protected static string $relationship = 'questions';

    public function presetForm(): void
    {
        $this->addFormFields(ProductQuestion::getAdminFormSchema());
    }

    public function presetList(): void
    {
        $this->setListRecordTitleAttribute('question');

        $this->addListColumns([
            'question' => Tables\Columns\TextColumn::make('question')
                ->label(__('shop::admin.product.question.list.question'))
                ->wrap()
                ->limit(300)
                ->words(40),
        ]);

        $this->addListHeaderActions([
            'create' => Tables\Actions\CreateAction::make(),
        ]);

        $this->addListActions([
            'edit' => Tables\Actions\EditAction::make(),
            'delete' => Tables\Actions\DeleteAction::make(),
        ]);

        $this->addListBulkActions([
            'delete' => Tables\Actions\DeleteBulkAction::make(),
        ]);
    }
}
