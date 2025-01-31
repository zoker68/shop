<?php

namespace Zoker\Shop\Listeners;

use Laravel\Cashier\Events\WebhookReceived;
use Zoker\Shop\Services\Payment\StripePaymentHandler;

class StripeEventListener
{
    public function handle(WebhookReceived $event): void
    {
        if ($event->payload['type'] === 'checkout.session.completed') {
            StripePaymentHandler::make()
                ->setStripeSessionId($event->payload['data']['object']['id'])
                ->updatePaymentStatusSuccess()
                ->success();
        }
    }
}
