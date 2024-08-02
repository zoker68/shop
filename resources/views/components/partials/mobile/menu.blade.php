<!-- mobile menu -->
<div x-data x-show="$store.mobileMenu.isOpen" x-cloak
     class="lg:hidden fixed inset-0 w-full h-full z-30 overflow-hidden bg-[#00000070] cursor-default">

    <div x-show="$store.mobileMenu.isOpen" x-transition:enter="transition ease-in-out duration-500"
         x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="transition ease-in-out duration-500"
         x-transition:leave-end="-translate-x-full opacity-100" @click.outside="$store.mobileMenu.isOpen=false"
         class="relative w-[320px] h-full overflow-y-auto bg-white">
        <h5 class="text-center bg-primary text-white py-[14px] text-xl relative">
            Menu
            <button @click="$store.mobileMenu.isOpen=false"
                    class="absolute top-[17px] right-[15px] text-white text-center cursor-pointer">
                <svg width="20" height="20" viewBox="0 0 32 32">
                    <path fill="currentColor"
                          d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z" />
                </svg>
            </button>
        </h5>
        <ul x-data="menuModules">
            <template x-for="(menu, index) in menuModules.menuList">
                <li>
                    <button @click="toggleMenu(index)"
                            class="py-2.5 pr-[15px] pl-[25px] w-full text-secondary border-b border-dotted border-[#C8C8CE] hover:bg-[#efefef] transition-all duration-300 block text-left relative">
                        <span x-text="menu.name"></span>
                        <span :class="menu.isOpen ? 'rotate-180' : ''"
                              class="absolute top-2.5 right-[15px] text-center text-secondary transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                     stroke="currentColor" stroke-width="">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                    </button>

                    <div x-show="menu.isOpen" x-transition>
                        <template x-for="subMenu in menu.subMenus">
                            <a :href="subMenu.href" x-text="subMenu.name"
                               class="pl-12 py-2.5 pr-[15px] w-full text-secondary  border-b border-dotted border-[#C8C8CE] block hover:bg-[#efefef]">
                            </a>
                        </template>
                    </div>
                </li>
            </template>
        </ul>
    </div>
</div>
<!-- mobile menu end -->
