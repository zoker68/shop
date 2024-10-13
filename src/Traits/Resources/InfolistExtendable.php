<?php

namespace Zoker\Shop\Traits\Resources;

use Filament\Infolists\Infolist;

trait InfolistExtendable
{
    private static array $allInfoListEntries = [];

    public function setInfoListEntries(array $entries): void
    {
        self::$allInfoListEntries = $entries;
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema(self::$allInfoListEntries);
    }
}
