<x-shop::layouts.account>
    <div class="col-span-12 lg:col-span-9 box_shadow px-6 py-8">
        <div class="acprof_info_wrap shadow_sm">
            <h4 class="text-lg mb-3">{{ __('shop::auth.profile.title') }}</h4>

            @if (session('success'))
                <x-shop::partials.flash-alert type="success">{{ session('success') }}</x-shop::partials.flash-alert>
            @endif
            @if (session('info'))
                <x-shop::partials.flash-alert type="info">{{ session('info') }}</x-shop::partials.flash-alert>
            @endif

            <form action="{{ route('account.profile.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div>
                    <div class="sm:flex gap-6">
                        <div class="w-full">
                            <x-shop::form.label for="first_name"
                                          required="true">{{ __('shop::auth.profile.first_name') }}</x-shop::form.label>
                            <x-shop::form.input id="first_name" type="text" required="true"
                                          value="{{ old('name') ?? auth()->user()->name }}"
                                          name="name"/>
                            <x-shop::form.error name="name"/>
                        </div>
                        <div class="w-full mt-6 sm:mt-0">
                            <x-shop::form.label for="last_name"
                                          required="true">{{ __('shop::auth.profile.last_name') }}</x-shop::form.label>
                            <x-shop::form.input id="last_name" type="text" required="true"
                                          value="{{ old('surname') ?? auth()->user()->surname }}"
                                          name="surname"/>
                            <x-shop::form.error name="surname"/>
                        </div>
                    </div>
                    <div class="sm:flex gap-6 mt-6">
                        <div class="w-full">
                            <x-shop::form.label for="email" required="true">{{ __('shop::auth.profile.email') }}</x-shop::form.label>
                            <x-shop::form.input id="email" type="email" required="true" name="email"
                                          value="{{ old('email') ?? auth()->user()->email }}"/>
                            <x-shop::form.error name="email"/>
                        </div>
                        <div class="w-full mt-6 sm:mt-0">
                            <x-shop::form.label for="phone_number"
                                          required="true">{{ __('shop::auth.profile.phone') }}</x-shop::form.label>
                            <x-shop::form.input id="phone_number" type="text" required="true"
                                          value="{{ old('phone') ?? auth()->user()->phone }}"
                                          name="phone"/>
                            <x-shop::form.error name="phone"/>
                        </div>
                    </div>
                    <div class="sm:flex gap-6 mt-16 sm:mt-6">
                        <div class="w-full">
                            <x-shop::form.label for="birthday"
                                          required="true">{{ __('shop::auth.profile.birthday') }}</x-shop::form.label>
                            <x-shop::form.input id="birthday" type="date" required="true"
                                          value="{{ date('Y-m-d' ,strtotime( old('birthday') ?? auth()->user()->birthday))}}"
                                          min="{{ now()->subYears(100)->format('Y-m-d') }}"
                                          max="{{ now()->subYears(14)->format('Y-m-d') }}"
                                          name="birthday"/>
                            <x-shop::form.error name="birthday"/>
                        </div>
                        <div class="w-full mt-6 sm:mt-0">
                        </div>
                    </div>
                    <div class="sm:flex gap-6 mt-16 sm:mt-6">
                        <div class="w-full">
                            <x-shop::form.label for="company_name">{{ __('shop::auth.profile.company') }}</x-shop::form.label>
                            <x-shop::form.input id="company_name" type="text"
                                          value="{{ old('company') ?? auth()->user()->company }}"
                                          name="company"/>
                            <x-shop::form.error name="company"/>
                        </div>
                        <div class="w-full mt-6 sm:mt-0">
                            <x-shop::form.label for="vat_number">{{ __('shop::auth.profile.vat') }}</x-shop::form.label>
                            <x-shop::form.input id="vat_number" type="text" value="{{ old('vat') ?? auth()->user()->vat }}"
                                          name="vat"/>
                            <x-shop::form.error name="vat"/>
                        </div>
                    </div>
                    <div class="mt-8">
                        <button type="submit" class="default_btn rounded small">{{ __('shop::auth.profile.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-shop::layouts.account>
