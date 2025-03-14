@if (app('view')->exists('components.layouts.account'))
    <x-layouts.account>{{ $slot }}</x-layouts.account>
@else
<x-shop::layouts.app>
    <x-shop::partials.breadcrumbs :data="[['title' => __('shop::layout.account.breadcrumbs.account'), 'url' => route('account.profile.dashboard')]]"/>
    <div class="container grid grid-cols-12 gap-6 pb-14">
        <!--  account sidebar  -->
        <div x-data="{isOpen: false}" class="col-span-12 lg:col-span-3 relative">
            <div @click.outside="isOpen=false">
                <div class="box_shadow px-4 py-2 flex gap-5 items-center">
                    {{--
                    Avatar
                    <div class="w-12 border border-[#E9E4E4] rounded-full p-1">
                        <a href="my-account.html">
                            <img loading="lazy" src="assets/images/avatar-2.png" alt="user">
                        </a>
                    </div>--}}

                    <div class="acprof_cont">
                        <p>{{ __('shop::layout.account.welcome') }}</p>
                        <h4>{{ auth()->user()->name }} {{ auth()->user()->surname }}</h4>
                    </div>

                    <button @click="isOpen=!isOpen"
                            class="flex ml-auto border border-primary -mt-2 rounded  p-1 lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="M4 18q-.425 0-.712-.288Q3 17.425 3 17t.288-.712Q3.575 16 4 16h16q.425 0 .712.288q.288.287.288.712t-.288.712Q20.425 18 20 18Zm0-5q-.425 0-.712-.288Q3 12.425 3 12t.288-.713Q3.575 11 4 11h16q.425 0 .712.287q.288.288.288.713t-.288.712Q20.425 13 20 13Zm0-5q-.425 0-.712-.287Q3 7.425 3 7t.288-.713Q3.575 6 4 6h16q.425 0 .712.287Q21 6.575 21 7t-.288.713Q20.425 8 20 8Z" />
                        </svg>
                    </button>
                </div>

                <div :class="isOpen ? 'opacity-100 visible top-20' : 'opacity-0 invisible top-0'"
                     class="w-[300px] lg:w-full lg:mt-6 box_shadow px-4 py-6 bg-white absolute  lg:static lg:visible  lg:opacity-100 z-10 transition-all duration-300">
                    <div class="border-b pb-3">
                        <x-shop::partials.account.nav-top :active="request()->routeIs('account.profile.*')" href="{{ route('account.profile.dashboard') }}">
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                          d="M22 3H2c-1.09.04-1.96.91-2 2v14c.04 1.09.91 1.96 2 2h20c1.09-.04 1.96-.91 2-2V5a2.074 2.074 0 0 0-2-2m0 16H2V5h20v14m-8-2v-1.25c0-1.66-3.34-2.5-5-2.5c-1.66 0-5 .84-5 2.5V17h10M9 7a2.5 2.5 0 0 0-2.5 2.5A2.5 2.5 0 0 0 9 12a2.5 2.5 0 0 0 2.5-2.5A2.5 2.5 0 0 0 9 7m5 0v1h6V7h-6m0 2v1h6V9h-6m0 2v1h4v-1h-4"/>
                                </svg>
                            </span>
                            {{ __('shop::layout.account.dashboard') }}
                        </x-shop::partials.account.nav-top>
                        <x-shop::partials.account.nav-second route="account.profile.index">{{ __('shop::layout.account.profile') }}</x-shop::partials.account.nav-second>
                        <x-shop::partials.account.nav-second route="account.profile.address.index">{{ __('shop::layout.account.address') }}</x-shop::partials.account.nav-second>
                        <x-shop::partials.account.nav-second route="account.profile.password.edit">{{ __('shop::layout.account.password') }}</x-shop::partials.account.nav-second>
                    </div>
                    <div class="border-b mt-3 pb-3">
                        <x-shop::partials.account.nav-top :active="request()->routeIs('account.orders.*')" href="{{ route('account.orders.index') }}">
                            <span class="group-hover:text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="M12 5c-1.645 0-3 1.355-3 3c0 .353.073.684.188 1H4v6h1v13h22V15h1V9h-5.188c.115-.316.188-.647.188-1c0-1.645-1.355-3-3-3c-1.75 0-2.94 1.33-3.72 2.438c-.103.148-.188.292-.28.437c-.092-.145-.177-.29-.28-.438C14.94 6.33 13.75 5 12 5zm0 2c.626 0 1.436.67 2.063 1.563c.152.217.13.23.25.437H12c-.565 0-1-.435-1-1s.435-1 1-1zm8 0c.565 0 1 .435 1 1s-.435 1-1 1h-2.313c.12-.206.098-.22.25-.438C18.564 7.672 19.375 7 20 7zM6 11h20v2h-9v-1h-2v1H6v-2zm1 4h18v11h-8V16h-2v10H7V15z" />
                                </svg>
                            </span>
                            {{ __('shop::layout.account.orders') }}
                        </x-shop::partials.account.nav-top>
                    </div>
                    <div class="border-b mt-3 pb-3">
                        <x-shop::partials.account.nav-top :active="request()->routeIs(['account.wishlist'])" href="{{ route('account.wishlist') }}">
                            <span class="group-hover:text-primary">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </span>
                            {{ __('shop::layout.account.wishlist') }}
                        </x-shop::partials.account.nav-top>
                    </div>
                    <div class="mt-4">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                               class="flex gap-2 items-center text-[18px] font-medium hover:text-primary group">
                                <span class="group-hover:text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                                        <path fill="currentColor"
                                              d="M10.5 2.5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0v-6ZM13.743 4a.5.5 0 1 0-.499.867a6.5 6.5 0 1 1-6.494.004a.5.5 0 1 0-.5-.866A7.5 7.5 0 1 0 13.743 4Z" />
                                    </svg>
                                </span>
                                {{ __('shop::layout.account.logout') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- account content -->
        {{ $slot }}
    </div>
</x-shop::layouts.app>
@endif
