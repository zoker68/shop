<?php

namespace Zoker\Shop\Traits\Resources;

trait ExtendableResource
{
    use FormExtendable, TableExtendable;

    private static ?self $instance = null;

    protected static function getInstance(): self
    {
        if (! self::$instance) {
            self::$instance = new static;
        }

        return self::$instance;
    }
}
