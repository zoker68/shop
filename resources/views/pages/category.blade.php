<x-zoker.shop::layouts.app>
    <x-zoker.shop::partials.breadcrumbs :data="$category->getBreadcrumbs()"/>

    <div class="pb-14 relative">
        <div class="container">
            <div x-data="{isOpen:false}" class="grid grid-cols-4 relative gap-6">

                @livewire(\Zoker\Shop\Livewire\ProductsFilter::class, ['category' => $category], key($category->id))


                <div x-data class="col-span-4 lg:col-span-3">
                    <div class="flex items-center">
                        <div class="lg:hidden block pr-4">
                            <button @click="isOpen=true"
                                    class="pt-2 pb-[9px] border border-primary px-2.5 min-w-[150px] primary-btn"
                                    id="mobile_filter_btn">{{ __('zoker.shop::products.filter.mobile_link') }}</button>
                        </div>

                        <div class="cursor-pointer hidden sm:block">
                            <select class="nice-select z-1 w-48 products_sortings" x-on:change="$dispatch('changeSort', { sort: $event.target.value })">
                                <option value="" disabled selected>{{ __('zoker.shop::products.sort_by') }}</option>
                                @foreach($sortOptions as $key => $option)
                                    <option value="{{ $key }}">{{ $option }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex items-center ml-auto">
                            <button @click="$dispatch('changeViewType', { type: 'grid' })" class="changeViewType">
                                <div id="change_view_type_grid"
                                    class="w-10 h-8 border border-primary @if($viewType == 'grid') bg-primary text-white @endif text-center rounded-[3px] ml-2.5 flex items-center justify-center">
                                    <svg width="20" height="20" viewBox="0 0 20 20">
                                        <path fill="currentColor" fill-rule="evenodd"
                                              d="M8 4H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm7 0h-3a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-7 7H5a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1zm7 0h-3a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h3a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1z"
                                              clip-rule="evenodd" /></svg>
                                </div>
                            </button>
                            <button @click="$dispatch('changeViewType', { type: 'list' })" class="changeViewType">
                                <div id="change_view_type_list"
                                    class="w-10 h-8 border border-primary @if($viewType == 'list') bg-primary text-white @endif text-center rounded-[3px] ml-2.5  flex items-center justify-center">
                                    <svg width="20" height="20" viewBox="0 0 48 48">
                                        <g fill="none">
                                            <path d="M20 24h24h-24Z" clip-rule="evenodd" />
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="4" d="M20 24h24" />
                                            <path d="M20 38h24h-24Z" clip-rule="evenodd" />
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="4" d="M20 38h24" />
                                            <path d="M20 10h24h-24Z" clip-rule="evenodd" />
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                  stroke-width="4" d="M20 10h24" />
                                            <path stroke="currentColor" stroke-linejoin="round" stroke-width="4"
                                                  d="M4 34h8v8H4zm0-14h8v8H4zM4 6h8v8H4z" />
                                        </g>
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>

                    <livewire:products :category="$category" />

                </div>
            </div>
        </div>
    </div>

</x-zoker.shop::layouts.app>
