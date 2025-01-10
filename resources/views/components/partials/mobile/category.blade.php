@props([
    'categories'
])
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

                        <div class="relative flex flex-wrap items-center border-b border-dotted border-[#C8C8CE] pl-2 pr-5 w-full text-[#222] transition duration-300 hover:bg-[#EFEFEF]">
                            {{--<!-- icon -->
                            <span class="w-11 text-[#f4cad0] font-black" x-html="category.icon"></span>--}}

                            <!-- name -->
                            <a :href="category.href" class="text-[15px] cursor-pointer text-[#222] py-2.5" x-text="category.name"></a>
                            <button @click="openMainCat(catIndex)" class="mobile-submenu-open">
                                <!-- arrow down -->
                                <span x-show="category.subCategories" :class="category.isOpen ? 'rotate-180' : ''"
                                      class="mobile-menu-icon absolute top-2.5 right-[15px] text-center text-[#222]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="arrow-icon h-5 w-5" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>

                    <!-- sub menus -->
                    <template x-if="category.subCategories">
                        <div x-show="category.isOpen" class="sub-menu static h-auto pt-2.5 pl-6 w-full pr-5">
                            <div class="w-full">
                                <template x-for="(subCat, subCatIndex) in category.subCategories">
                                    <div class="category-mobile-submenu">
                                        <!-- single menu -->
                                        <div class="text-left cursor-pointer w-full relative text-base font-normal text-[#424242] leading-[21px] mb-2.5">
                                            <a :href="subCat.href" x-text="subCat.name"></a>
                                            <button @click="openSubCat(catIndex, subCatIndex)" class="category-submenu-open">
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
                                        </div>

                                        <!-- mega menu -->
                                        <div x-show="subCat.isOpen" class="category-sub-menu pl-[15px]">
                                            <template x-for="mega in subCat.megaCategories">
                                                <a :href="mega.href" x-text="mega.name"
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

@push('scripts')
    <script>

        // category list
        const categoryModules = {
            categoryList: [
                @foreach($categories as $category)
                {
                {{--icon: `<svg width="20" height="20" viewBox="0 0 32 32">
                        <path fill="currentColor"
                            d="M10 3C7.805 3 6.203 4.605 5.281 6.5C4.36 8.395 3.961 10.68 4 12.688c.047 2.332 1.063 4.687 1.063 4.687l.28.625h8.407l.219-.75s.789-2.941 1-5.75c.082-1.105.047-3.027-.563-4.844c-.304-.91-.746-1.8-1.469-2.5C12.216 3.457 11.188 3 10 3zm12 0c-1.188 0-2.215.457-2.938 1.156c-.722.7-1.164 1.59-1.468 2.5c-.61 1.817-.645 3.739-.563 4.844c.211 2.809 1 5.75 1 5.75l.219.75h8.406l.282-.625S27.953 15.02 28 12.687c.04-2.007-.36-4.292-1.281-6.187C25.797 4.605 24.195 3 22 3zM10 5c.703 0 1.129.203 1.531.594c.403.39.762 1.011 1 1.718c.473 1.415.531 3.215.469 4.063c-.164 2.176-.684 3.996-.844 4.625H6.72c-.242-.684-.692-2.016-.719-3.344c-.035-1.695.355-3.761 1.094-5.281C7.832 5.855 8.77 5 10 5zm12 0c1.23 0 2.168.855 2.906 2.375c.739 1.52 1.125 3.586 1.094 5.281c-.027 1.328-.477 2.66-.719 3.344h-5.437c-.16-.629-.68-2.45-.844-4.625c-.063-.848-.004-2.648.469-4.063c.238-.707.597-1.328 1-1.718C20.87 5.204 21.297 5 22 5zM5 21v1c-.012 1.379.121 2.988.813 4.406C6.502 27.824 7.957 29 10 29c2.262 0 3.98-2.215 4-5c.004-.645-.023-1.402-.25-2.25l-.188-.75zm13.438 0l-.188.75c-.227.848-.254 1.605-.25 2.25c.02 2.785 1.738 5 4 5c2.043 0 3.496-1.176 4.188-2.594c.69-1.418.824-3.027.812-4.406v-1zM7.155 23h4.75c.035.328.098.664.094 1c-.016 2.023-1.07 3-2 3c-1.379 0-1.95-.535-2.406-1.469c-.328-.668-.367-1.629-.438-2.531zm12.938 0h4.75c-.07.902-.11 1.863-.438 2.531C23.95 26.465 23.38 27 22 27c-.93 0-1.984-.977-2-3c-.004-.336.059-.672.094-1z" />
                    </svg>`,--}}
                    name: '{{ $category->name }}',
                    href: '{{ route('category', $category) }}',
                    @if ($category->children->count())
                    subCategories: [
                        @foreach($category->children as $child)
                        {
                            name: '{{ $child->name }}',
                            href: '{{ route('category', $child) }}',
                            @if($child->children->count())
                            isOpen: false,
                            megaCategories: [
                                @foreach($child->children as $subChild)
                                {
                                    name: '{{ $subChild->name }}',
                                    href: '{{ route('category', $subChild) }}'
                                },
                                @endforeach
                            ]
                            @endif
                        },
                        @endforeach
                    ]
                    @endif
                },
                @endforeach
            ],
            openMainCat(catIndex) {
                if (this.categoryList[catIndex].isOpen) {
                    this.categoryList[catIndex].isOpen = false
                } else {
                    this.categoryList.forEach(cat => cat.isOpen = false)
                    this.categoryList[catIndex].isOpen = true
                }
            },
            openSubCat(catIndex, subCatIndex) {
                if (this.categoryList[catIndex].subCategories[subCatIndex].isOpen) {
                    this.categoryList[catIndex].subCategories[subCatIndex].isOpen = false
                } else {
                    this.categoryList.forEach(cat => {
                        if (cat.subCategories) {
                            cat.subCategories.forEach(subCat => subCat.isOpen = false)
                        }
                    })
                    this.categoryList[catIndex].subCategories[subCatIndex].isOpen = true
                }
            }
        }

        // Alpine Store
        document.addEventListener('alpine:init', () => {
            Alpine.store('mobileMenu', {
                isOpen: false,
            })

            Alpine.store('category', {
                isCategory: false,
            })

            Alpine.store('search', {
                isSearch: false,
            })

            Alpine.store('cart', {
                isCart: false,
            })
        })

    </script>
@endpush
