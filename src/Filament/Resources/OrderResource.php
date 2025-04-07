<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Enums\OrderStatusType;
use Zoker\Shop\Filament\Resources\OrderResource\Pages;
use Zoker\Shop\Filament\Resources\OrderResource\RelationManagers\ProductsRelationManager;
use Zoker\Shop\Models\Order;

class OrderResource extends BaseResource
{
    protected static ?string $model = Order::class;

    protected static ?string $slug = 'orders';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function getModelLabel(): string
    {
        return __('shop::order.admin.system.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('shop::order.admin.system.plural_title');
    }

    public function presetInfolist(): void
    {
        $this->setInfoListEntries([
            'general' => Section::make(__('shop::order.admin.view.general.title'))
                ->columns(5)
                ->schema([
                    TextEntry::make('general_order_status_id')
                        ->label(__('shop::order.admin.view.general.general_status_id'))
                        ->formatStateUsing(fn ($state, Model $record): string => $record->generalStatus->name)
                        ->badge()
                        ->color(fn ($state, Model $record): string => $record->generalStatus->color)
                        ->action(Action::make(__('shop::order.admin.actions.general_status.title'))
                            ->action(function (Order $record, array $data): void {
                                $record->general_order_status_id = $data['general_order_status_id'];
                                $record->save();
                            })
                            ->form([
                                Select::make('general_order_status_id')
                                    ->label(__('shop::order.admin.actions.general_status.new_status'))
                                    ->options(OrderStatusType::GENERAL->getStatuses()->pluck('name', 'id'))
                                    ->required(),
                            ])),

                    TextEntry::make('payment_order_status_id')
                        ->label(__('shop::order.admin.view.general.payment_status_id'))
                        ->formatStateUsing(fn ($state, Model $record): string => $record->paymentStatus->name)
                        ->badge()
                        ->color(fn ($state, Model $record): string => $record->paymentStatus->color)
                        ->action(Action::make(__('shop::order.admin.actions.payment_status.title'))
                            ->action(function (Order $record, array $data): void {
                                $record->payment_order_status_id = $data['payment_order_status_id'];
                                $record->save();
                            })
                            ->form([
                                Select::make('payment_order_status_id')
                                    ->label(__('shop::order.admin.actions.payment_status.new_status'))
                                    ->options(OrderStatusType::PAYMENT->getStatuses()->pluck('name', 'id'))
                                    ->required(),
                            ])),

                    TextEntry::make('shipping_order_status_id')
                        ->label(__('shop::order.admin.view.general.shipping_status_id'))
                        ->formatStateUsing(fn ($state, Model $record): string => $record->shippingStatus->name)
                        ->badge()
                        ->color(fn ($state, Model $record): string => $record->shippingStatus->color)
                        ->action(Action::make(__('shop::order.admin.actions.shipping_status.title'))
                            ->action(function (Order $record, array $data): void {
                                $record->shipping_order_status_id = $data['shipping_order_status_id'];
                                $record->save();
                            })
                            ->form([
                                Select::make('shipping_order_status_id')
                                    ->label(__('shop::order.admin.actions.shipping_status.new_status'))
                                    ->options(OrderStatusType::SHIPPING->getStatuses()->pluck('name', 'id'))
                                    ->required(),
                            ])),

                    TextEntry::make('ip_address')
                        ->columnStart(1)
                        ->label(__('shop::order.admin.view.general.ip')),
                    TextEntry::make('created_at')
                        ->label(__('shop::order.admin.view.general.created_at')),
                    TextEntry::make('updated_at')
                        ->label(__('shop::order.admin.view.general.updated_at')),
                    TextEntry::make('shipped_at')
                        ->label(__('shop::order.admin.view.general.shipped_at'))
                        ->formatStateUsing(fn ($state, Model $record): string => $record->shipped_at->format('d.m.Y'))
                        ->hintAction(Action::make('shipped_at_action')
                            ->icon('heroicon-o-calendar-days')
                            ->label(__('shop::order.admin.view.general.shipped_at_action.title'))
                            ->action(function (Order $record, array $data): void {
                                $record->shipped_at = $data['shipped_at'];
                                $record->save();
                            })
                            ->form([
                                DatePicker::make('shipped_at')
                                    ->label(__('shop::order.admin.view.general.shipped_at_action.new_date')),
                            ])),
                    TextEntry::make('paid_at')
                        ->label(__('shop::order.admin.view.general.paid_at'))
                        ->formatStateUsing(fn ($state, Model $record): string => $record->paid_at->format('d.m.Y'))
                        ->hintAction(Action::make('paid_at.action')
                            ->icon('heroicon-o-calendar-days')
                            ->label(__('shop::order.admin.view.general.paid_at_action.title'))
                            ->action(function (Order $record, array $data): void {
                                $record->paid_at = $data['paid_at'];
                                $record->save();
                            })
                            ->form([
                                DatePicker::make('paid_at')
                                    ->label(__('shop::order.admin.view.general.paid_at_action.new_date')),
                            ])),

                    TextEntry::make('payment_method_data.name')
                        ->label(__('shop::order.admin.view.general.payment_method'))
                        ->badge()
                        ->color(OrderStatusType::PAYMENT->getColor()),

                    TextEntry::make('shipping_method_data.name')
                        ->label(__('shop::order.admin.view.general.shipping_method'))
                        ->badge()
                        ->color(OrderStatusType::SHIPPING->getColor()),
                ]),

            'user' => Section::make(__('shop::order.admin.view.user.title'))
                ->columns(3)
                ->schema([
                    TextEntry::make('user')
                        ->label(__('shop::order.admin.view.user.user'))
                        ->placeholder(__('shop::order.admin.view.user.guest'))
                        ->columnSpanFull()
                        ->formatStateUsing(fn ($state, Model $record): string => $record->user->name . ' ' . $record->user->surname . ' (' . $record->user->email . ')')
                        ->url(fn ($record): string => ($record->user) ? UserResource::getUrl('edit', ['record' => $record->user]) : false),

                    TextEntry::make('user_data.name')
                        ->label(__('shop::order.admin.view.user.user_data.name_surname'))
                        ->formatStateUsing(fn ($state, Model $record): string => $record->user_data['name'] . ' ' . $record->user_data['surname']),
                    TextEntry::make('user_data.email')
                        ->label(__('shop::order.admin.view.user.user_data.email')),
                    TextEntry::make('user_data.phone')
                        ->label(__('shop::order.admin.view.user.user_data.phone')),
                    TextEntry::make('user_data.birthday')
                        ->label(__('shop::order.admin.view.user.user_data.birthday')),
                    TextEntry::make('user_data.company')
                        ->label(__('shop::order.admin.view.user.user_data.company')),
                    TextEntry::make('user_data.vat')
                        ->label(__('shop::order.admin.view.user.user_data.vat')),
                ]),

            'sipping' => Section::make(__('shop::order.admin.view.shipping_address'))
                ->columns(3)
                ->schema([
                    TextEntry::make('shipping_address_data.country.name')
                        ->label(__('shop::order.admin.view.shipping_address.country')),
                    TextEntry::make('shipping_address_data.region.name')
                        ->label(__('shop::order.admin.view.shipping_address.region')),
                    TextEntry::make('shipping_address_data.city')
                        ->label(__('shop::order.admin.view.shipping_address.city')),
                    TextEntry::make('shipping_address_data.zip')
                        ->label(__('shop::order.admin.view.shipping_address.zip')),
                    TextEntry::make('shipping_address_data.address')
                        ->label('Address')
                        ->columnSpan(2),
                ]),

            'billing' => Section::make(__('shop::order.admin.view.billing_address.title'))
                ->columns(3)
                ->schema([
                    TextEntry::make('shipping_address_data.country.name')
                        ->label(__('shop::order.admin.view.billing_address.country')),
                    TextEntry::make('shipping_address_data.region.name')
                        ->label(__('shop::order.admin.view.billing_address.region')),
                    TextEntry::make('shipping_address_data.city')
                        ->label(__('shop::order.admin.view.billing_address.city')),
                    TextEntry::make('shipping_address_data.zip')
                        ->label(__('shop::order.admin.view.billing_address.zip')),
                    TextEntry::make('shipping_address_data.address')
                        ->label(__('shop::order.admin.view.billing_address.address'))
                        ->columnSpan(2),
                ]),
        ]);
    }

    public function presetList(): void
    {
        $this->setListDefaultSort('created_at', 'desc');

        $this->setListModifyQueryUsing(fn (Builder $query) => $query->with(['generalStatus', 'paymentStatus', 'shippingStatus']));

        $this->addListColumns([
            'user.name' => TextColumn::make('user.name')
                ->label(__('shop::order.admin.list.user'))
                ->searchable()
                ->sortable()
                ->placeholder(__('shop::order.admin.list.user_guest')),
            'user_data.email' => TextColumn::make('user_data.email')
                ->label(__('shop::order.admin.list.email'))
                ->searchable()
                ->sortable(),

            'generalStatus' => TextColumn::make('generalStatus')
                ->label(__('shop::order.admin.list.general_status'))
                ->formatStateUsing(fn ($state, Model $record): string => $record->generalStatus->name)
                ->badge()
                ->color(fn ($state, Model $record): string => $record->generalStatus->color)
                ->action(\Filament\Tables\Actions\Action::make('actions.general_status')
                    ->label(__('shop::order.admin.actions.general_status.title'))
                    ->action(function (Order $record, array $data): void {
                        $record->general_order_status_id = $data['general_order_status_id'];
                        $record->save();
                    })
                    ->form([
                        Select::make('general_order_status_id')
                            ->label(__('shop::order.admin.actions.general_status.new_status'))
                            ->options(OrderStatusType::GENERAL->getStatuses()->pluck('name', 'id'))
                            ->required(),
                    ])),

            'payment_order_status_id' => TextColumn::make('payment_order_status_id')
                ->label(__('shop::order.admin.list.payment_status'))
                ->formatStateUsing(fn ($state, Model $record): string => $record->paymentStatus->name)
                ->badge()
                ->color(fn ($state, Model $record): string => $record->paymentStatus->color)
                ->action(\Filament\Tables\Actions\Action::make('actions.payment_status')
                    ->label(__('shop::order.admin.actions.payment_status.title'))
                    ->action(function (Order $record, array $data): void {
                        $record->payment_order_status_id = $data['payment_order_status_id'];
                        $record->save();
                    })
                    ->form([
                        Select::make('payment_order_status_id')
                            ->label(__('shop::order.admin.actions.payment_status.new_status'))
                            ->options(OrderStatusType::PAYMENT->getStatuses()->pluck('name', 'id'))
                            ->required(),
                    ])),

            'shipping_order_status_id' => TextColumn::make('shipping_order_status_id')
                ->label(__('shop::order.admin.list.shipping_status'))
                ->formatStateUsing(fn ($state, Model $record): string => $record->shippingStatus->name)
                ->badge()
                ->color(fn ($state, Model $record): string => $record->shippingStatus->color)
                ->action(\Filament\Tables\Actions\Action::make('actions.shipping_status')
                    ->label(__('shop::order.admin.actions.shipping_status.title'))
                    ->action(function (Order $record, array $data): void {
                        $record->shipping_order_status_id = $data['shipping_order_status_id'];
                        $record->save();
                    })
                    ->form([
                        Select::make('shipping_order_status_id')
                            ->label(__('shop::order.admin.actions.shipping_status.new_status'))
                            ->options(OrderStatusType::SHIPPING->getStatuses()->pluck('name', 'id'))
                            ->required(),
                    ])),

            'total_pre_payment' => TextColumn::make('total_pre_payment')
                ->label(__('shop::order.admin.list.total'))
                ->money(currency()->getCurrency(), currency()->getSubunit()),
        ]);

        $this->addListFilters([
            'trashed' => TrashedFilter::make('trashed'),
            'generalStatus' => SelectFilter::make('generalStatus')
                ->label(__('shop::order.admin.list.filter.general_status'))
                ->options(OrderStatusType::GENERAL->getStatuses()->pluck('name', 'id')),
            'paymentStatus' => SelectFilter::make('paymentStatus')
                ->label(__('shop::order.admin.list.filter.payment_status'))
                ->options(OrderStatusType::PAYMENT->getStatuses()->pluck('name', 'id')),
            'shippingStatus' => SelectFilter::make('shippingStatus')
                ->label(__('shop::order.admin.list.filter.shipping_status'))
                ->options(OrderStatusType::SHIPPING->getStatuses()->pluck('name', 'id')),
        ]);

        $this->addListActions([
            'view' => ViewAction::make(),
            'restore' => RestoreAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ]);

        $this->addListBulkActions([
            'delete' => DeleteBulkAction::make(),
            'restore' => RestoreBulkAction::make(),
            'forceDelete' => ForceDeleteBulkAction::make(),
        ], self::ACTION_MAIN_GROUP);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['user', 'generalStatus']);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['user.name', 'user_data->email'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return '#' . $record->id;
    }

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        $details = [];

        if ($record->user) {
            $details['User'] = $record->user->name;
        }

        if ($record->user_data) {
            $details['Email'] = $record->user_data['email'];
        }

        if ($record->generalStatus) {
            $details['General Status'] = $record->generalStatus->name;
        }

        $details['Total'] = money($record->total_pre_payment);

        return $details;
    }

    public static function getRelations(): array
    {
        return [
            ProductsRelationManager::class,
        ];
    }
}
