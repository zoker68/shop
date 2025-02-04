<?php

namespace Zoker\Shop\Filament\Resources\ShippingMethodResource\RelationManagers;

use Filament\Tables;
use Zoker\Shop\Classes\Bases\BaseRelationManager;

class PaymentMethodsRelationManager extends BaseRelationManager
{
    protected static string $relationship = 'paymentMethods';

    public function presetList(): void
    {
        $this->setListRecordTitleAttribute('name');

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
    }
}
