<x-layouts.account>
    <div class="col-span-12 lg:col-span-9 box_shadow px-6 py-8">
        <div class="acprof_info_wrap shadow_sm">
            <h4 class="text-lg mb-3">{{ __('zoker.shop::auth.profile.title') }}</h4>

            @if (session('success'))
                <x-partials.flash-alert type="success">{{ session('success') }}</x-partials.flash-alert>
            @endif
            @if (session('info'))
                <x-partials.flash-alert type="info">{{ session('info') }}</x-partials.flash-alert>
            @endif

            <form action="{{ route('account.profile.update') }}" method="POST">
                @csrf
                @method('PATCH')
                <div>
                    <div class="sm:flex gap-6">
                        <div class="w-full">
                            <x-form.label for="first_name"
                                          required="true">{{ __('zoker.shop::auth.profile.first_name') }}</x-form.label>
                            <x-form.input id="first_name" type="text" required="true"
                                          value="{{ old('name') ?? auth()->user()->name }}"
                                          name="name"/>
                            <x-form.error name="name"/>
                        </div>
                        <div class="w-full mt-6 sm:mt-0">
                            <x-form.label for="last_name"
                                          required="true">{{ __('zoker.shop::auth.profile.last_name') }}</x-form.label>
                            <x-form.input id="last_name" type="text" required="true"
                                          value="{{ old('surname') ?? auth()->user()->surname }}"
                                          name="surname"/>
                            <x-form.error name="surname"/>
                        </div>
                    </div>
                    <div class="sm:flex gap-6 mt-6">
                        <div class="w-full">
                            <x-form.label for="email" required="true">{{ __('zoker.shop::auth.profile.email') }}</x-form.label>
                            <x-form.input id="email" type="email" required="true" name="email"
                                          value="{{ old('email') ?? auth()->user()->email }}"/>
                            <x-form.error name="email"/>
                        </div>
                        <div class="w-full mt-6 sm:mt-0">
                            <x-form.label for="phone_number"
                                          required="true">{{ __('zoker.shop::auth.profile.phone') }}</x-form.label>
                            <x-form.input id="phone_number" type="text" required="true"
                                          value="{{ old('phone') ?? auth()->user()->phone }}"
                                          name="phone"/>
                            <x-form.error name="phone"/>
                        </div>
                    </div>
                    <div class="sm:flex gap-6 mt-16 sm:mt-6">
                        <div class="w-full">
                            <x-form.label for="birthday"
                                          required="true">{{ __('zoker.shop::auth.profile.birthday') }}</x-form.label>
                            <x-form.input id="birthday" type="date" required="true"
                                          value="{{ date('Y-m-d' ,strtotime( old('birthday') ?? auth()->user()->birthday))}}"
                                          min="{{ now()->subYears(100)->format('Y-m-d') }}"
                                          max="{{ now()->subYears(14)->format('Y-m-d') }}"
                                          name="birthday"/>
                            <x-form.error name="birthday"/>
                        </div>
                        <div class="w-full mt-6 sm:mt-0">
                        </div>
                    </div>
                    <div class="sm:flex gap-6 mt-16 sm:mt-6">
                        <div class="w-full">
                            <x-form.label for="company_name">{{ __('zoker.shop::auth.profile.company') }}</x-form.label>
                            <x-form.input id="company_name" type="text"
                                          value="{{ old('company') ?? auth()->user()->company }}"
                                          name="company"/>
                            <x-form.error name="company"/>
                        </div>
                        <div class="w-full mt-6 sm:mt-0">
                            <x-form.label for="vat_number">{{ __('zoker.shop::auth.profile.vat') }}</x-form.label>
                            <x-form.input id="vat_number" type="text" value="{{ old('vat') ?? auth()->user()->vat }}"
                                          name="vat"/>
                            <x-form.error name="vat"/>
                        </div>
                    </div>
                    <div class="mt-8">
                        <button type="submit" class="default_btn rounded small">{{ __('zoker.shop::auth.profile.save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-layouts.account>
