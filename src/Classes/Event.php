<?php

namespace Zoker\Shop\Classes;

class Event
{
    protected static $events = [];

    public static function listen(string $name, \Closure $callback, $priority = 0): void
    {
        if (! isset(static::$events[$name][$priority])) {
            static::$events[$name][$priority] = [];
        }

        static::$events[$name][$priority][] = $callback;
    }

    public static function dispatch(string $event, array $payload = [], bool $halt = false): mixed
    {
        if (! isset(static::$events[$event])) {
            return null;
        }

        $callbacks = static::$events[$event];
        krsort($callbacks);

        $result = [];
        foreach ($callbacks as $callbackList) {
            foreach ($callbackList as $callback) {
                $response = $callback(...$payload);

                if ($halt) {
                    return $response;
                }

                $result[] = $response;
            }
        }

        return $halt ? null : $result;
    }
}
