<?php

namespace Zoker\Shop\Classes\Bases;

use Illuminate\Support\Str;
use Zoker\Shop\Classes\Payment\PaymentHandlerInterface;
use Zoker\Shop\Enums\OrderStatusType;
use Zoker\Shop\Models\Order;

abstract class BasePayment implements PaymentHandlerInterface
{
    public static string $label = '';

    public Order $order;

    private function __construct() {}

    public static function make(): self
    {
        return new static;
    }

    public function setOrder(Order $order): self
    {
        $this->order = $order;

        return $this;
    }

    public static function getLabel(): string
    {
        if (self::$label) {
            return self::$label;
        }

        return Str::of(class_basename(static::class))->replace(['Handler', 'Payment'], '')->headline();
    }

    public function updatePaymentStatusBefore(): self
    {
        $paymentStatusBefore = config('shop.payment_status_id.new');

        if ($paymentStatusBefore && isset($this->order) && $this->order->payment_order_status_id !== $paymentStatusBefore) {
            $this->order->payment_order_status_id = $paymentStatusBefore;
            $this->order->save();
        }

        return $this;
    }

    public function updatePaymentStatusSuccess(): self
    {
        $paymentStatusSuccess = config('shop.payment_status_id.success');

        $this->order->paid_at = now();
        if ($paymentStatusSuccess && isset($this->order) && $this->order->payment_order_status_id !== $paymentStatusSuccess) {
            $this->order->payment_order_status_id = $paymentStatusSuccess;
        }
        $this->order->save();

        return $this;
    }

    public function fail(): void
    {
        $failStatus = config('shop.payment_status_id.fail') ?? OrderStatusType::PAYMENT->getDefault()->id;

        if ($failStatus && isset($this->order) && $this->order->payment_order_status_id !== $failStatus) {
            $this->order->payment_order_status_id = $failStatus;
            $this->order->save();
        }
    }
}
