<?php

namespace Zoker\Shop\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Zoker\Shop\Models\Order;

class OrderPaidMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public function __construct(public Order $order) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('shop::checkout.payment.success.mail.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'shop::mail.order-paid-mail',
        );
    }
}
