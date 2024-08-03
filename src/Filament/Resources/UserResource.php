<?php

// TODO: edit resource!

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Zoker\Shop\Filament\Resources\UserResource\Pages;
use Zoker\Shop\Filament\Resources\UserResource\RelationManagers\AddressesRelationManager;
use Zoker\Shop\Models\User;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'users';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->columns(3)
            ->schema([
                TextInput::make('email')
                    ->label(__('shop::auth.admin.form.email'))
                    ->email()
                    ->required(),

                TextInput::make('password')
                    ->label(__('shop::auth.admin.form.password'))
                    ->password()
                    ->rules(['min:8'])
                    ->confirmed(),

                TextInput::make('password_confirmation')
                    ->label(__('shop::auth.admin.form.password_confirmation'))
                    ->password(),

                TextInput::make('name')
                    ->label(__('shop::auth.admin.form.name'))
                    ->required(),

                TextInput::make('surname')
                    ->label(__('shop::auth.admin.form.surname')),

                TextInput::make('phone')
                    ->label(__('shop::auth.admin.form.phone')),

                DatePicker::make('birthday')
                    ->label(__('shop::auth.admin.form.birthday')),

                TextInput::make('company')
                    ->label(__('shop::auth.admin.form.company')),

                TextInput::make('vat')
                    ->label(__('shop::auth.admin.form.vat')),

                Placeholder::make('created_at')
                    ->columnStart(1)
                    ->label(__('shop::auth.admin.form.created_at'))
                    ->content(fn (?User $record): string => $record?->created_at?->diffForHumans() ?? '-'),

                Placeholder::make('updated_at')
                    ->label(__('shop::auth.admin.form.updated_at'))
                    ->content(fn (?User $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

                Placeholder::make('email_verified_at')
                    ->label(__('shop::auth.admin.form.email_verified_at'))
                    ->content(fn (?User $record): string => $record?->email_verified_at?->format('Y-m-d H:i:s') ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('email')
                    ->label(__('shop::auth.admin.list.email'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('name')
                    ->label(__('shop::auth.admin.list.name'))
                    ->searchable()
                    ->sortable(),

                TextColumn::make('surname')
                    ->label(__('shop::auth.admin.list.surname'))
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            AddressesRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['email', 'name', 'surname'];
    }
}
