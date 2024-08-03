<div class="col-span-12 lg:col-span-9">
    <form wire:submit="onSave">
        <h4 class="text-lg mb-3">{{ __('shop::auth.address.title_edit') }}</h4>

        <div class="sm:flex md:block lg:flex gap-6 mt-6">
            <div class="w-full @if(count($regions)) sm:w-1/2 md:w-full lg:w-1/2 @endif">
                <x-shop::form.label for="country" required="true">{{ __('shop::auth.address.country.label') }}</x-shop::form.label>
                <x-shop::form.select :options="$countries" id="country" required="true"
                               wire:model.live="addressData.country_id"
                               placeholder="{{ __('shop::auth.address.country.placeholder') }}"/>
                <x-shop::form.error name="addressData.country_id"/>
            </div>
            @if(count($regions) > 0)
                <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                    <x-shop::form.label for="region">{{ __('shop::auth.address.region.label') }}</x-shop::form.label>
                    <x-shop::form.select :options="$regions" id="region"
                                   wire:model="addressData.region_id"
                                   placeholder="{{ __('shop::auth.address.region.placeholder') }}"/>
                    <x-shop::form.error name="addressData.region_id"/>
                </div>
            @endif
        </div>
        <div class="sm:flex md:block lg:flex gap-6 mt-6">
            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                <x-shop::form.label for="town_city" required="true">{{ __('shop::auth.address.city') }}</x-shop::form.label>
                <x-shop::form.input id="town_city" type="text" required="true"
                              wire:model="addressData.city"/>
                <x-shop::form.error name="addressData.city"/>
            </div>
            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                <x-shop::form.label for="zip_code" required="true">{{ __('shop::auth.address.zip') }}</x-shop::form.label>
                <x-shop::form.input id="zip_code" type="text" required="true"
                              wire:model="addressData.zip"/>
                <x-shop::form.error name="addressData.zip"/>
            </div>
        </div>
        <div class="mt-4">
            <x-shop::form.label for="street_addr" required="true">{{ __('shop::auth.address.address') }}</x-shop::form.label>
            <x-shop::form.input id="street_addr" type="text" required="true"
                          wire:model="addressData.address"/>
            <x-shop::form.error name="addressData.address"/>
        </div>
        <div class="mt-4">
            <x-shop::form.button type="submit" class="w-36">{{ __('shop::auth.address.submit') }}</x-shop::form.button>
        </div>
    </form>
</div>
