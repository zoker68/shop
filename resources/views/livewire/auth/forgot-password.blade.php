<div class="w-full max-w-[500px] mx-auto box_shadow px-6 py-8 mb-14">
    @if(session('forgot-password-success'))
    <x-partials.flash-alert type="success">
        {{ __('zoker68.shop::auth.forgot_password.success') }}
    </x-partials.flash-alert>
    @endif
    <h2 class="text-[28px] uppercase">{{ __('zoker68.shop::auth.forgot_password.title') }}</h2>
    <p class="text_md mb-4">{{ __('zoker68.shop::auth.forgot_password.text') }}</p>
    <form wire:submit="forgotPasswordSubmit">
        <div class="mt-6">
            <x-form.label :required="true">{{ __('zoker68.shop::auth.forgot_password.form.email') }}</x-form.label>
            <x-form.input :required="true" type="email" wire:model="email" placeholder="mail@example.com"/>
            <x-form.error name="email"/>
        </div>
        <div class="mt-6">
            <x-form.button>{{ __('zoker68.shop::auth.forgot_password.form.submit') }}</x-form.button>
        </div>
    </form>
</div>
