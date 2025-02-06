<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Model;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Filament\Resources\UserResource\Pages;
use Zoker\Shop\Filament\Resources\UserResource\RelationManagers\AddressesRelationManager;
use Zoker\Shop\Filament\Resources\UserResource\RelationManagers\GroupsRelationManager;
use Zoker\Shop\Models\User;

class UserResource extends BaseResource
{
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
            'restore' => RestoreAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ]);

        $this->addListBulkActions([
            'delete' => DeleteBulkAction::make(),
            'restore' => RestoreBulkAction::make(),
            'forceDelete' => ForceDeleteBulkAction::make(),
        ]);

        $this->addListFilters([
            'trashed' => TrashedFilter::make(),
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

    public static function getGlobalSearchResultDetails(Model $record): array
    {
        return [
            'Email' => $record->email,
            'Name' => $record->name,
            'Surname' => $record->surname,
        ];
    }

    public static function getGlobalSearchResultTitle(Model $record): string
    {
        return '';
    }
}
