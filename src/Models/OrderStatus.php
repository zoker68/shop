<?php

namespace Zoker\Shop\Models;

use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Zoker\Shop\Classes\Model;
use Zoker\Shop\Enums\OrderStatusType;
use Zoker\Shop\Observers\OrderStatusObserver;

#[ObservedBy(OrderStatusObserver::class)]
class OrderStatus extends Model
{
    use HasFactory, SoftDeletes;

    public $timestamps = false;

    protected function casts(): array
    {
        return [
            'type' => OrderStatusType::class,
        ];
    }

    public function scopeType(Builder $query, OrderStatusType $type): Builder
    {
        return $query->where('type', $type);
    }

    public function scopeDefault(Builder $query): Builder
    {
        return $query->where('is_default', true);
    }

    public static function getDefault(OrderStatusType $orderStatusType): self
    {
        return self::query()
            ->type($orderStatusType)
            ->default()
            ->first()
            ?? self::factory()->create(['name' => 'Default', 'is_default' => true, 'type' => $orderStatusType]);
    }
}
