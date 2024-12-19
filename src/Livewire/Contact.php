<?php

namespace Zoker\Shop\Livewire;

use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Livewire\Component;
use Zoker\Shop\Mail\ContactFormMail;
use Zoker\Shop\Traits\Livewire\Alertable;

class Contact extends Component
{
    use Alertable;

    public array $contact = [];

    public function getRules(): array
    {
        return [
            'contact.name' => 'required|min:2|max:40',
            'contact.email' => 'required|email',
            'contact.subject' => 'required|min:2',
            'contact.message' => 'required|min:5',
        ];
    }

    protected function getMessages(): array
    {
        return [
            'contact.name.required' => __('shop::contact.error.name.required'),
            'contact.name.min' => __('shop::contact.error.name.min'),
            'contact.name.max' => __('shop::contact.error.name.max'),
            'contact.email.required' => __('shop::contact.error.email.required'),
            'contact.email.email' => __('shop::contact.error.email.email'),
            'contact.subject.required' => __('shop::contact.error.subject.required'),
            'contact.subject.min' => __('shop::contact.error.subject.min'),
            'contact.message.required' => __('shop::contact.error.message.required'),
            'contact.message.min' => __('shop::contact.error.message.min'),
        ];
    }

    public function render(): View
    {
        return view('shop::livewire.contact');
    }

    public function onSend(): void
    {
        $data = $this->validate()['contact'];

        Mail::to(config('shop.mail_recipients.contact'))->queue(new ContactFormMail($data));

        $this->contact = [];
        $this->throwAlert('success', __('shop::contact.success'));
    }
}
