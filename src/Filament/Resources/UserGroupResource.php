<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Actions\RestoreAction;
use Filament\Tables\Actions\RestoreBulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\TrashedFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Zoker\Shop\Filament\Resources\UserGroupResource\Pages;
use Zoker\Shop\Models\UserGroup;
use Zoker\Shop\Traits\Resources\ExtendableResource;

class UserGroupResource extends Resource
{
    use ExtendableResource;

    protected static ?string $model = UserGroup::class;

    protected static ?string $slug = 'user-groups';

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public function presetForm(): void
    {
        $this->addFormFields([
            'created_at' => Placeholder::make('created_at')
                ->label(__('shop::auth.user_group.admin.form.created_at'))
                ->content(fn (?UserGroup $record): string => $record?->created_at?->diffForHumans() ?? '-'),

            'updated_at' => Placeholder::make('updated_at')
                ->label(__('shop::auth.user_group.admin.form.updated_at'))
                ->content(fn (?UserGroup $record): string => $record?->updated_at?->diffForHumans() ?? '-'),

            'name' => TextInput::make('name')
                ->label(__('shop::auth.user_group.admin.form.name'))
                ->required(),

            'is_admin' => Checkbox::make('is_admin')
                ->label(__('shop::auth.user_group.admin.form.is_admin')),
        ]);
    }

    public function presetList(): void
    {
        $this->addListColumns([
            'name' => TextColumn::make('name')
                ->label(__('shop::auth.user_group.admin.list.name'))
                ->searchable()
                ->sortable(),

            'is_admin' => IconColumn::make('is_admin')
                ->label(__('shop::auth.user_group.admin.list.is_admin'))
                ->boolean(),
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
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserGroups::route('/'),
            'create' => Pages\CreateUserGroup::route('/create'),
            'edit' => Pages\EditUserGroup::route('/{record}/edit'),
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
        return ['name'];
    }
}
