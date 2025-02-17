<?php

namespace Zoker\Shop\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Zoker\Shop\Models\Order;

class OrderCreatedEvent
{
    use Dispatchable, SerializesModels;

    public function __construct(public Order $order) {}
}
