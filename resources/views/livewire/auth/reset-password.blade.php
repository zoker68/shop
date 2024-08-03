<div class="w-full max-w-[500px] mx-auto box_shadow px-6 py-8 mb-14">
    <h2 class="text-[28px] uppercase">{{ __('shop::auth.reset_password.title') }}</h2>
    <p class="text_md mb-4">{{ __('shop::auth.reset_password.text') }}</p>
    <form wire:submit="resetPasswordSubmit">
        <div class="mt-6">
            <x-form.label :required="true">{{ __('shop::auth.reset_password.form.password') }}</x-form.label>
            <x-form.input :required="true" type="password" wire:model.blur="password" />
            <x-form.error name="password"/>
        </div>
        <div class="mt-6">
            <x-form.label :required="true">{{ __('shop::auth.reset_password.form.password_confirmation') }}</x-form.label>
            <x-form.input :required="true" type="password" wire:model="password_confirmation" />
            <x-form.error name="password"/>
        </div>
        <div class="mt-6">
            <x-form.button>{{ __('shop::auth.reset_password.form.submit') }}</x-form.button>
        </div>
    </form>
</div>
