<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TrashedFilter;
use Filament\Tables\Grouping\Group;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Enums\OrderStatusType;
use Zoker\Shop\Filament\Resources\OrderStatusResource\Pages;
use Zoker\Shop\Models\OrderStatus;
use Zoker\Shop\Traits\Resources\ExtendableResource;

class OrderStatusResource extends Resource
{
    use ExtendableResource;

    protected static ?string $model = OrderStatus::class;

    protected static ?string $slug = 'order-statuses';

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    public function presetForm(): void
    {
        $this->addFormFields([
            'name' => TextInput::make('name')
                ->label(__('shop::order.status_type.admin.form.name'))
                ->required(),

            'type' => Select::make('type')
                ->label(__('shop::order.status_type.admin.form.type'))
                ->options(OrderStatusType::getAllOptions())
                ->required(),

            'color' => Select::make('color')
                ->label(__('shop::order.status_type.admin.form.color'))
                ->options([
                    'primary' => 'Primary',
                    'success' => 'Success',
                    'warning' => 'Warning',
                    'danger' => 'Danger',
                    'info' => 'Info',
                    'gray' => 'Gray',
                ]),

            'hex_color' => ColorPicker::make('hex_color')
                ->label(__('shop::order.status_type.admin.form.hex_color')),

            'is_default' => Toggle::make('is_default')
                ->label(__('shop::order.status_type.admin.form.is_default'))
                ->onColor('success')
                ->offColor('gray'),
        ]);
    }

    public function presetList(): void
    {
        $this->setListDefaultSort('type');

        $this->setListReorderable('order');

        $this->addListColumns([
            'name' => TextColumn::make('name')
                ->label(__('shop::order.status_type.admin.list.name'))
                ->searchable()
                ->sortable(),

            'type' => TextColumn::make('type')
                ->label(__('shop::order.status_type.admin.list.type'))
                ->getStateUsing(fn ($record) => $record->type->getLabel())
                ->badge()
                ->color(fn ($record) => $record->type->getColor()),

            'is_default' => ToggleColumn::make('is_default')
                ->label(__('shop::order.status_type.admin.list.is_default'))
                ->onColor(fn ($record) => $record->type->getColor())
                ->offColor('gray'),
        ]);

        $this->addListFilters([
            'trashed' => TrashedFilter::make(),
        ]);

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
            'restore' => RestoreAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ]);

        $this->addListBulkActions([
            'delete' => DeleteBulkAction::make(),
            'restore' => RestoreBulkAction::make(),
            'forceDelete' => ForceDeleteBulkAction::make(),
        ], self::ACTION_MAIN_GROUP);

        $this->setListDefaultGroup(
            Group::make('type')
                ->getTitleFromRecordUsing(fn (OrderStatus $record): string => $record->type->getLabel())
        );
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrderStatuses::route('/'),
            'create' => Pages\CreateOrderStatus::route('/create'),
            'edit' => Pages\EditOrderStatus::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
