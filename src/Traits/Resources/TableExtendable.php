<?php

namespace Zoker\Shop\Traits\Resources;

use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Table;
use Zoker\Shop\Classes\Event;

trait TableExtendable
{
    const string ACTIONS_NO_IN_GROUP = 'actions-no-in-group';

    const string ACTION_MAIN_GROUP = 'action-main-group';

    private static array $allTableColumns = [];

    private static array $allTableFilters = [];

    private static array $allTableActions = [];

    private static array $allTableBulkActions = [];

    public function addTableColumns(array $columns): void
    {
        self::$allTableColumns = array_merge(self::$allTableColumns, $columns);
    }

    public function removeTableColumn(string $name): void
    {
        unset(self::$allTableColumns[$name]);
    }

    public function removeTableColumns(array $names): void
    {
        foreach ($names as $name) {
            $this->removeTableColumn($name);
        }
    }

    public function addTableFilters(array $filters): void
    {
        self::$allTableFilters = array_merge(self::$allTableFilters, $filters);
    }

    public function removeTableFilter(string $name): void
    {
        unset(self::$allTableFilters[$name]);
    }

    public function removeTableFilters(array $names): void
    {
        foreach ($names as $name) {
            $this->removeTableFilter($name);
        }
    }

    public function addTableActions(array $actions, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        if (! isset(self::$allTableActions[$group])) {
            self::$allTableActions[$group] = [];
        }

        self::$allTableActions[$group] = array_merge(self::$allTableActions[$group], $actions);
    }

    public function removeTableAction(string $name, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        unset(self::$allTableActions[$group][$name]);
    }

    public function removeTableActions(array $names, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        foreach ($names as $name) {
            $this->removeTableAction($name, $group);
        }
    }

    public function addTableBulkActions(array $actions, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        if (! isset(self::$allTableBulkActions[$group])) {
            self::$allTableBulkActions[$group] = [];
        }

        self::$allTableBulkActions[$group] = array_merge(self::$allTableBulkActions[$group], $actions);
    }

    public function removeTableBulkAction(string $name, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        unset(self::$allTableBulkActions[$group][$name]);
    }

    public function removeTableBulkActions(array $names, string $group = self::ACTIONS_NO_IN_GROUP): void
    {
        foreach ($names as $name) {
            $this->removeTableBulkAction($name, $group);
        }
    }

    public static function table(Table $table): Table
    {
        /** @var self $instance */
        $instance = self::getInstance();
        $instance->presetTable();

        Event::dispatch('backend.table.extend', [$instance]);

        return $table
            ->columns($instance->generateTableSchema())
            ->filters($instance->generateTableFilters())
            ->actions($instance->generateTableActions())
            ->bulkActions($instance->generateTableBulkActions());
    }

    protected function generateTableSchema(): array
    {
        return self::$allTableColumns;
    }

    protected function generateTableFilters(): array
    {
        return self::$allTableFilters;
    }

    protected function generateTableActions(): array
    {
        if (! self::$allTableActions) {
            return [];
        }

        if ($this->tableActionGroupCount() === 1 && isset(self::$allTableActions[self::ACTIONS_NO_IN_GROUP])) {
            return self::$allTableActions[self::ACTIONS_NO_IN_GROUP];
        }

        $groups = self::$allTableActions[self::ACTIONS_NO_IN_GROUP] ?? [];

        foreach (self::$allTableActions as $group => $actions) {
            if ($group === self::ACTIONS_NO_IN_GROUP) {
                continue;
            }
            $groups[$group] = ActionGroup::make($actions);
        }

        return $groups;
    }

    protected function generateTableBulkActions(): array
    {
        if (! self::$allTableBulkActions) {
            return [];
        }

        if ($this->tableBulkActionGroupCount() === 1 && isset(self::$allTableBulkActions[self::ACTIONS_NO_IN_GROUP])) {
            return self::$allTableBulkActions[self::ACTIONS_NO_IN_GROUP];
        }

        $groups = self::$allTableBulkActions[self::ACTIONS_NO_IN_GROUP] ?? [];
        foreach (self::$allTableBulkActions as $group => $actions) {
            if ($group === self::ACTIONS_NO_IN_GROUP) {
                continue;
            }
            $groups[$group] = BulkActionGroup::make($actions);
        }

        return $groups;
    }

    protected function tableActionGroupCount(): int
    {
        return count(self::$allTableActions);
    }

    protected function tableBulkActionGroupCount(): int
    {
        return count(self::$allTableBulkActions);
    }
}
