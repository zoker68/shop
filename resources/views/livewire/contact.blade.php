<div>
    <h4 class="text-[20px] sm:text-[28px] uppercase mb-1">{{ __('shop::contact.form.title') }}</h4>
    <p class="mb-6 text-[15px]">{{ __('shop::contact.form.text') }}</p>
    <form wire:submit.prevent="onSend">
        <div class="grid grid-cols-12 gap-5">
            <div class="col-span-12">
                <div>
                    <x-shop::form.label for="name" required="true">{{ __('shop::contact.form.name') }}</x-shop::form.label>
                    <x-shop::form.input id="name" type="text" required="true" wire:model="contact.name"/>
                    <x-shop::form.error name="contact.name"/>
                </div>
            </div>
            <div class="col-span-12">
                <x-shop::form.label for="email" required="true">{{ __('shop::contact.form.email') }}</x-shop::form.label>
                <x-shop::form.input id="email" type="email" required="true" wire:model="contact.email"/>
                <x-shop::form.error name="contact.email"/>
            </div>
            <div class="col-span-12">
                <x-shop::form.label for="subject" required="true">{{ __('shop::contact.form.subject') }}</x-shop::form.label>
                <x-shop::form.input id="subject" type="text" required="true" wire:model="contact.subject"/>
                <x-shop::form.error name="contact.subject"/>
            </div>
            <div class="col-span-12">
                <div class="single_billing_inp">
                    <x-shop::form.label for="message" required="true">{{ __('shop::contact.form.message') }}</x-shop::form.label>
                    <x-shop::form.textarea id="message" required="true" wire:model="contact.message"/>
                    <x-shop::form.error name="contact.message"/>
                </div>
            </div>
            <div class="col-span-12 mt-4">
                <button type="submit" class="default_btn xs_btn rounded px-4">{{ __('shop::contact.form.submit') }}</button>
            </div>
        </div>
    </form>
</div>
