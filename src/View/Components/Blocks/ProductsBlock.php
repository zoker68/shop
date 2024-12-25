<?php

namespace Zoker\Shop\View\Components\Blocks;

use Filament\Forms\Components\TextInput;
use Zoker\FilamentStaticPages\Classes\BlockComponent;

class ProductsBlock extends BlockComponent
{
    public static string $label = 'Products Block';

    public static string $viewTemplate = 'components.blocks.products';

    public static string $viewNamespace = 'shop';

    public static string $icon = 'heroicon-s-cube';

    public static function getSchema(): array
    {
        return [
            TextInput::make('address')
                ->label('Address'),
        ];
    }
}
