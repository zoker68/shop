<!-- mobile cart -->
<div x-data x-show="$store.cart.isCart" :class="$store.cart.isCart ? 'opacity-100 visible' : 'opacity-0 invisible'"
     x-cloak
     class="lg:hidden fixed inset-0 w-full h-full z-30 overflow-hidden bg-[#00000070] cursor-default transition-all duration-500">

    <div x-show="$store.cart.isCart" x-transition:enter="transition ease-in-out duration-500"
         x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="transition ease-in-out duration-500"
         x-transition:leave-end="-translate-x-full opacity-100" @click.away="$store.cart.isCart=false"
         class="relative w-[320px] h-full overflow-y-auto bg-white flex flex-col transition-all duration-500">
        <h5 class="text-center bg-primary text-white py-[14px] text-xl relative mb-2">
            Cart
            <button @click="$store.cart.isCart=false"
                    class="absolute top-[17px] right-[15px] text-white text-center cursor-pointer" id="CartClose">
                <svg width="20" height="20" viewBox="0 0 32 32">
                    <path fill="currentColor"
                          d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z" />
                </svg>
            </button>
        </h5>

        <div class="p-4 flex-grow flex flex-col">
            <div class="mb-3 border-b border-[#d8d8d8]">
                <h4 class="text-base mb-1.5 font-medium text-secondary">Total 2 Items</h4>
            </div>
            <div>
                <a href="product-view.html" class="flex relative pr-5 mb-4">
                        <span
                            class="absolute right-0 cursor-pointer text-secondary hover:text-primary transition duration-300">
                            <svg width="16" height="16" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                      d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z" />
                            </svg>
                        </span>
                    <div class="flex-shrink-0">
                        <img src="{{ asset('assets/images/shoes-5.png') }}" class="w-[75px] h-[60px] object-contain" alt="product">
                    </div>
                    <div class="flex-grow pl-4">
                        <h5 class="text-base text-secondary font-medium hover:text-primary transition duration-300">
                            Men casual shoes
                        </h5>
                        <p class="text-sm text-[#464545]">x1 <span class="ml-2 text-sm text-[#464545]">$450</span>
                        </p>
                    </div>
                </a>
                <a href="product-view.html" class="flex relative pr-5 mb-4">
                        <span
                            class="absolute right-0 cursor-pointer text-secondary hover:text-primary transition duration-300">
                            <svg width="16" height="16" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                      d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z" />
                            </svg>
                        </span>
                    <div class="flex-shrink-0">
                        <img src="{{ asset('assets/images/headphone-2.png') }}" class="w-[75px] h-[60px] object-contain"
                             alt="product">
                    </div>
                    <div class="lex-grow pl-4">
                        <h5 class="text-base text-secondary font-medium hover:text-primary transition duration-300">
                            Men casual shoes
                        </h5>
                        <p class="text-sm text-[#464545]">x1 <span class="ml-2 text-sm text-[#464545]">$450</span>
                        </p>
                    </div>
                </a>
            </div>

            <div class="mt-auto">
                <div class="mt-4 pt-4 border-t border-[#d8d8d8] flex justify-between">
                    <h4 class="text-base font-medium text-secondary">SUB TOTAL:</h4>
                    <h4 class="text-base font-medium text-secondary">$980.00</h4>
                </div>
                <div class="mt-4 flex gap-4">
                    <a href="shopping-cart.html" class="primary-btn px-2 py-[9px] w-1/2 text-sm">VIEW CART</a>
                    <a href="checkout.html"
                       class="primary-btn px-2 py-[9px] w-1/2 bg-white hover:bg-primary text-primary hover:text-white text-sm">CHECKOUT</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- mobile cart end -->
