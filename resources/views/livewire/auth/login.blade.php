<div class="w-full max-w-[500px] mx-auto box_shadow rounded px-[30px] py-[24px] mb-14">
    <h4 class="text-[28px] uppercase font-medium">{{ __('zoker.shop::auth.login.title') }}</h4>
    <p class="mb-4 text_md">{{ __('zoker.shop::auth.login.text') }}</p>
    <form wire:submit="login">
        <div>
            <div>
                <x-form.label :required="true">{{ __('zoker.shop::auth.login.form.email') }}</x-form.label>
                <x-form.input :required="true" type="email" wire:model.blur="email" name="email"
                              placeholder="mail@example.com"/>
                <x-form.error name="email"/>
            </div>

            <div class="mt-4">
                <x-form.label :reqired="true">{{ __('zoker.shop::auth.login.form.password') }}</x-form.label>
                <x-form.input :reqired="true" type="password" wire:model="password" placeholder="********"/>
                <x-form.error name="password"/>
            </div>

            <div class="flex justify-between items-center mt-6">
                <div class="flex gap-3 items-center">
                </div>
                <div>
                    <a href="{{  route('forgot-password') }}" class="text-primary text-sm sm:text-base">
                        {{ __('zoker.shop::auth.login.forgot_password') }}
                    </a>
                </div>
            </div>

        </div>
        <div class="mt-4">
            <x-form.button>{{ __('zoker.shop::auth.login.form.submit') }}</x-form.button>
        </div>
    </form>
</div>
