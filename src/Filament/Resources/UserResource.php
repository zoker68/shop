<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Zoker\Shop\Filament\Resources\UserResource\Pages;
use Zoker\Shop\Filament\Resources\UserResource\RelationManagers\AddressesRelationManager;
use Zoker\Shop\Filament\Resources\UserResource\RelationManagers\GroupsRelationManager;
use Zoker\Shop\Models\User;
use Zoker\Shop\Traits\Resources\ExtendableResource;

class UserResource extends Resource
{
    use ExtendableResource;

    protected static ?string $model = User::class;

    protected static ?string $slug = 'users';

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public function presetForm(): void
    {
        $this->setFormColumns(3);

        $this->addFormFields([
            'email' => TextInput::make('email')
                ->label(__('shop::auth.admin.form.email'))
                ->email()
                ->required(),

            'password' => TextInput::make('password')
                ->label(__('shop::auth.admin.form.password'))
                ->password()
                ->rules(['min:8'])
                ->confirmed(),

            'password_confirmation' => TextInput::make('password_confirmation')
                ->label(__('shop::auth.admin.form.password_confirmation'))
                ->password(),

            'name' => TextInput::make('name')
                ->label(__('shop::auth.admin.form.name'))
                ->required(),

            'surname' => TextInput::make('surname')
                ->label(__('shop::auth.admin.form.surname')),

            'phone' => TextInput::make('phone')
                ->label(__('shop::auth.admin.form.phone')),

            'birthday' => DatePicker::make('birthday')
                ->label(__('shop::auth.admin.form.birthday')),

            'company' => TextInput::make('company')
                ->label(__('shop::auth.admin.form.company')),

            'vat' => TextInput::make('vat')
                ->label(__('shop::auth.admin.form.vat')),

            'created_at' => Placeholder::make('created_at')
                ->columnStart(1)
                ->label(__('shop::auth.admin.form.created_at'))
                ->content(fn (?User $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            'updated_at' => Placeholder::make('updated_at')
                ->label(__('shop::auth.admin.form.updated_at'))
                ->content(fn (?User $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

            'email_verified_at' => Placeholder::make('email_verified_at')
                ->label(__('shop::auth.admin.form.email_verified_at'))
                ->content(fn (?User $record): string => $record?->email_verified_at?->format('Y-m-d H:i:s') ?? '-'),
        ]);
    }

    public function presetList(): void
    {
        $this->addListColumns([
            'email' => TextColumn::make('email')
                ->label(__('shop::auth.admin.list.email'))
                ->searchable()
                ->sortable(),

            'name' => TextColumn::make('name')
                ->label(__('shop::auth.admin.list.name'))
                ->searchable()
                ->sortable(),

            'surname' => TextColumn::make('surname')
                ->label(__('shop::auth.admin.list.surname'))
                ->searchable()
                ->sortable(),
        ]);

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
        ]);

        $this->addListBulkActions([
            'delete' => DeleteBulkAction::make(),
        ]);
    }

    public static function getRelations(): array
    {
        return [
            AddressesRelationManager::class,
            GroupsRelationManager::class,
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
