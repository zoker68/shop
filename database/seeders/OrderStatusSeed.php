<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Zoker68\Shop\Enums\OrderStatusType;
use Zoker68\Shop\Models\OrderStatus;

class OrderStatusSeed extends Seeder
{
    public function run(): void
    {
        OrderStatus::create([
            'name' => 'New',
            'type' => OrderStatusType::GENERAL,
            'color' => 'gray',
            'hex_color' => '#6B7280',
            'order' => 1,
            'is_default' => true,
        ]);
        OrderStatus::create([
            'name' => 'In Progress',
            'type' => OrderStatusType::GENERAL,
            'color' => 'info',
            'hex_color' => '#3B82F6',
            'order' => 2,
        ]);
        OrderStatus::create([
            'name' => 'Cancelled',
            'type' => OrderStatusType::GENERAL,
            'color' => 'danger',
            'hex_color' => '#EF4444',
            'order' => 3,
        ]);
        OrderStatus::create([
            'name' => 'Complete',
            'type' => OrderStatusType::GENERAL,
            'color' => 'success',
            'hex_color' => '#22C55E',
            'order' => 4,
        ]);

        OrderStatus::create([
            'name' => 'Pending',
            'type' => OrderStatusType::SHIPPING,
            'color' => 'gray',
            'hex_color' => '#6B7280',
            'order' => 1,
            'is_default' => true,
        ]);
        OrderStatus::create([
            'name' => 'Shipped',
            'type' => OrderStatusType::SHIPPING,
            'color' => 'info',
            'hex_color' => '#3B82F6',
            'order' => 2,
        ]);
        OrderStatus::create([
            'name' => 'Delivered',
            'type' => OrderStatusType::SHIPPING,
            'color' => 'success',
            'hex_color' => '#22C55E',
            'order' => 3,
        ]);

        OrderStatus::create([
            'name' => 'Pending',
            'type' => OrderStatusType::PAYMENT,
            'color' => 'gray',
            'hex_color' => '#6B7280',
            'order' => 1,
            'is_default' => true,
        ]);
        OrderStatus::create([
            'name' => 'Paid',
            'type' => OrderStatusType::PAYMENT,
            'color' => 'success',
            'hex_color' => '#22C55E',
            'order' => 2,
        ]);
    }
}
