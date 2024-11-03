<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Filament\Resources\PaymentMethodResource\Pages;
use Zoker\Shop\Models\PaymentMethod;

class PaymentMethodResource extends BaseResource
{
    protected static ?string $model = PaymentMethod::class;

    protected static ?string $slug = 'payment-methods';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Checkout';

    public function presetForm(): void
    {
        $this->addFormFields([
            'name' => TextInput::make('name')
                ->label(__('shop::checkout.payment.admin.form.name'))
                ->required(),

            'code' => TextInput::make('code')
                ->label(__('shop::checkout.payment.admin.form.code'))
                ->unique(ignoreRecord: true)
                ->required(),

            'image' => FileUpload::make('image')
                ->label(__('shop::product.admin.form.image'))
                ->image()
                ->directory('shipping-methods')
                ->imageEditor()
                ->imageEditorAspectRatios(['1:1', '4:3', '16:9', '3:1', '4:1']),

            'description' => Textarea::make('description')
                ->label(__('shop::checkout.payment.admin.form.description')),

            'sort' => TextInput::make('sort')
                ->label(__('shop::checkout.payment.admin.form.sort'))
                ->default(fn () => PaymentMethod::count() + 1)
                ->integer()
                ->minValue(1)
                ->required(),

            'fee' => TextInput::make('fee')
                ->label(__('shop::checkout.payment.admin.form.fee'))
                ->required()
                ->default(0)
                ->numeric()
                ->prefix(currency()->getPrefix())
                ->postfix(currency()->getSuffix())
                ->minValue(0)
                ->afterStateHydrated(fn ($state, $set) => $set('fee', $state / (currency()->getSubunit()))),

            'fee_percent' => TextInput::make('fee_percent')
                ->label(__('shop::checkout.payment.admin.form.fee_percent'))
                ->required()
                ->default(0)
                ->numeric()
                ->minValue(0)
                ->postfix('%'),

            'published' => Toggle::make('published')
                ->label(__('shop::checkout.payment.admin.form.published')),
        ]);
    }

    public function presetList(): void
    {
        $this->setListDefaultSort('sort');

        $this->setListReorderable('sort');

        $this->addListColumns([
            'name' => TextColumn::make('name')
                ->label(__('shop::checkout.payment.admin.list.name'))
                ->searchable()
                ->sortable(),

            'code' => TextColumn::make('code')
                ->label(__('shop::checkout.payment.admin.list.code'))
                ->searchable()
                ->sortable(),

            'published' => ToggleColumn::make('published')
                ->label(__('shop::checkout.payment.admin.list.published')),
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
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPaymentMethods::route('/'),
            'create' => Pages\CreatePaymentMethod::route('/create'),
            'edit' => Pages\EditPaymentMethod::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'code'];
    }
}
