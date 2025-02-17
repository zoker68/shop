<?php

namespace Zoker\Shop\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Zoker\Shop\Filament\Resources\OrderResource;
use Zoker\Shop\Models\Order;

class OrderCreatedAdministratorMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Order $order) {}

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('shop::order.confirmation.mail.admin.subject'),
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'shop::mail.order-created-administrator-mail',
            with: [
                'link' => OrderResource::getUrl('view', ['record' => $this->order]),
            ]
        );
    }
}
