<?php

namespace Zoker\Shop\Traits\Resources;

use Zoker\Shop\Classes\Event;

trait ExtendRecordHeader
{
    private static array $allHeaderActions = [];

    protected function getHeaderActions(): array
    {
        if (method_exists($this, 'presetHeaderActions')) {
            $this->presetHeaderActions();
        }

        Event::dispatch('backend.record.extend', [$this]);

        return self::$allHeaderActions;
    }

    public function addHeaderActions(array $actions): void
    {
        self::$allHeaderActions = array_merge(self::$allHeaderActions, $actions);
    }

    public function removeHeaderAction(string $name): void
    {
        unset(self::$allHeaderActions[$name]);
    }
}
