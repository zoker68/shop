<?php

namespace Zoker\Shop\Traits\Resources;

use Filament\Infolists\Infolist;
use Zoker\Shop\Classes\Event;

trait InfolistExtendable
{
    private static array $allInfoListEntries = [];

    private function generateInfoList(Infolist $infolist): Infolist
    {
        if (method_exists($this, 'presetInfolist')) {
            $this->presetInfolist();
        }

        Event::dispatch('backend.table.extend', [$this]);

        return $infolist
            ->schema(self::$allInfoListEntries);
    }

    public function setInfoListEntries(array $entries): void
    {
        self::$allInfoListEntries = $entries;
    }
}
