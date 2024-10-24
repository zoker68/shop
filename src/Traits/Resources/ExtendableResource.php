<?php

namespace Zoker\Shop\Traits\Resources;

use Filament\Forms\Form;
use Filament\Infolists\Infolist;
use Filament\Tables\Table;

trait ExtendableResource
{
    use FormExtendable, InfolistExtendable, TableExtendable;

    private static $instance = null;

    protected static function getInstance(): self
    {
        if (! self::$instance) {
            self::$instance = new static;
        }

        return self::$instance;
    }

    public static function form(Form $form): Form
    {
        $instance = self::getInstance();

        return $instance->generateForm($form);
    }

    public static function table(Table $table): Table
    {
        $instance = self::getInstance();

        return $instance->generateTable($table);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema(self::$allInfoListEntries);
    }
}
