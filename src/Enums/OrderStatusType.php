<?php

namespace Zoker68\Shop\Enums;

use Illuminate\Support\Collection;
use Zoker68\Shop\Models\OrderStatus;

enum OrderStatusType: string
{
    case GENERAL = 'general';
    case PAYMENT = 'payment';
    case SHIPPING = 'shipping';

    public function getLabel(): string
    {
        return match ($this) {
            self::GENERAL => __('zoker68.shop::order.status_type.general'),
            self::PAYMENT => __('zoker68.shop::order.status_type.payment'),
            self::SHIPPING => __('zoker68.shop::order.status_type.shipping'),
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::GENERAL => 'success',
            self::PAYMENT => 'warning',
            self::SHIPPING => 'info',
        };
    }

    public static function getAllOptions(): array
    {
        $options = [];

        foreach (self::cases() as $case) {
            $options[$case->value] = $case->getLabel();
        }

        return $options;
    }

    public function getDefault(): OrderStatus
    {
        return OrderStatus::getDefault($this);
    }

    public function getStatuses(): Collection
    {
        return OrderStatus::type($this)->get();
    }
}
