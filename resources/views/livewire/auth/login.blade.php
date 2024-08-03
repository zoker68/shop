<div class="w-full max-w-[500px] mx-auto box_shadow rounded px-[30px] py-[24px] mb-14">
    <h4 class="text-[28px] uppercase font-medium">{{ __('shop::auth.login.title') }}</h4>
    <p class="mb-4 text_md">{{ __('shop::auth.login.text') }}</p>
    <form wire:submit="login">
        <div>
            <div>
                <x-shop::form.label :required="true">{{ __('shop::auth.login.form.email') }}</x-shop::form.label>
                <x-shop::form.input :required="true" type="email" wire:model.blur="email" name="email"
                              placeholder="mail@example.com"/>
                <x-shop::form.error name="email"/>
            </div>

            <div class="mt-4">
                <x-shop::form.label :reqired="true">{{ __('shop::auth.login.form.password') }}</x-shop::form.label>
                <x-shop::form.input :reqired="true" type="password" wire:model="password" placeholder="********"/>
                <x-shop::form.error name="password"/>
            </div>

            <div class="flex justify-between items-center mt-6">
                <div class="flex gap-3 items-center">
                </div>
                <div>
                    <a href="{{  route('forgot-password') }}" class="text-primary text-sm sm:text-base">
                        {{ __('shop::auth.login.forgot_password') }}
                    </a>
                </div>
            </div>

        </div>
        <div class="mt-4">
            <x-shop::form.button>{{ __('shop::auth.login.form.submit') }}</x-shop::form.button>
        </div>
    </form>
</div>
