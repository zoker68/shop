<?php

namespace Zoker\Shop\Classes\Bases;

use Filament\Resources\Pages\ListRecords;
use Zoker\Shop\Classes\Event;
use Zoker\Shop\Traits\Extendable;
use Zoker\Shop\Traits\Resources\ExtendRecordHeader;

abstract class BaseListRecords extends ListRecords
{
    use Extendable;
    use ExtendRecordHeader;

    private static array $allTabs = [];

    public function getTabs(): array
    {
        if (method_exists($this, 'presetTabs')) {
            $this->presetTabs();
        }

        Event::dispatch('backend.record.extend', [$this]);

        return self::$allTabs;
    }

    public function addTabs(array $tabs): void
    {
        self::$allTabs = array_merge(self::$allTabs, $tabs);
    }

    public function removeTab(string $name): void
    {
        unset(self::$allTabs[$name]);
    }
}
