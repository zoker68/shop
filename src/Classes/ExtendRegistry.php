<?php

namespace Zoker\Shop\Classes;

class ExtendRegistry
{
    private static array $methods = [];

    public static function register(string $class, string $method, callable $callback): void
    {
        self::$methods[$class][$method] = $callback;
    }

    public static function has($class, $method): bool
    {
        return isset(self::$methods[$class][$method]);
    }

    public static function dispatch($class, $method, $extendableInstance, $parameters): mixed
    {
        if (! self::has($class, $method)) {
            return null;
        }

        return call_user_func(self::$methods[$class][$method], $extendableInstance, ...$parameters);
    }
}
