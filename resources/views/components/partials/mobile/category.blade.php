<!-- mobile category -->
<div x-data x-show="$store.category.isCategory"
     :class="$store.category.isCategory ? 'opacity-100 visible' : 'opacity-0 invisible'" x-cloak
     class="lg:hidden fixed left-0 top-0 w-full h-full z-30 overflow-hidden bg-[#00000070] cursor-default transition-all duration-500">

    <div x-show="$store.category.isCategory" x-transition:enter="transition ease-in-out duration-500"
         x-transition:enter-start="-translate-x-full opacity-0" x-transition:enter-end="translate-x-0 opacity-100"
         x-transition:leave="transition ease-in-out duration-500"
         x-transition:leave-end="-translate-x-full opacity-100" @click.away="$store.category.isCategory=false"
         class="relative w-[320px] h-full overflow-y-auto bg-white transition-all duration-500">
        <h5 class="text-center bg-primary text-white py-[14px] text-xl relative mb-2">
            All categories
            <button @click="$store.category.isCategory=false"
                    class="absolute top-[17px] right-[15px] text-white text-center cursor-pointer">
                <svg width="20" height="20" viewBox="0 0 32 32">
                    <path fill="currentColor"
                          d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z" />
                </svg>
            </button>
        </h5>

        <!-- category wrapper -->
        <div x-data="categoryModules">
            <template x-for="(category, catIndex) in categoryList">
                <div class="single-mobile-menu">
                    <!-- category -->
                    <button @click="openMainCat(catIndex)"
                            class="mobile-submenu-open relative flex flex-wrap items-center border-b border-dotted border-[#C8C8CE] px-5 w-full text-[#222] transition duration-300 hover:bg-[#EFEFEF]">
                        <!-- icon -->
                        <span class="w-11 text-[#f4cad0] font-black" x-html="category.icon"></span>

                        <!-- name -->
                        <span class="text-[15px] cursor-pointer text-[#222] py-2.5" x-text="category.name"></span>

                        <!-- arrow down -->
                        <span x-show="category.subCategories" :class="category.isOpen ? 'rotate-180' : ''"
                              class="mobile-menu-icon absolute top-2.5 right-[15px] text-center text-[#222]">
                                <svg xmlns="http://www.w3.org/2000/svg" class="arrow-icon h-5 w-5" fill="none"
                                     viewBox="0 0 24 24" stroke="currentColor" stroke-width="">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </span>
                    </button>

                    <!-- sub menus -->
                    <template x-if="category.subCategories">
                        <div x-show="category.isOpen" class="sub-menu static h-auto pt-2.5 pl-[64px] w-full pr-5">
                            <div class="w-full">
                                <template x-for="(subCat, subCatIndex) in category.subCategories">
                                    <div class="category-mobile-submenu">
                                        <!-- single menu -->
                                        <button @click="openSubCat(catIndex, subCatIndex)"
                                                class="category-submenu-open text-left cursor-pointer w-full relative text-base font-normal text-[#424242] leading-[21px] mb-2.5">
                                            <span x-text="subCat.name"></span>
                                            <span x-show="!subCat.isOpen"
                                                  class="plus absolute -right-1 top-[2px]"><svg width="14" height="14"
                                                                                                viewBox="0 0 256 256">
                                                        <path fill="currentColor"
                                                              d="M224 128a8 8 0 0 1-8 8h-80v80a8 8 0 0 1-16 0v-80H40a8 8 0 0 1 0-16h80V40a8 8 0 0 1 16 0v80h80a8 8 0 0 1 8 8Z" />
                                                    </svg>
                                                </span>
                                            <span x-show="subCat.isOpen"
                                                  class="minus absolute -right-1 top-[2px]"><svg width="14"
                                                                                                 height="14" viewBox="0 0 256 256">
                                                        <path fill="currentColor"
                                                              d="M216 136H40a8 8 0 0 1 0-16h176a8 8 0 0 1 0 16Z" />
                                                    </svg>
                                                </span>
                                        </button>

                                        <!-- mega menu -->
                                        <div x-show="subCat.isOpen" class="category-sub-menu pl-[15px]">
                                            <template x-for="mega in subCat.megaCategories">
                                                <a href="#" x-text="mega.name"
                                                   class="text-[15px] text-[#453E3E] mb-[9px] block hover:text-primary transition duration-300">
                                                </a>
                                            </template>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </template>
                </div>
            </template>

        </div>
        <!-- category wrapper end -->
    </div>
</div>
<!-- mobile category end -->
