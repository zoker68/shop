<div class="w-full max-w-[500px] mx-auto box_shadow px-6 py-8 mb-14">
    @if(session('forgot-password-success'))
    <x-shop::partials.flash-alert type="success">
        {{ __('shop::auth.forgot_password.success') }}
    </x-shop::partials.flash-alert>
    @endif
    <h2 class="text-[28px] uppercase">{{ __('shop::auth.forgot_password.title') }}</h2>
    <p class="text_md mb-4">{{ __('shop::auth.forgot_password.text') }}</p>
    <form wire:submit="forgotPasswordSubmit">
        <div class="mt-6">
            <x-shop::form.label :required="true">{{ __('shop::auth.forgot_password.form.email') }}</x-shop::form.label>
            <x-shop::form.input :required="true" type="email" wire:model="email" placeholder="mail@example.com"/>
            <x-shop::form.error name="email"/>
        </div>
        <div class="mt-6">
            <x-shop::form.button>{{ __('shop::auth.forgot_password.form.submit') }}</x-shop::form.button>
        </div>
    </form>
</div>
