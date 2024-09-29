<!-- top header -->
<header class="py-3 hidden lg:block">
    <div class="container flex justify-between items-center">
        <!-- logo -->
        <x-shop::partials.logo/>
        <!-- logo end -->

        <!-- nav -->
        <x-shop::partials.heater-menu/>
        <!-- nav end-->

        <!-- right-content -->
        <div class="flex items-center">
            @auth()
                <a href="{{ route('account.profile.dashboard') }}" class="mr-4">{{ __('shop::layout.header.account') }}</a>
            @endauth
            @guest()
            <!-- login/register -->
            <div class="mr-4 flex items-center">
                <a href="{{ route('login') }}"
                   class="text-secondary text-sm hover:text-primary font-medium leading-[26px] transition duration-200">{{ __('shop::layout.header.login') }}</a>
                <span class="text-secondary text-sm">/</span>
                @if(Route::has('register'))
                <a href="{{ route('register') }}"
                   class="text-secondary text-sm hover:text-primary font-medium leading-[26px] transition duration-200">{{ __('shop::layout.header.registration') }}</a>
                @endif
            </div>
            @endguest

        </div>
        <!-- right-content end-->
    </div>
</header>
<!-- top header end -->
