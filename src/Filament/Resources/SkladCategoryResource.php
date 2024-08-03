<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Contracts\Database\Query\Builder;
use Zoker\Shop\Filament\Resources\SkladCategoryResource\Pages;
use Zoker\Shop\Models\Category;
use Zoker\Shop\Models\SkladCategory;

class SkladCategoryResource extends Resource
{
    protected static ?string $model = SkladCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-inbox-arrow-down';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('foreign_id')
                    ->label('ID в моем Складе')
                    ->required()
                    ->maxLength(255),
                TextInput::make('name')
                    ->label('Категория')
                    ->required()
                    ->maxLength(255),
                TextInput::make('parent')
                    ->label('Путь до категории')
                    ->required()
                    ->maxLength(255),
                Select::make('category_id')
                    ->label('Привязанная категория на сайте')
                    ->helperText('Категория, в которую будут автоматически экспортироваться продукты')
                    ->options(Category::getCategoryOptions())
                    ->searchable()
                    ->live()
                    ->columnSpanFull()
                    ->createOptionForm(Category::getAdminFormSchema()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Категория')
                    ->searchable(),
                TextColumn::make('parent')
                    ->label('Родительская категория')
                    ->searchable(),
                Tables\Columns\SelectColumn::make('category_id')
                    ->label('Привязанная категория')
                    ->searchable()
                    ->options(Category::getCategoryOptions()),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('no_category')
                    ->label('Без привязанной категории')
                    ->query(fn (Builder $query): Builder => $query->whereNull('category_id')),
            ])
            ->actions([
                EditAction::make(),
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
            //
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['foreign_id', 'name'];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSkladCategories::route('/'),
            'create' => Pages\CreateSkladCategory::route('/create'),
            'edit' => Pages\EditSkladCategory::route('/{record}/edit'),
        ];
    }
}
