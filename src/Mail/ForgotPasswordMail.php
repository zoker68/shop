<?php

namespace Zoker\Shop\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Zoker\Shop\Models\User;

class ForgotPasswordMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private string $link;

    /**
     * Create a new message instance.
     */
    public function __construct(private User $user)
    {
        $this->link = $this->user->resetPasswordLink();
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: __('zoker.shop::auth.forgot_password.mail.subject'),
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mail.auth.forgot-password',
            with: [
                'link' => $this->link,
                'user' => $this->user,
                'expire' => config('auth.reset_password.expire'),
            ],
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

    public function getLink()
    {
        if (app()->environment('testing')) {
            return $this->link;
        }
    }
}
