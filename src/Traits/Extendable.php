<?php

namespace Zoker\Shop\Traits;

use Zoker\Shop\Classes\ExtendRegistry;

trait Extendable
{
    public static function addMethod($name, $callback): void
    {
        ExtendRegistry::register(get_called_class(), $name, $callback);
    }

    public function __call($method, $parameters)
    {
        $calledClass = get_called_class();
        if (ExtendRegistry::has($calledClass, $method)) {
            return ExtendRegistry::dispatch($calledClass, $method, $this, $parameters);
        }

        $parent = get_parent_class(self::class);
        if (method_exists($parent, '__call')) {
            return $parent::__call($method, $parameters);
        }

        throw new \BadMethodCallException(sprintf('Call to undefined method %s::%s', get_called_class(), $method));
    }
}
