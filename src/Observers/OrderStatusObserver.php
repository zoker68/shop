<?php

namespace Zoker68\Shop\Observers;

use Zoker68\Shop\Models\OrderStatus;

class OrderStatusObserver
{
    /**
     * Handle the OrderStatus "created" event.
     */
    public function created(OrderStatus $orderStatus): void
    {
        $this->turnOffOtherDefault($orderStatus);
    }

    /**
     * Handle the OrderStatus "updated" event.
     */
    public function updated(OrderStatus $orderStatus): void
    {
        $this->turnOffOtherDefault($orderStatus);
    }

    /**
     * Handle the OrderStatus "deleted" event.
     */
    public function deleted(OrderStatus $orderStatus): void
    {
        $this->turnOffOtherDefault($orderStatus);
        OrderStatus::type($orderStatus->type)->where('id', '!=', $orderStatus->id)->first()->update(['is_default' => true]);
        $orderStatus->is_default = false;
        $orderStatus->save();
    }

    /**
     * Handle the OrderStatus "restored" event.
     */
    public function restored(OrderStatus $orderStatus): void
    {
        //
    }

    /**
     * Handle the OrderStatus "force deleted" event.
     */
    public function forceDeleted(OrderStatus $orderStatus): void
    {
        $this->turnOffOtherDefault($orderStatus);
        OrderStatus::type($orderStatus->type)->where('id', '!=', $orderStatus->id)->first()->update(['is_default' => true]);
    }

    public function turnOffOtherDefault(OrderStatus $orderStatus): void
    {
        if ($orderStatus->is_default) {
            OrderStatus::query()->type($orderStatus->type)->where('id', '!=', $orderStatus->id)->update(['is_default' => false]);
        }
    }
}
