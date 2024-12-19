<x-layouts.mail>
    <x-slot:header>{{ __('shop::contact.mail.title') }}</x-slot:header>

    <p class="pt-3">{{ __('shop::contact.form.name') }}: <strong>{{ $contact['name'] }}</strong></p>
    <p class="pt-3">{{ __('shop::contact.form.email') }}: <strong>{{ $contact['email'] }}</strong></p>
    <p class="pt-3">{{ __('shop::contact.form.subject') }}: <strong>{{ $contact['subject'] }}</strong></p>
    <p class="pt-3">{{ __('shop::contact.form.message') }}:</p>
    <p><strong>{{ $contact['message'] }}</strong></p>
</x-layouts.mail>
