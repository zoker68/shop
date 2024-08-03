<?php

namespace Zoker68\Shop\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Zoker68\Shop\Filament\Resources\ProductReviewResource;
use Zoker68\Shop\Models\Product;
use Zoker68\Shop\Models\ProductReview;

class ReviewAdded extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private Product $product, private ProductReview $review) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('zoker68.shop::product.reviews.new.mail.subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.review-added',
            with: [
                'product' => $this->product,
                'review' => $this->review,
                'link' => ProductReviewResource::getUrl('edit', ['record' => $this->review]),
            ]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
