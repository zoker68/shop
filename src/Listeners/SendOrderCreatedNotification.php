<?php

namespace Zoker\Shop\Listeners;

use Illuminate\Support\Facades\Mail;
use Zoker\Shop\Events\OrderCreatedEvent;
use Zoker\Shop\Mail\OrderCreatedAdministratorMail;
use Zoker\Shop\Mail\OrderCreatedCustomerMail;

class SendOrderCreatedNotification
{
    public function handle(OrderCreatedEvent $event): void
    {
        Mail::to($event->order->user_data['email'])->queue(new OrderCreatedCustomerMail($event->order));
        Mail::to(config('shop.mail_recipients.order'))->queue(new OrderCreatedAdministratorMail($event->order));
    }
}
