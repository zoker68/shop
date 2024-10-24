<?php

namespace Zoker\Shop\Traits\Resources;

trait InfolistExtendable
{
    private static array $allInfoListEntries = [];

    public function setInfoListEntries(array $entries): void
    {
        self::$allInfoListEntries = $entries;
    }
}
