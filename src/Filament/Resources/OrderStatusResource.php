<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
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
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Enums\OrderStatusType;
use Zoker\Shop\Filament\Resources\OrderStatusResource\Pages;
use Zoker\Shop\Models\OrderStatus;

class OrderStatusResource extends Resource
{
    protected static ?string $model = OrderStatus::class;

    protected static ?string $slug = 'order-statuses';

    protected static ?string $navigationIcon = 'heroicon-o-check-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('shop::order.status_type.admin.form.name'))
                    ->required(),

                Select::make('type')
                    ->label(__('shop::order.status_type.admin.form.type'))
                    ->options(OrderStatusType::getAllOptions())
                    ->required(),

                Select::make('color')
                    ->label(__('shop::order.status_type.admin.form.color'))
                    ->options([
                        'primary' => 'Primary',
                        'success' => 'Success',
                        'warning' => 'Warning',
                        'danger' => 'Danger',
                        'info' => 'Info',
                        'gray' => 'Gray',
                    ]),

                ColorPicker::make('hex_color')
                    ->label(__('shop::order.status_type.admin.form.hex_color')),

                Toggle::make('is_default')
                    ->label(__('shop::order.status_type.admin.form.is_default'))
                    ->onColor('success')
                    ->offColor('gray'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('type')
            ->reorderable('order')
            ->columns([
                TextColumn::make('name')
                    ->label(__('shop::order.status_type.admin.list.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('type')
                    ->label(__('shop::order.status_type.admin.list.type'))
                    ->getStateUsing(fn ($record) => $record->type->getLabel())
                    ->badge()
                    ->color(fn ($record) => $record->type->getColor()),

                ToggleColumn::make('is_default')
                    ->label(__('shop::order.status_type.admin.list.is_default'))
                    ->onColor('success')
                    ->offColor('gray'),
            ])
            ->filters([
                TrashedFilter::make(),
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
                RestoreAction::make(),
                ForceDeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                    RestoreBulkAction::make(),
                    ForceDeleteBulkAction::make(),
                ]),
            ]);
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
