<?php

namespace Zoker\Shop\View\Components\Blocks;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Zoker\FilamentStaticPages\Classes\BlockComponent;

class ContactBlock extends BlockComponent
{
    public static string $label = 'Contact Block';

    public static string $viewTemplate = 'shop::components.blocks.contact';

    public static string $viewNamespace = '';

    public static function getSchema(): array
    {
        return [
            TextInput::make('data.address')
                ->label('Address'),
            TextInput::make('data.phone')
                ->label('Phone'),
            TextInput::make('data.email')
                ->label('Email'),
            KeyValue::make('data.operation_hours')
                ->label('Work time')
                ->addActionLabel('Add day')
                ->keyLabel('Day')
                ->valueLabel('Working hours'),
        ];
    }
}
