<?php

namespace Zoker\Shop\Filament\Resources;

use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ForceDeleteAction;
use Filament\Tables\Actions\ForceDeleteBulkAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Database\Eloquent\Model;
use Zoker\Shop\Classes\Bases\BaseResource;
use Zoker\Shop\Filament\Resources\RegionResource\Pages;
use Zoker\Shop\Models\Region;

class RegionResource extends BaseResource
{
    protected static ?string $model = Region::class;

    protected static ?string $slug = 'regions';

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = 'Locations';

    protected static ?string $recordTitleAttribute = 'name';

    public static function getModelLabel(): string
    {
        return __('shop::region.admin.system.label');
    }

    public static function getPluralModelLabel(): string
    {
        return __('shop::region.admin.system.plural_title');
    }

    public function presetForm(): void
    {
        $this->addFormFields(Region::getAdminFormSchema());
    }

    public function presetList(): void
    {
        $this->addListColumns([
            TextColumn::make('country.name')
                ->label(__('shop::region.admin.list.country'))
                ->searchable()
                ->sortable(),

            TextColumn::make('name')
                ->label(__('shop::region.admin.list.name'))
                ->sortable()
                ->searchable(),

            TextColumn::make('code')
                ->label(__('shop::region.admin.list.code')),

            ToggleColumn::make('published')
                ->label(__('shop::region.admin.list.published')),
        ]);

        $this->setListDefaultGroup(Group::make('country.name')
            ->collapsible()
        );

        $this->addListFilters([
            'country' => SelectFilter::make('country')
                ->label(__('shop::region.admin.list.country'))
                ->relationship('country', 'name')
                ->searchable()
                ->preload(),
        ]);

        $this->addListActions([
            'edit' => EditAction::make(),
            'delete' => DeleteAction::make(),
            'forceDelete' => ForceDeleteAction::make(),
        ]);

        $this->addListBulkActions([
            'forceDelete' => ForceDeleteBulkAction::make(),
        ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRegions::route('/'),
            'create' => Pages\CreateRegion::route('/create'),
            'edit' => Pages\EditRegion::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'code'];
    }

    public static function getGlobalSearchResultTitle(Model $record): string|Htmlable
    {
        return $record->name;
    }
}
