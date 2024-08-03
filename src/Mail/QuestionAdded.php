<?php

namespace Zoker\Shop\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Zoker\Shop\Filament\Resources\ProductQuestionResource;
use Zoker\Shop\Models\Product;
use Zoker\Shop\Models\ProductQuestion;

class QuestionAdded extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(private Product $product, private ProductQuestion $question) {}

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('zoker.shop::product.questions.new.mail.subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.question-added',
            with: [
                'product' => $this->product,
                'question' => $this->question,
                'link' => ProductQuestionResource::getUrl('edit', ['record' => $this->question]),
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
