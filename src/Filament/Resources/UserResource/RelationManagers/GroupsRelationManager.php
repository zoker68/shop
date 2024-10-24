<?php

namespace Zoker\Shop\Filament\Resources\UserResource\RelationManagers;

use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Zoker\Shop\Traits\Resources\ExtendableRelationManager;

class GroupsRelationManager extends RelationManager
{
    use ExtendableRelationManager;

    protected static string $relationship = 'groups';

    public function presetList(): void
    {
        $this->addListColumns([
            'name' => Tables\Columns\TextColumn::make('name'),
        ]);

        $this->addListHeaderActions([
            'attach' => Tables\Actions\AttachAction::make()
                ->preloadRecordSelect(),
        ]);

        $this->addListActions([
            'detach' => Tables\Actions\DetachAction::make(),
        ]);

        $this->addListBulkActions([
            'detach' => Tables\Actions\DetachBulkAction::make(),
        ]);
    }
}
