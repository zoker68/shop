<?php

namespace Zoker\Shop\View\Components\Blocks;

use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\TextInput;
use Zoker\FilamentStaticPages\Classes\BlockComponent;

class ContactBlock extends BlockComponent
{
    public static string $label = 'Contact Block';

    public static string $viewTemplate = 'components.blocks.contact';

    public static string $viewNamespace = 'shop';

    public static string $icon = 'heroicon-s-at-symbol';

    public static function getSchema(): array
    {
        return [
            TextInput::make('address')
                ->label('Address'),
            TextInput::make('phone')
                ->label('Phone'),
            TextInput::make('email')
                ->label('Email'),
            KeyValue::make('operation_hours')
                ->label('Work time')
                ->addActionLabel('Add day')
                ->keyLabel('Day')
                ->valueLabel('Working hours'),
        ];
    }
}
