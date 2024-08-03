<div class="col-span-12 lg:col-span-9">
    <form wire:submit="onSave">
        <h4 class="text-lg mb-3">{{ __('zoker.shop::auth.address.title_edit') }}</h4>

        <div class="sm:flex md:block lg:flex gap-6 mt-6">
            <div class="w-full @if(count($regions)) sm:w-1/2 md:w-full lg:w-1/2 @endif">
                <x-form.label for="country" required="true">{{ __('zoker.shop::auth.address.country.label') }}</x-form.label>
                <x-form.select :options="$countries" id="country" required="true"
                               wire:model.live="addressData.country_id"
                               placeholder="{{ __('zoker.shop::auth.address.country.placeholder') }}"/>
                <x-form.error name="addressData.country_id"/>
            </div>
            @if(count($regions) > 0)
                <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                    <x-form.label for="region">{{ __('zoker.shop::auth.address.region.label') }}</x-form.label>
                    <x-form.select :options="$regions" id="region"
                                   wire:model="addressData.region_id"
                                   placeholder="{{ __('zoker.shop::auth.address.region.placeholder') }}"/>
                    <x-form.error name="addressData.region_id"/>
                </div>
            @endif
        </div>
        <div class="sm:flex md:block lg:flex gap-6 mt-6">
            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2">
                <x-form.label for="town_city" required="true">{{ __('zoker.shop::auth.address.city') }}</x-form.label>
                <x-form.input id="town_city" type="text" required="true"
                              wire:model="addressData.city"/>
                <x-form.error name="addressData.city"/>
            </div>
            <div class="w-full sm:w-1/2 md:w-full lg:w-1/2 mt-6 lg:mt-0">
                <x-form.label for="zip_code" required="true">{{ __('zoker.shop::auth.address.zip') }}</x-form.label>
                <x-form.input id="zip_code" type="text" required="true"
                              wire:model="addressData.zip"/>
                <x-form.error name="addressData.zip"/>
            </div>
        </div>
        <div class="mt-4">
            <x-form.label for="street_addr" required="true">{{ __('zoker.shop::auth.address.address') }}</x-form.label>
            <x-form.input id="street_addr" type="text" required="true"
                          wire:model="addressData.address"/>
            <x-form.error name="addressData.address"/>
        </div>
        <div class="mt-4">
            <x-form.button type="submit" class="w-36">{{ __('zoker.shop::auth.address.submit') }}</x-form.button>
        </div>
    </form>
</div>
