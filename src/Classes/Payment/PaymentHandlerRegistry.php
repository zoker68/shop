<?php

namespace Zoker\Shop\Classes\Payment;

use Zoker\Shop\Services\Payment\OfflinePaymentHandler;
use Zoker\Shop\Services\Payment\StripePaymentHandler;

class PaymentHandlerRegistry
{
    protected static array $handlers = [
        'offline' => OfflinePaymentHandler::class,
        'stripe' => StripePaymentHandler::class,
    ];

    public static function register(string $name, PaymentHandlerInterface $handler): void
    {
        self::$handlers[$name] = $handler;
    }

    public static function get(string $name): string
    {
        return self::$handlers[$name];
    }

    public static function getOptionsWithLabel(): array
    {
        return array_map(function ($handler) {
            return $handler::getLabel();
        }, self::$handlers);
    }
}
