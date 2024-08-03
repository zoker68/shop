@props([
    'category'
])

@if($category->hasChildren())
    <div class="pb-4 border-b border-[#E9E4E4] mb-4">
        <div class="flex justify-between items-start">
            <h4 class="text-xl text-left font-medium mb-3 text-secondary uppercase">{{ __('zoker.shop::product-filter.sub_categories') }}</h4>
            <!-- close filter -->
            <button @click="isOpen=false"
                    class="text-primary hidden sm:block lg:hidden closefilter">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                     stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>
        </div>
        <div class="space-y-2">
            @foreach($category->getChildren() as $child)
                <x-product-filter.category :child="$child"/>
            @endforeach
        </div>
    </div>
@endif
