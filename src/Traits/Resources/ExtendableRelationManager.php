<?php

namespace Zoker\Shop\Traits\Resources;

use Filament\Forms\Form;
use Filament\Tables\Table;

trait ExtendableRelationManager
{
    use FormExtendable, TableExtendable;

    public function form(Form $form): Form
    {
        return $this->generateForm($form);
    }

    public function table(Table $table): Table
    {
        return $this->generateTable($table);
    }
}
