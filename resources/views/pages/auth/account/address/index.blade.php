<x-layouts.account>
    <div class="col-span-12 lg:col-span-9 box_shadow px-6 py-8">
        <div class="acprof_info_wrap shadow_sm">

            @if(session('success'))
                <x-shop::partials.flash-alert type="success">{{ session('success') }}</x-shop::partials.flash-alert>
            @endif

            <h4 class="text-lg mb-3">{{ __('shop::auth.address.title') }}</h4>

            @forelse($addresses as $id => $address)
                <div class="md:flex justify-between items-center border rounded p-2 mb-2 ">
                    <div class="mt-6 md:mt-0">
                        <h5>{{ $address }}</h5>
                    </div>

                    <div class="flex justify-between md:gap-3 items-center mt-4 md:mt-0">
                        <a href="{{ route('account.profile.address.edit', $id) }}"><x-heroicon-o-pencil-square class="h-6 w-6" /></a>
                        <form action="{{ route('account.profile.address.destroy', $id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"><x-heroicon-o-trash class="h-6 w-6"/></button>
                        </form>
                    </div>
                </div>
            @empty
                <x-shop::partials.flash-alert type="info">{{ __('shop::auth.address.error.no_addresses') }}</x-shop::partials.flash-alert>
            @endforelse
        </div>
    </div>
</x-layouts.account>
