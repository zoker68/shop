<!-- mobile searchbar -->
<div x-data x-show="$store.search.isSearch" x-transition:enter="transition ease-in-out duration-500"
     x-transition:enter-start="-translate-y-full opacity-0" x-transition:enter-end="translate-y-0 opacity-100"
     x-transition:leave="transition ease-in-out duration-500" x-transition:leave-end="-translate-y-full opacity-100"
     :class="$store.search.isSearch ? 'opacity-100 visible' : 'opacity-0 invisible'" x-cloak
     class="fixed left-0 top-0 w-full h-full bg-white z-20 p-[30px] transition-all duration-500">
    <div class="relative">
        <p class="text-xs mb-3 text-[#8a8a8a]">WHAT YOU ARE LOOKING FOR?</p>
        <!-- close -->
        <button @click="$store.search.isSearch=false" class="absolute top-0 right-0 cursor-pointer text-secondary">
            <svg width="20" height="20" viewBox="0 0 32 32">
                <path fill="currentColor"
                      d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z" />
            </svg>
        </button>
    </div>
    <!-- search input -->
    <form class="relative">
        <div class="border-b border-[#c3c3c3] z-50">
            <input type="text" placeholder="search products..."
                   class="w-full focus:outline-none  focus:ring-0 border-none pr-2.5 py-[5px] text-secondary text-lg">
        </div>
        <button class="absolute right-0 top-[8px] border-none bg-transparent">
            <svg width="20" height="20" viewBox="0 0 28 28">
                <path fill="currentColor"
                      d="M11.5 2.75a8.75 8.75 0 0 1 6.695 14.384l6.835 6.836a.75.75 0 0 1-.976 1.133l-.084-.073l-6.836-6.835A8.75 8.75 0 1 1 11.5 2.75Zm0 1.5a7.25 7.25 0 1 0 0 14.5a7.25 7.25 0 0 0 0-14.5Z">
                </path>
            </svg>
        </button>
    </form>
    <!-- search product -->
    <div class="overflow-y-auto pt-4">
        <a href="product-view.html"
           class="flex items-center border-b border-[#ebebeb] py-2 hover:bg-[#f2f0f0] transition duration-300">
            <div class="w-[90px] p-2.5">
                <img src="{{ asset('assets/images/laptop-2.png') }}" class="w-full h-[50px] object-contain flex-shrink-0"
                     alt="product">
            </div>
            <div class="pl-2">
                <h4 class="text-lg font-medium mb-1.5 text-secondary">HP Pavilion 15</h4>
                <div>
                    <span class="text-primary mr-[5px] leading-[22px] text-base font-medium">$45.00</span>
                    <span class="text-sm text-[#687188] font-medium leading-[22px]">$55.45</span>
                </div>
            </div>
        </a>
        <a href="product-view.html"
           class="flex items-center border-b border-[#ebebeb] py-2 hover:bg-[#f2f0f0] transition duration-300">
            <div class="w-[90px] p-2.5">
                <img loading="lazy" src="{{ asset('assets/images/phone-1.png') }}"
                     class="w-full h-[50px] object-contain flex-shrink-0" alt="product">
            </div>
            <div class="pl-2">
                <h4 class="text-lg font-medium mb-1.5 text-secondary">Xiaomi Note 7 Pro</h4>
                <div class="price">
                    <span class="text-primary mr-[5px] leading-[22px] text-base font-medium">$45.00</span>
                    <span class="text-sm text-[#687188] font-medium leading-[22px]">$55.45</span>
                </div>
            </div>
        </a>
    </div>
</div>
<!-- mobile searchbar end -->
