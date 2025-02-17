<?php

namespace Zoker\Shop\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Zoker\Shop\Models\Order;

class OrderCreatedCustomerMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Order $order) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('shop::order.confirmation.mail.customer.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'shop::mail.order-created-customer-mail',
        );
    }
}
