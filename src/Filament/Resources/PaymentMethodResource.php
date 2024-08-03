<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
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
use Zoker\Shop\Filament\Resources\PaymentMethodResource\Pages;
use Zoker\Shop\Models\PaymentMethod;

class PaymentMethodResource extends Resource
{
    protected static ?string $model = PaymentMethod::class;

    protected static ?string $slug = 'payment-methods';

    protected static ?string $navigationIcon = 'heroicon-o-credit-card';

    protected static ?string $navigationGroup = 'Checkout';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->label(__('shop::checkout.payment.admin.form.name'))
                    ->required(),

                TextInput::make('code')
                    ->label(__('shop::checkout.payment.admin.form.code'))
                    ->unique(ignoreRecord: true)
                    ->required(),

                FileUpload::make('image')
                    ->label(__('shop::product.admin.form.image'))
                    ->image()
                    ->directory('shipping-methods')
                    ->imageEditor()
                    ->imageEditorAspectRatios(['1:1', '4:3', '16:9', '3:1', '4:1']),

                Textarea::make('description')
                    ->label(__('shop::checkout.payment.admin.form.description')),

                TextInput::make('sort')
                    ->label(__('shop::checkout.payment.admin.form.sort'))
                    ->default(fn () => count(PaymentMethod::all()) + 1)
                    ->required(),

                TextInput::make('fee')
                    ->label(__('shop::checkout.payment.admin.form.fee'))
                    ->required()
                    ->default(0)
                    ->numeric()
                    ->prefix(currency()->getPrefix())
                    ->postfix(currency()->getSuffix())
                    ->minValue(0)
                    ->afterStateHydrated(fn ($state, $set) => $set('fee', $state / (currency()->getSubunit()))),

                TextInput::make('fee_percent')
                    ->label(__('shop::checkout.payment.admin.form.fee_percent'))
                    ->required()
                    ->default(0)
                    ->numeric()
                    ->minValue(0)
                    ->postfix('%'),

                Toggle::make('published')
                    ->label(__('shop::checkout.payment.admin.form.published')),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('sort')
            ->reorderable('sort')
            ->columns([
                TextColumn::make('name')
                    ->label(__('shop::checkout.payment.admin.list.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('code')
                    ->label(__('shop::checkout.payment.admin.list.code'))
                    ->searchable()
                    ->sortable(),

                ToggleColumn::make('published')
                    ->label(__('shop::checkout.payment.admin.list.published')),
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
