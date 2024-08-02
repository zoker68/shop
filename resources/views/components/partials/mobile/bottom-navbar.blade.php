<!-- mobile bottom bar -->
<div x-data class="fixed left-0 bottom-0 w-full bg-white border-t border-[#cacaca] p-3 z-20 lg:hidden">
    <div class="flex items-center justify-evenly">
        <!-- menu -->
        <button @click="$store.mobileMenu.isOpen=true"
                class="relative text-secondary flex flex-col justify-center items-center text-center transition-all">
                <span class="text-secondary">
                    <svg width="24" height="24" viewBox="0 0 24 24">
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="M4 6h16M4 12h16M4 18h16" /></svg>
                </span>
            <span class="text-[11px] leading-[10px] mt-1 text-secondary">Menu</span>
        </button>

        <!-- Categories -->
        <button @click="$store.category.isCategory=true"
                class="relative text-secondary flex flex-col justify-center items-center text-center transition-all">
                <span class="text-secondary">
                    <svg width="22" height="22" viewBox="0 0 2048 2048">
                        <path fill="currentColor"
                              d="M2048 384v128H512V384h1536zM512 896h1536v128H512V896zm0 512h1536v128H512v-128zM0 256h384v384H0V256zm128 256h128V384H128v128zM0 768h384v384H0V768zm128 256h128V896H128v128zM0 1280h384v384H0v-384zm128 256h128v-128H128v128z" />
                    </svg>
                </span>
            <span class="text-[11px] leading-[10px] mt-1 text-secondary">Categories</span>
        </button>

        <!-- Search -->
        <button @click="$store.search.isSearch=true"
                class="relative text-secondary flex flex-col justify-center items-center text-center">
                <span class="text-secondary">
                    <svg width="26" height="26" viewBox="0 0 28 28">
                        <path fill="currentColor"
                              d="M11.5 2.75a8.75 8.75 0 0 1 6.695 14.384l6.835 6.836a.75.75 0 0 1-.976 1.133l-.084-.073l-6.836-6.835A8.75 8.75 0 1 1 11.5 2.75Zm0 1.5a7.25 7.25 0 1 0 0 14.5a7.25 7.25 0 0 0 0-14.5Z" />
                    </svg>
                </span>
            <span class="text-[11px] leading-[10px] mt-1 text-secondary">Search</span>
        </button>

        <!-- Cart -->
        <button @click="$store.cart.isCart=true"
                class="relative text-secondary flex flex-col justify-center items-center text-center">
                <span class="relative block text-secondary">
                    <svg width="22" height="22" viewBox="0 0 32 32">
                        <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                           stroke-width="2">
                            <path d="M6 6h24l-3 13H9m18 4H10L5 2H2" />
                            <circle cx="25" cy="27" r="2" />
                            <circle cx="12" cy="27" r="2" />
                        </g>
                    </svg>
                </span>
            <span class="text-[11px] leading-[10px] mt-1 text-secondary">Cart</span>
            <span
                class="absolute text-white bg-primary text-[11px] rounded-full w-[18px] h-[18px] leading-[18px] -right-1 -top-[8px]">8</span>
        </button>
    </div>
</div>
<!-- mobile bottom bar -->
