<?php

namespace Zoker\Shop\Enums;

enum ProductStatus: string
{
    case MODERATION = 'moderation';
    case REJECTED = 'rejected';
    case APPROVED = 'approved';

    public function getLabel(): string
    {
        return match ($this) {
            self::MODERATION => __('shop::product.status.admin.moderation'),
            self::REJECTED => __('shop::product.status.admin.rejected'),
            self::APPROVED => __('shop::product.status.admin.approved'),
        };
    }

    public function getColor(): string
    {
        return match ($this) {
            self::MODERATION => 'warning',
            self::REJECTED => 'danger',
            self::APPROVED => 'success',
        };
    }

    public static function getLabels(): array
    {
        $labels = [];

        foreach (self::cases() as $case) {
            $labels[$case->value] = $case->getLabel();
        }

        return $labels;
    }
}
