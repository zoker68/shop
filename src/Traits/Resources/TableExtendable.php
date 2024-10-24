<?php

namespace Zoker\Shop\Traits\Resources;

use Closure;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Zoker\Shop\Classes\Event;

trait TableExtendable
{
    const string ACTIONS_NO_IN_GROUP = 'actions-no-in-group';

    const string ACTION_MAIN_GROUP = 'action-main-group';

    private static array $allListColumns = [];

    private static array $allListFilters = [];

    private static array $allListActions = [];

    private static array $allListBulkActions = [];

    private static array $allListHeaderActions = [];

    private static ?string $listReorderable = null;

    private static ?string $listDefaultSort = null;

    private static ?string $listDefaultSortDirection = null;

    private static ?Closure $listModifyQueryUsing = null;

    private static string|Group|null $listDefaultGroup = null;

    private static ?string $listRecordTitleAttribute = null;

    private static $listPaginated = true;

    private function generateTable(Table $table): Table
    {
        if (method_exists($this, 'presetList')) {
            $this->presetList();
        }

        Event::dispatch('backend.table.extend', [$this]);

        return $table
            ->recordTitleAttribute(self::$listRecordTitleAttribute)
            ->reorderable(self::$listReorderable)
            ->defaultSort(self::$listDefaultSort, self::$listDefaultSortDirection)
            ->defaultGroup(self::$listDefaultGroup)
            ->modifyQueryUsing(self::$listModifyQueryUsing ?? fn (Builder $query) => $query)
            ->columns($this->generateListSchema())
            ->filters($this->generateListFilters())
            ->actions($this->generateListActions())
            ->bulkActions($this->generateListBulkActions())
            ->headerActions(self::$allListHeaderActions)
            ->paginated(self::$listPaginated);
    }

    public function addListColumns(array $columns): void
    {
        self::$allListColumns = array_merge(self::$allListColumns, $columns);
    }

    public function removeListColumn(string $name): void
    {
        unset(self::$allListColumns[$name]);
    }

    public function removeListColumns(array $names): void
    {
        foreach ($names as $name) {
            $this->removeListColumn($name);
        }
    }

    public function addListFilters(array $filters): void
    {
        self::$allListFilters = array_merge(self::$allListFilters, $filters);
    }

    public function removeListFilter(string $name): void
    {
        unset(self::$allListFilters[$name]);
    }

    public function removeListFilters(array $names): void
    {
        foreach ($names as $name) {
            $this->removeTableFilter($name);
        }
    }

    public function addListActions(array $actions, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        if (! isset(self::$allListActions[$group])) {
            self::$allListActions[$group] = [];
        }

        self::$allListActions[$group] = array_merge(self::$allListActions[$group], $actions);
    }

    public function removeListAction(string $name, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        unset(self::$allListActions[$group][$name]);
    }

    public function removeListActions(array $names, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        foreach ($names as $name) {
            $this->removeListAction($name, $group);
        }
    }

    public function addListHeaderActions(array $actions): void
    {
        self::$allListHeaderActions = array_merge(self::$allListHeaderActions, $actions);
    }

    public function removeListHeaderAction(string $name): void
    {
        unset(self::$allListHeaderActions[$name]);
    }

    public function removeListHeaderActions(array $names): void
    {
        foreach ($names as $name) {
            $this->removeListHeaderAction($name);
        }
    }

    public function addListBulkActions(array $actions, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        if (! isset(self::$allListBulkActions[$group])) {
            self::$allListBulkActions[$group] = [];
        }

        self::$allListBulkActions[$group] = array_merge(self::$allListBulkActions[$group], $actions);
    }

    public function removeListBulkAction(string $name, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        unset(self::$allListBulkActions[$group][$name]);
    }

    public function removeListBulkActions(array $names, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        foreach ($names as $name) {
            $this->removeListBulkAction($name, $group);
        }
    }

    public function setListRecordTitleAttribute(string $attribute): void
    {
        self::$listRecordTitleAttribute = $attribute;
    }

    public function setListPaginated(bool $value = true): void
    {
        self::$listPaginated = $value;
    }

    public function setListReorderable(string $column): void
    {
        self::$listReorderable = $column;
    }

    public function setListDefaultSort(string $column, string $direction = 'asc'): void
    {
        self::$listDefaultSort = $column;
        self::$listDefaultSortDirection = $direction;
    }

    public function setListModifyQueryUsing(Closure $callback): void
    {
        self::$listModifyQueryUsing = $callback;
    }

    public function setListDefaultGroup(string|Group $group): void
    {
        self::$listDefaultGroup = $group;
    }

    protected function generateListSchema(): array
    {
        return self::$allListColumns;
    }

    protected function generateListFilters(): array
    {
        return self::$allListFilters;
    }

    protected function generateListActions(): array
    {
        if (! self::$allListActions) {
            return [];
        }

        if ($this->listActionGroupCount() === 1 && isset(self::$allListActions[self::ACTIONS_NO_IN_GROUP])) {
            return self::$allListActions[self::ACTIONS_NO_IN_GROUP];
        }

        $groups = self::$allListActions[self::ACTIONS_NO_IN_GROUP] ?? [];

        foreach (self::$allListActions as $group => $actions) {
            if ($group === self::ACTIONS_NO_IN_GROUP) {
                continue;
            }
            $groups[$group] = ActionGroup::make($actions);
        }

        return $groups;
    }

    protected function generateListBulkActions(): array
    {
        if (! self::$allListBulkActions) {
            return [];
        }

        if ($this->listBulkActionGroupCount() === 1 && isset(self::$allListBulkActions[self::ACTIONS_NO_IN_GROUP])) {
            return self::$allListBulkActions[self::ACTIONS_NO_IN_GROUP];
        }

        $groups = self::$allListBulkActions[self::ACTIONS_NO_IN_GROUP] ?? [];
        foreach (self::$allListBulkActions as $group => $actions) {
            if ($group === self::ACTIONS_NO_IN_GROUP) {
                continue;
            }
            $groups[$group] = BulkActionGroup::make($actions);
        }

        return $groups;
    }

    protected function listActionGroupCount(): int
    {
        return count(self::$allListActions);
    }

    protected function listBulkActionGroupCount(): int
    {
        return count(self::$allListBulkActions);
    }
}
