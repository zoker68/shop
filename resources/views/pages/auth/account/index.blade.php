<x-layouts.account>
    <div class="col-span-12 lg:col-span-9">
        <div class="account_cont_wrap">
            @if(session('success'))
                <x-partials.flash-alert type="success">{{ session('success') }}</x-partials.flash-alert>
            @endif
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-12 md:col-span-4 box_shadow p-6 min-h-[225px]">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg">{{ __('auth.dashboard.profile.title') }}</h4>
                        <a href="{{ route('account.profile.index') }}" class="text-primary">{{ __('auth.dashboard.profile.edit_link') }}</a>
                    </div>
                    <div class="mt-4">
                        <p class="font-semibold">{{ auth()->user()->name }} {{ auth()->user()->surname }}</p>
                        @if (auth()->user()->birthday)<p>{{ auth()->user()->birthday->format('d.m.Y') }}</p>@endif
                        <p>{{ auth()->user()->email }}</p>
                        <p>{{ auth()->user()->phone }}</p>
                    </div>
                </div>
                {{--<div class="col-span-12 md:col-span-4 box_shadow p-6 min-h-[225px]">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg">Shipping Address</h4>
                        <a href="profile-information.html" class="text-primary">Edit</a>
                    </div>
                    <div class="mt-4">
                        <p class="font-semibold">Ralph Bohner</p>
                        <p>3891 Ranchview Dr.</p>
                        <p>Richardson, Califora</p>
                        <p>(123) 456-789</p>
                    </div>
                </div>
                <div class="col-span-12 md:col-span-4 box_shadow p-6 min-h-[225px]">
                    <div class="flex justify-between items-center">
                        <h4 class="text-lg">Billing Address</h4>
                        <a href="profile-information.html" class="text-primary">Edit</a>
                    </div>
                    <div class="mt-4">
                        <p class="font-semibold">Ralph Bohner</p>
                        <p>3891 Ranchview Dr.</p>
                        <p>Richardson, Califora</p>
                        <p>(123) 456-789</p>
                    </div>
                </div>--}}
            </div>
            <div class="box_shadow px-6 py-8 mt-10">
                <h4 class="text-lg mb-6">{{ __('auth.dashboard.orders.title') }}</h4>
                @forelse($orders as $order)
                    <x-partials.account.order-card :order="$order"/>
                @empty
                    <x-partials.flash-alert type="info">{{ __('auth.orders.no_orders') }}</x-partials.flash-alert>
                @endforelse
            </div>
        </div>
    </div>
</x-layouts.account>

