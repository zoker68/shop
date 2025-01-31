<?php

namespace Zoker\Shop\Classes\Payment;

interface PaymentHandlerInterface
{
    public function process(): mixed;

    public function success(): void;

    public function fail(): void;

    public function repeatPayment(): mixed;

    public static function getLabel(): string;

    public static function make(): self;

    public function updatePaymentStatusBefore(): self;

    public function updatePaymentStatusSuccess(): self;
}
