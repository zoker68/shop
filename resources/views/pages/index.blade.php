<x-shop::layouts.app>
    <!-- hero area -->
    <x-shop::widgets.slider code="index"/>
    <!-- hero area end -->

    <!-- feature area -->
    <x-shop::widgets.slider code="features" type="block"/>
    <!-- feature area end -->

    <!-- top ranking -->
    <x-shop::widgets.tops code="ranking"/>
    <!-- top ranking end -->

    <!-- new arrive -->
    <div class="container pb-14">
        <div class="flex items-start justify-between mb-[30px]">
            <h2 class="text-[22px] sm:text-[32px] font-medium text-secondary">New Arrivals</h2>
            <div class="pt-2">
                <a href="#" class="text-[15px] font-medium text-primary flex items-center gap-1">See More
                    <svg width="15" height="15" viewBox="0 0 32 32">
                        <path fill="currentColor"
                              d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
        <div x-data class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/laptop-3.png"
                             alt="product">
                        <span
                            class="absolute top-0 left-0 px-2.5 py-2 bg-[#ED0020] rounded-tl-[5px] rounded-br-[5px] text-white text-[15px] font-medium uppercase z-20">hot</span>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">HP Pavilion 15</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/hd-monitor.png"
                             alt="product">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">HP Pavilion 15</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/headphone-3.png"
                             alt="product">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">HP Pavilion 15</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/phone-1.png"
                             alt="product">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">HP Pavilion 15</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- new arrive end -->

    <!-- ad banner -->

    <x-shop::widgets.slider code="index-banner" type="banner"/>

    <!-- ad banner end -->

    <!-- recomended -->
    <div class="container pb-14">
        <div class="flex items-start justify-between mb-[30px]">
            <h2 class="text-[22px] sm:text-[32px] font-medium text-secondary">Recomended For You</h2>
            <div class="pt-2">
                <a href="#" class="text-[15px] font-medium text-primary flex items-center gap-1">See More
                    <svg width="15" height="15" viewBox="0 0 32 32">
                        <path fill="currentColor"
                              d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>
        <div x-data class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/laptop-3.png"
                             alt="product">
                        <span
                            class="absolute top-0 left-0 px-2.5 py-2 bg-[#ED0020] rounded-tl-[5px] rounded-br-[5px] text-white text-[15px] font-medium uppercase z-20">Hot</span>
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">HP Pavilion 15</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/mouch-logi.png"
                             alt="product">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">Logitech Wireless Mouse</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/headphone-3.png"
                             alt="product">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary  hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">COWIN E7 Active</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/phone-1.png"
                             alt="product">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">Xiaomi Note 7 Pro</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/phone-2.png"
                             alt="product">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">iPhone 11 Pro</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/laptop-2.png"
                             alt="product">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">HP Omen 13</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/coverpad.png"
                             alt="product">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">Anti-Fray Cloth Gaming</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="w-full col-span-1 group">
                <div class="border border-[#DDDDDD] rounded-[5px] overflow-hidden">
                    <div class="relative bg-[#f3f3f3] px-[30px] py-[30px] sm:py-5">
                        <img class="w-full h-[130px] object-contain flex-shrink-0" src="assets/images/headphone-2.png"
                             alt="product">
                        <div
                            class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-[#e5e5e58c] z-10 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button @click="$store.productView.isActive=true"
                                    class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                                    tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 32 32">
                                    <path fill="currentColor"
                                          d="m29 27.586l-7.552-7.552a11.018 11.018 0 1 0-1.414 1.414L27.586 29ZM4 13a9 9 0 1 1 9 9a9.01 9.01 0 0 1-9-9Z" />
                                </svg>
                            </button>
                            <a href="wishlist.html"
                               class="mx-2 h-10 w-10 bg-primary hover:bg-secondary transition text-center text-white flex justify-center items-center rounded-full"
                               tabindex="0">
                                <svg width="20" height="20" viewBox="0 0 256 256">
                                    <path fill="currentColor"
                                          d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z" />
                                </svg>
                            </a>
                        </div>
                    </div>

                    <div class="p-5 h-[125px] overflow-hidden relative">
                        <a href="#">
                            <h4 class="text-secondary text-lg font-medium mb-[5px]">Bose Headphone</h4>
                        </a>
                        <div>
                            <div>
                                <span class="text-primary mr-[5px] font-medium">$45.00</span>
                                <span class="text-sm text-[#687188] line-through font-medium">$55.45</span>
                            </div>

                            <div class="flex items-center justify-start">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="16" height="16" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z" />
                                        </svg></span>
                                </div>
                                <p class="text-[13px] ml-[9px] text-[#687188]">(150)</p>
                            </div>
                        </div>
                        <div
                            class="absolute left-5 top-14 mt-[15px] group-hover:mt-0 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300">
                            <button class="primary-btn hover:bg-white px-[15px]">ADD TO CART</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- recomended end-->

    <!-- download app -->
    <section class="pb-14">
        <div class="container">
            <div class="bg-[#f3f3f3]">
                <div class="md:flex flex-wrap">
                    <div class="md:w-1/2 md:pr-3">
                        <img loading="lazy" src="assets/images/mobile-view.png"
                             class="w-full max-h-[450px] h-full object-contain flex-shrink-0">
                    </div>
                    <div class="md:w-5/12 py-6 px-4 sm:px-12 md:px-0 md:py-0 md:pt-[90px] md:pb-[105px]">
                        <div>
                            <h2 class="text-2xl sm:text-[26px] md:text-[28px] mb-4 text-secondary">Download RAFCART App
                                Now!</h2>
                            <p class="mb-6 text-secondary">Shopping fastly and easily more with our app. Get a link to
                                download
                                the app on your
                                phone</p>
                            <form action="#" class="flex">
                                <input type="text" placeholder="Email Address"
                                       class="w-full bg-white rounded-l-[5px] border border-primary focus:ring-0 focus:border-primary border-r-transparent text-sm px-5 py-[14px] focus:outline-none">
                                <button type="submit" class="min-w-[120px] primary-btn rounded-l-none">Subscribe
                                </button>
                            </form>
                            <div class="flex items-center mt-[35px]">
                                <a href="#" class="mr-4">
                                    <img src="assets/images/download-1.png"
                                         class="w-[120px] rounded-[5px] flex-shrink-0" alt="download">
                                </a>
                                <a href="#">
                                    <img src="assets/images/download-2.png"
                                         class="w-[120px] rounded-[5px] flex-shrink-0" alt="download">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- download app end -->

    <!-- offer deal -->
    <x-shop::widgets.slider code="offer" type="cta"/>
    <!-- offer deal end-->

    <!-- categories -->
    <div class="container pb-14">
        <h2 class="text-[28px] text-secondary mb-6">SHOP BY CATEGORY</h2>
        <div class="grid grid-cols-2 lg:grid-cols-3 gap-2">
            <div class="col-span-1 overflow-hidden">
                <a href="#"
                   class="group h-[150px] sm:h-[250px] flex items-center justify-center relative bg-cover bg-no-repeat bg-center after:absolute after:inset-0 after:bg-[#00000060] after:content-['']"
                   style="background-image: url(assets/images/category-1.jpg);">
                    <div class="flex items-center relative z-10">
                        <h4 class="text-xl leading-6 text-white font-medium">Bedroom</h4>
                        <div
                            class="text-white opacity-0 group-hover:opacity-100 group-hover:ml-2 transition-all duration-300">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M13.3 17.275q-.3-.3-.288-.725q.013-.425.313-.725L16.15 13H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.15L13.3 8.15q-.3-.3-.3-.713q0-.412.3-.712t.713-.3q.412 0 .712.3L19.3 11.3q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.687.275q-.413 0-.713-.3Z" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-1 overflow-hidden">
                <a href="#"
                   class="group h-[150px] sm:h-[250px] flex items-center justify-center relative bg-cover bg-no-repeat bg-center after:absolute after:inset-0 after:bg-[#00000060] after:content-['']"
                   style="background-image: url(assets/images/category-2.jpg);">
                    <div class="flex items-center relative z-10">
                        <h4 class="text-xl leading-6 text-white font-medium">Mattresses</h4>
                        <div
                            class="text-white opacity-0 group-hover:opacity-100 group-hover:ml-2 transition-all duration-300">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M13.3 17.275q-.3-.3-.288-.725q.013-.425.313-.725L16.15 13H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.15L13.3 8.15q-.3-.3-.3-.713q0-.412.3-.712t.713-.3q.412 0 .712.3L19.3 11.3q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.687.275q-.413 0-.713-.3Z" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-1 overflow-hidden">
                <a href="#"
                   class="group h-[150px] sm:h-[250px] flex items-center justify-center relative bg-cover bg-no-repeat bg-center after:absolute after:inset-0 after:bg-[#00000060] after:content-['']"
                   style="background-image: url(assets/images/category-3.jpg);">
                    <div class="flex items-center relative z-10">
                        <h4 class="text-xl leading-6 text-white font-medium">Office</h4>
                        <div
                            class="text-white opacity-0 group-hover:opacity-100 group-hover:ml-2 transition-all duration-300">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M13.3 17.275q-.3-.3-.288-.725q.013-.425.313-.725L16.15 13H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.15L13.3 8.15q-.3-.3-.3-.713q0-.412.3-.712t.713-.3q.412 0 .712.3L19.3 11.3q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.687.275q-.413 0-.713-.3Z" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-1 overflow-hidden">
                <a href="#"
                   class="group h-[150px] sm:h-[250px] flex items-center justify-center relative bg-cover bg-no-repeat bg-center after:absolute after:inset-0 after:bg-[#00000060] after:content-['']"
                   style="background-image: url(assets/images/category-4.jpg);">
                    <div class="flex items-center relative z-10">
                        <h4 class="text-xl leading-6 text-white font-medium">Outdoor</h4>
                        <div
                            class="text-white opacity-0 group-hover:opacity-100 group-hover:ml-2 transition-all duration-300">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M13.3 17.275q-.3-.3-.288-.725q.013-.425.313-.725L16.15 13H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.15L13.3 8.15q-.3-.3-.3-.713q0-.412.3-.712t.713-.3q.412 0 .712.3L19.3 11.3q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.687.275q-.413 0-.713-.3Z" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-1 overflow-hidden">
                <a href="#"
                   class="group h-[150px] sm:h-[250px] flex items-center justify-center relative bg-cover bg-no-repeat bg-center after:absolute after:inset-0 after:bg-[#00000060] after:content-['']"
                   style="background-image: url(assets/images/category-5.jpg);">
                    <div class="flex items-center relative z-10">
                        <h4 class="text-xl leading-6 text-white font-medium">Lounges &amp; Sofas</h4>
                        <div
                            class="text-white opacity-0 group-hover:opacity-100 group-hover:ml-2 transition-all duration-300">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M13.3 17.275q-.3-.3-.288-.725q.013-.425.313-.725L16.15 13H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.15L13.3 8.15q-.3-.3-.3-.713q0-.412.3-.712t.713-.3q.412 0 .712.3L19.3 11.3q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.687.275q-.413 0-.713-.3Z" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-span-1 overflow-hidden">
                <a href="#"
                   class="group h-[150px] sm:h-[250px] flex items-center justify-center relative bg-cover bg-no-repeat bg-center after:absolute after:inset-0 after:bg-[#00000060] after:content-['']"
                   style="background-image: url(assets/images/category-6.jpg);">
                    <div class="flex items-center relative z-10">
                        <h4 class="text-xl leading-6 text-white font-medium">Living &amp; Dining</h4>
                        <div
                            class="text-white opacity-0 group-hover:opacity-100 group-hover:ml-2 transition-all duration-300">
                            <svg width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M13.3 17.275q-.3-.3-.288-.725q.013-.425.313-.725L16.15 13H5q-.425 0-.713-.288Q4 12.425 4 12t.287-.713Q4.575 11 5 11h11.15L13.3 8.15q-.3-.3-.3-.713q0-.412.3-.712t.713-.3q.412 0 .712.3L19.3 11.3q.15.15.213.325q.062.175.062.375t-.062.375q-.063.175-.213.325l-4.6 4.6q-.275.275-.687.275q-.413 0-.713-.3Z" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- categories end-->


    <!-- FLASH SALE -->
    <div class="container pb-14">
        <h2 class="text-[28px] text-secondary mb-6">FLASH SALE</h2>
        <!-- ending in -->
        <div class="flex items-center justify-between mb-6">
            <div x-ignore class="flex items-center">
                <div
                    class="bg-secondary rounded-[3px] px-2.5 sm:px-4 py-1 text-white font-medium text-xs sm:text-base leading-6 mr-2.5 sm:mr-4">
                    Ending in</div>
                <div
                    class="bg-primary rounded-[3px] px-[5px] py-2 text-white font-medium text-base leading-4 w-9 text-center mr-1.5 sm:mr-2">
                    00</div>
                <div class="text-primary mr-1.5 sm:mr-2 font-medium text-base">:</div>
                <div class="bg-primary rounded-[3px] px-[5px] py-2 text-white font-medium text-base leading-4 w-9 text-center mr-1.5 sm:mr-2"
                     id="count_minute">32</div>
                <div class="text-primary mr-1.5 sm:mr-2 font-medium text-base">:</div>
                <div class="bg-primary rounded-[3px] px-[5px] py-2 text-white font-medium text-base leading-4 w-9 text-center mr-1.5 sm:mr-2"
                     id="count_second">15</div>
            </div>

            <div class="pt-2">
                <a href="#" class="text-[15px] font-medium text-primary flex items-center gap-1">See More
                    <svg width="15" height="15" viewBox="0 0 32 32">
                        <path fill="currentColor"
                              d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z">
                        </path>
                    </svg>
                </a>
            </div>
        </div>

        <!-- Swiper -->
        <div x-data class="swiper flashSale">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="overflow-hidden rounded-[3px] shadow-sm group">
                        <div class="relative bg-[#F7F7F7] flex justify-center items-center">
                            <img src="assets/images/toy.png"
                                 class="w-[230px] h-[180px] object-contain p-6 flex-shrink-0" alt="product">

                            <div
                                class="w-full h-full absolute left-0 top-0 bg-bgcolor opacity-0 group-hover:opacity-100 transition-all duration-500">
                                <div class="relative w-full h-full">
                                    <div
                                        class="w-[30px] h-[30px] bg-white text-base shadow-sm rounded-full absolute top-[15px] right-[15px] z-10 text-primary flex items-center justify-center cursor-pointer">
                                        <svg width="26" height="26" viewBox="0 0 50 50">
                                            <path fill="currentColor"
                                                  d="m25 39.7l-.6-.5C11.5 28.7 8 25 8 19c0-5 4-9 9-9c4.1 0 6.4 2.3 8 4.1c1.6-1.8 3.9-4.1 8-4.1c5 0 9 4 9 9c0 6-3.5 9.7-16.4 20.2l-.6.5zM17 12c-3.9 0-7 3.1-7 7c0 5.1 3.2 8.5 15 18.1c11.8-9.6 15-13 15-18.1c0-3.9-3.1-7-7-7c-3.5 0-5.4 2.1-6.9 3.8L25 17.1l-1.1-1.3C22.4 14.1 20.5 12 17 12z" />
                                        </svg>
                                    </div>
                                </div>
                                <button @click="$store.productView.isActive=true"
                                        class="absolute left-0 bottom-0 w-full p-2 bg-secondary text-white text-base text-center leading-4 flex items-center justify-center">
                                    <span class="text-white mr-1"><svg width="20" height="20" viewBox="0 0 32 32">
                                            <path fill="currentColor"
                                                  d="M16 8C7.664 8 1.25 15.344 1.25 15.344L.656 16l.594.656s5.848 6.668 13.625 7.282c.371.046.742.062 1.125.062s.754-.016 1.125-.063c7.777-.613 13.625-7.28 13.625-7.28l.594-.657l-.594-.656S24.336 8 16 8zm0 2c2.203 0 4.234.602 6 1.406A6.89 6.89 0 0 1 23 15a6.995 6.995 0 0 1-6.219 6.969c-.02.004-.043-.004-.062 0c-.239.011-.477.031-.719.031c-.266 0-.523-.016-.781-.031A6.995 6.995 0 0 1 9 15c0-1.305.352-2.52.969-3.563h-.031C11.717 10.617 13.773 10 16 10zm0 2a3 3 0 1 0 .002 6.002A3 3 0 0 0 16 12zm-8.75.938A9.006 9.006 0 0 0 7 15c0 1.754.5 3.395 1.375 4.781A23.196 23.196 0 0 1 3.531 16a23.93 23.93 0 0 1 3.719-3.063zm17.5 0A23.93 23.93 0 0 1 28.469 16a23.196 23.196 0 0 1-4.844 3.781A8.929 8.929 0 0 0 25 15c0-.715-.094-1.398-.25-2.063z" />
                                        </svg></span>
                                    Quick View
                                </button>
                            </div>
                        </div>
                        <div class="p-4 mb-1">
                            <a href="#">
                                <h4
                                    class="text-lg leading-6 mb-2 text-secondary hover:text-primary font-medium transition duration-200">
                                    PlAYMOBILE PRINCESS</h4>
                            </a>
                            <div class="mr-[5px]">
                                <span class="text-primary text-xl font-semibold leading-[22px]">$45.00</span>
                            </div>
                            <div class="flex items-center justify-start gap-[9px]">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                </div>
                                <p class="text-[15px] text-[#464545]">(150)</p>
                            </div>
                        </div>
                        <div class="w-full">
                            <button
                                class="primary-btn w-full rounded-t-none text-base leading-[19px] gap-1.5 p-2 rounded-b-[3px] flex items-center justify-center transition-all duration-500">
                                <span class="text-white btn-icon transition duration-500"><svg width="16" height="16"
                                                                                               viewBox="0 0 32 32">
                                        <circle cx="10" cy="28" r="2" fill="currentColor" />
                                        <circle cx="24" cy="28" r="2" fill="currentColor" />
                                        <path fill="currentColor"
                                              d="M28 7H5.82L5 2.8A1 1 0 0 0 4 2H0v2h3.18L7 23.2a1 1 0 0 0 1 .8h18v-2H8.82L8 18h18a1 1 0 0 0 1-.78l2-9A1 1 0 0 0 28 7Zm-2.8 9H7.62l-1.4-7h20.53Z" />
                                    </svg></span>
                                ADD TO CART
                            </button>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden rounded-[3px] shadow-sm group">
                        <div class="relative bg-[#F7F7F7] flex justify-center items-center">
                            <img src="assets/images/shoes-5.png"
                                 class="w-[230px] h-[180px] object-contain p-6 flex-shrink-0" alt="product">

                            <div
                                class="w-full h-full absolute left-0 top-0 bg-bgcolor opacity-0 group-hover:opacity-100 transition-all duration-500">
                                <div class="relative w-full h-full">
                                    <div
                                        class="w-[30px] h-[30px] bg-white text-base shadow-sm rounded-full absolute top-[15px] right-[15px] z-10 text-primary flex items-center justify-center cursor-pointer">
                                        <svg width="26" height="26" viewBox="0 0 50 50">
                                            <path fill="currentColor"
                                                  d="m25 39.7l-.6-.5C11.5 28.7 8 25 8 19c0-5 4-9 9-9c4.1 0 6.4 2.3 8 4.1c1.6-1.8 3.9-4.1 8-4.1c5 0 9 4 9 9c0 6-3.5 9.7-16.4 20.2l-.6.5zM17 12c-3.9 0-7 3.1-7 7c0 5.1 3.2 8.5 15 18.1c11.8-9.6 15-13 15-18.1c0-3.9-3.1-7-7-7c-3.5 0-5.4 2.1-6.9 3.8L25 17.1l-1.1-1.3C22.4 14.1 20.5 12 17 12z" />
                                        </svg>
                                    </div>
                                </div>
                                <button @click="$store.productView.isActive=true"
                                        class="absolute left-0 bottom-0 w-full p-2 bg-secondary text-white text-base text-center leading-4 flex items-center justify-center">
                                    <span class="text-white mr-1"><svg width="20" height="20" viewBox="0 0 32 32">
                                            <path fill="currentColor"
                                                  d="M16 8C7.664 8 1.25 15.344 1.25 15.344L.656 16l.594.656s5.848 6.668 13.625 7.282c.371.046.742.062 1.125.062s.754-.016 1.125-.063c7.777-.613 13.625-7.28 13.625-7.28l.594-.657l-.594-.656S24.336 8 16 8zm0 2c2.203 0 4.234.602 6 1.406A6.89 6.89 0 0 1 23 15a6.995 6.995 0 0 1-6.219 6.969c-.02.004-.043-.004-.062 0c-.239.011-.477.031-.719.031c-.266 0-.523-.016-.781-.031A6.995 6.995 0 0 1 9 15c0-1.305.352-2.52.969-3.563h-.031C11.717 10.617 13.773 10 16 10zm0 2a3 3 0 1 0 .002 6.002A3 3 0 0 0 16 12zm-8.75.938A9.006 9.006 0 0 0 7 15c0 1.754.5 3.395 1.375 4.781A23.196 23.196 0 0 1 3.531 16a23.93 23.93 0 0 1 3.719-3.063zm17.5 0A23.93 23.93 0 0 1 28.469 16a23.196 23.196 0 0 1-4.844 3.781A8.929 8.929 0 0 0 25 15c0-.715-.094-1.398-.25-2.063z" />
                                        </svg></span>
                                    Quick View
                                </button>
                            </div>
                        </div>
                        <div class="p-4 mb-1">
                            <a href="#">
                                <h4
                                    class="text-lg leading-6 mb-2 text-secondary hover:text-primary font-medium transition duration-200">
                                    MEN'S RUNNING SHOES</h4>
                            </a>
                            <div class="mr-[5px]">
                                <span class="text-primary text-xl font-semibold leading-[22px]">$45.00</span>
                            </div>
                            <div class="flex items-center justify-start gap-[9px]">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                </div>
                                <p class="text-[15px] text-[#464545]">(150)</p>
                            </div>
                        </div>
                        <div class="w-full">
                            <button
                                class="primary-btn w-full rounded-t-none text-base leading-[19px] gap-1.5 p-2 rounded-b-[3px] flex items-center justify-center transition-all duration-500">
                                <span class="text-white btn-icon transition duration-500"><svg width="16" height="16"
                                                                                               viewBox="0 0 32 32">
                                        <circle cx="10" cy="28" r="2" fill="currentColor" />
                                        <circle cx="24" cy="28" r="2" fill="currentColor" />
                                        <path fill="currentColor"
                                              d="M28 7H5.82L5 2.8A1 1 0 0 0 4 2H0v2h3.18L7 23.2a1 1 0 0 0 1 .8h18v-2H8.82L8 18h18a1 1 0 0 0 1-.78l2-9A1 1 0 0 0 28 7Zm-2.8 9H7.62l-1.4-7h20.53Z" />
                                    </svg></span>
                                ADD TO CART
                            </button>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden rounded-[3px] shadow-sm group">
                        <div class="relative bg-[#F7F7F7] flex justify-center items-center">
                            <img src="assets/images/shoes-3.png"
                                 class="w-[230px] h-[180px] object-contain p-6 flex-shrink-0" alt="product">

                            <div
                                class="w-full h-full absolute left-0 top-0 bg-bgcolor opacity-0 group-hover:opacity-100 transition-all duration-500">
                                <div class="relative w-full h-full">
                                    <div
                                        class="w-[30px] h-[30px] bg-white text-base shadow-sm rounded-full absolute top-[15px] right-[15px] z-10 text-primary flex items-center justify-center cursor-pointer">
                                        <svg width="26" height="26" viewBox="0 0 50 50">
                                            <path fill="currentColor"
                                                  d="m25 39.7l-.6-.5C11.5 28.7 8 25 8 19c0-5 4-9 9-9c4.1 0 6.4 2.3 8 4.1c1.6-1.8 3.9-4.1 8-4.1c5 0 9 4 9 9c0 6-3.5 9.7-16.4 20.2l-.6.5zM17 12c-3.9 0-7 3.1-7 7c0 5.1 3.2 8.5 15 18.1c11.8-9.6 15-13 15-18.1c0-3.9-3.1-7-7-7c-3.5 0-5.4 2.1-6.9 3.8L25 17.1l-1.1-1.3C22.4 14.1 20.5 12 17 12z" />
                                        </svg>
                                    </div>
                                </div>
                                <button @click="$store.productView.isActive=true"
                                        class="absolute left-0 bottom-0 w-full p-2 bg-secondary text-white text-base text-center leading-4 flex items-center justify-center">
                                    <span class="text-white mr-1"><svg width="20" height="20" viewBox="0 0 32 32">
                                            <path fill="currentColor"
                                                  d="M16 8C7.664 8 1.25 15.344 1.25 15.344L.656 16l.594.656s5.848 6.668 13.625 7.282c.371.046.742.062 1.125.062s.754-.016 1.125-.063c7.777-.613 13.625-7.28 13.625-7.28l.594-.657l-.594-.656S24.336 8 16 8zm0 2c2.203 0 4.234.602 6 1.406A6.89 6.89 0 0 1 23 15a6.995 6.995 0 0 1-6.219 6.969c-.02.004-.043-.004-.062 0c-.239.011-.477.031-.719.031c-.266 0-.523-.016-.781-.031A6.995 6.995 0 0 1 9 15c0-1.305.352-2.52.969-3.563h-.031C11.717 10.617 13.773 10 16 10zm0 2a3 3 0 1 0 .002 6.002A3 3 0 0 0 16 12zm-8.75.938A9.006 9.006 0 0 0 7 15c0 1.754.5 3.395 1.375 4.781A23.196 23.196 0 0 1 3.531 16a23.93 23.93 0 0 1 3.719-3.063zm17.5 0A23.93 23.93 0 0 1 28.469 16a23.196 23.196 0 0 1-4.844 3.781A8.929 8.929 0 0 0 25 15c0-.715-.094-1.398-.25-2.063z" />
                                        </svg></span>
                                    Quick View
                                </button>
                            </div>
                        </div>
                        <div class="p-4 mb-1">
                            <a href="#">
                                <h4
                                    class="text-lg leading-6 mb-2 text-secondary hover:text-primary font-medium transition duration-200">
                                    WOMEN HILL LEATHER</h4>
                            </a>
                            <div class="mr-[5px]">
                                <span class="text-primary text-xl font-semibold leading-[22px]">$120.00</span>
                            </div>
                            <div class="flex items-center justify-start gap-[9px]">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                </div>
                                <p class="text-[15px] text-[#464545]">(150)</p>
                            </div>
                        </div>
                        <div class="w-full">
                            <button
                                class="primary-btn w-full rounded-t-none text-base leading-[19px] gap-1.5 p-2 rounded-b-[3px] flex items-center justify-center transition-all duration-500">
                                <span class="text-white btn-icon transition duration-500"><svg width="16" height="16"
                                                                                               viewBox="0 0 32 32">
                                        <circle cx="10" cy="28" r="2" fill="currentColor" />
                                        <circle cx="24" cy="28" r="2" fill="currentColor" />
                                        <path fill="currentColor"
                                              d="M28 7H5.82L5 2.8A1 1 0 0 0 4 2H0v2h3.18L7 23.2a1 1 0 0 0 1 .8h18v-2H8.82L8 18h18a1 1 0 0 0 1-.78l2-9A1 1 0 0 0 28 7Zm-2.8 9H7.62l-1.4-7h20.53Z" />
                                    </svg></span>
                                ADD TO CART
                            </button>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden rounded-[3px] shadow-sm group">
                        <div class="relative bg-[#F7F7F7] flex justify-center items-center">
                            <img src="assets/images/parse.png"
                                 class="w-[230px] h-[180px] object-contain p-6 flex-shrink-0" alt="product">

                            <div
                                class="w-full h-full absolute left-0 top-0 bg-bgcolor opacity-0 group-hover:opacity-100 transition-all duration-500">
                                <div class="relative w-full h-full">
                                    <div
                                        class="w-[30px] h-[30px] bg-white text-base shadow-sm rounded-full absolute top-[15px] right-[15px] z-10 text-primary flex items-center justify-center cursor-pointer">
                                        <svg width="26" height="26" viewBox="0 0 50 50">
                                            <path fill="currentColor"
                                                  d="m25 39.7l-.6-.5C11.5 28.7 8 25 8 19c0-5 4-9 9-9c4.1 0 6.4 2.3 8 4.1c1.6-1.8 3.9-4.1 8-4.1c5 0 9 4 9 9c0 6-3.5 9.7-16.4 20.2l-.6.5zM17 12c-3.9 0-7 3.1-7 7c0 5.1 3.2 8.5 15 18.1c11.8-9.6 15-13 15-18.1c0-3.9-3.1-7-7-7c-3.5 0-5.4 2.1-6.9 3.8L25 17.1l-1.1-1.3C22.4 14.1 20.5 12 17 12z" />
                                        </svg>
                                    </div>
                                </div>
                                <button @click="$store.productView.isActive=true"
                                        class="absolute left-0 bottom-0 w-full p-2 bg-secondary text-white text-base text-center leading-4 flex items-center justify-center">
                                    <span class="text-white mr-1"><svg width="20" height="20" viewBox="0 0 32 32">
                                            <path fill="currentColor"
                                                  d="M16 8C7.664 8 1.25 15.344 1.25 15.344L.656 16l.594.656s5.848 6.668 13.625 7.282c.371.046.742.062 1.125.062s.754-.016 1.125-.063c7.777-.613 13.625-7.28 13.625-7.28l.594-.657l-.594-.656S24.336 8 16 8zm0 2c2.203 0 4.234.602 6 1.406A6.89 6.89 0 0 1 23 15a6.995 6.995 0 0 1-6.219 6.969c-.02.004-.043-.004-.062 0c-.239.011-.477.031-.719.031c-.266 0-.523-.016-.781-.031A6.995 6.995 0 0 1 9 15c0-1.305.352-2.52.969-3.563h-.031C11.717 10.617 13.773 10 16 10zm0 2a3 3 0 1 0 .002 6.002A3 3 0 0 0 16 12zm-8.75.938A9.006 9.006 0 0 0 7 15c0 1.754.5 3.395 1.375 4.781A23.196 23.196 0 0 1 3.531 16a23.93 23.93 0 0 1 3.719-3.063zm17.5 0A23.93 23.93 0 0 1 28.469 16a23.196 23.196 0 0 1-4.844 3.781A8.929 8.929 0 0 0 25 15c0-.715-.094-1.398-.25-2.063z" />
                                        </svg></span>
                                    Quick View
                                </button>
                            </div>
                        </div>
                        <div class="p-4 mb-1">
                            <a href="#">
                                <h4
                                    class="text-lg leading-6 mb-2 text-secondary hover:text-primary font-medium transition duration-200">
                                    WOMEN SCRUB LEATHER</h4>
                            </a>
                            <div class="mr-[5px]">
                                <span class="text-primary text-xl font-semibold leading-[22px]">$120.00</span>
                            </div>
                            <div class="flex items-center justify-start gap-[9px]">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                </div>
                                <p class="text-[15px] text-[#464545]">(150)</p>
                            </div>
                        </div>
                        <div class="w-full">
                            <button
                                class="primary-btn w-full rounded-t-none text-base leading-[19px] gap-1.5 p-2 rounded-b-[3px] flex items-center justify-center transition-all duration-500">
                                <span class="text-white btn-icon transition duration-500"><svg width="16" height="16"
                                                                                               viewBox="0 0 32 32">
                                        <circle cx="10" cy="28" r="2" fill="currentColor" />
                                        <circle cx="24" cy="28" r="2" fill="currentColor" />
                                        <path fill="currentColor"
                                              d="M28 7H5.82L5 2.8A1 1 0 0 0 4 2H0v2h3.18L7 23.2a1 1 0 0 0 1 .8h18v-2H8.82L8 18h18a1 1 0 0 0 1-.78l2-9A1 1 0 0 0 28 7Zm-2.8 9H7.62l-1.4-7h20.53Z" />
                                    </svg></span>
                                ADD TO CART
                            </button>
                        </div>
                    </div>
                </div>

                <div class="swiper-slide">
                    <div class="overflow-hidden rounded-[3px] shadow-sm group">
                        <div class="relative bg-[#F7F7F7] flex justify-center items-center">
                            <img src="assets/images/shirt-2.png"
                                 class="w-[230px] h-[180px] object-contain p-6 flex-shrink-0" alt="product">

                            <div
                                class="w-full h-full absolute left-0 top-0 bg-bgcolor opacity-0 group-hover:opacity-100 transition-all duration-500">
                                <div class="relative w-full h-full">
                                    <div
                                        class="w-[30px] h-[30px] bg-white text-base shadow-sm rounded-full absolute top-[15px] right-[15px] z-10 text-primary flex items-center justify-center cursor-pointer">
                                        <svg width="26" height="26" viewBox="0 0 50 50">
                                            <path fill="currentColor"
                                                  d="m25 39.7l-.6-.5C11.5 28.7 8 25 8 19c0-5 4-9 9-9c4.1 0 6.4 2.3 8 4.1c1.6-1.8 3.9-4.1 8-4.1c5 0 9 4 9 9c0 6-3.5 9.7-16.4 20.2l-.6.5zM17 12c-3.9 0-7 3.1-7 7c0 5.1 3.2 8.5 15 18.1c11.8-9.6 15-13 15-18.1c0-3.9-3.1-7-7-7c-3.5 0-5.4 2.1-6.9 3.8L25 17.1l-1.1-1.3C22.4 14.1 20.5 12 17 12z" />
                                        </svg>
                                    </div>
                                </div>
                                <button @click="$store.productView.isActive=true"
                                        class="absolute left-0 bottom-0 w-full p-2 bg-secondary text-white text-base text-center leading-4 flex items-center justify-center">
                                    <span class="text-white mr-1"><svg width="20" height="20" viewBox="0 0 32 32">
                                            <path fill="currentColor"
                                                  d="M16 8C7.664 8 1.25 15.344 1.25 15.344L.656 16l.594.656s5.848 6.668 13.625 7.282c.371.046.742.062 1.125.062s.754-.016 1.125-.063c7.777-.613 13.625-7.28 13.625-7.28l.594-.657l-.594-.656S24.336 8 16 8zm0 2c2.203 0 4.234.602 6 1.406A6.89 6.89 0 0 1 23 15a6.995 6.995 0 0 1-6.219 6.969c-.02.004-.043-.004-.062 0c-.239.011-.477.031-.719.031c-.266 0-.523-.016-.781-.031A6.995 6.995 0 0 1 9 15c0-1.305.352-2.52.969-3.563h-.031C11.717 10.617 13.773 10 16 10zm0 2a3 3 0 1 0 .002 6.002A3 3 0 0 0 16 12zm-8.75.938A9.006 9.006 0 0 0 7 15c0 1.754.5 3.395 1.375 4.781A23.196 23.196 0 0 1 3.531 16a23.93 23.93 0 0 1 3.719-3.063zm17.5 0A23.93 23.93 0 0 1 28.469 16a23.196 23.196 0 0 1-4.844 3.781A8.929 8.929 0 0 0 25 15c0-.715-.094-1.398-.25-2.063z" />
                                        </svg></span>
                                    Quick View
                                </button>
                            </div>
                        </div>
                        <div class="p-4 mb-1">
                            <a href="#">
                                <h4
                                    class="text-lg leading-6 mb-2 text-secondary hover:text-primary font-medium transition duration-200">
                                    MEN T-SHIRT ΚΑΝΟΝΙΚΗ</h4>
                            </a>
                            <div class="mr-[5px]">
                                <span class="text-primary text-xl font-semibold leading-[22px]">$120.00</span>
                            </div>
                            <div class="flex items-center justify-start gap-[9px]">
                                <div class="flex items-center">
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                    <span class="text-[#F6BC3E]"><svg width="17" height="17" viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                            </path>
                                        </svg></span>
                                </div>
                                <p class="text-[15px] text-[#464545]">(150)</p>
                            </div>
                        </div>
                        <div class="w-full">
                            <button
                                class="primary-btn w-full rounded-t-none text-base leading-[19px] gap-1.5 p-2 rounded-b-[3px] flex items-center justify-center transition-all duration-500">
                                <span class="text-white btn-icon transition duration-500"><svg width="16" height="16"
                                                                                               viewBox="0 0 32 32">
                                        <circle cx="10" cy="28" r="2" fill="currentColor" />
                                        <circle cx="24" cy="28" r="2" fill="currentColor" />
                                        <path fill="currentColor"
                                              d="M28 7H5.82L5 2.8A1 1 0 0 0 4 2H0v2h3.18L7 23.2a1 1 0 0 0 1 .8h18v-2H8.82L8 18h18a1 1 0 0 0 1-.78l2-9A1 1 0 0 0 28 7Zm-2.8 9H7.62l-1.4-7h20.53Z" />
                                    </svg></span>
                                ADD TO CART
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-button-next next-btn"></div>
            <div class="swiper-button-prev prev-btn"></div>
        </div>
    </div>
    <!-- FLASH SALE end-->

    <!-- CATEGORIES -->
    <div class="container pb-14">
        <h2 class="text-[28px] mb-6 text-secondary">CATEGORIES</h2>
        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 xl:grid-cols-6 gap-6">
            <!-- Shoes -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/shoes-5.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Shoes</h5>
                    </div>
                </a>
            </div>
            <!-- Mobile -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/phone-1.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Mobile</h5>
                    </div>
                </a>
            </div>
            <!-- Microphone -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/microphone.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Microphone</h5>
                    </div>
                </a>
            </div>
            <!-- Laptop -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/laptop-3.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Laptop</h5>
                    </div>
                </a>
            </div>
            <!-- Air Conditioner -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/aircondition.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Air Conditioner</h5>
                    </div>
                </a>
            </div>
            <!-- Clothing -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/shirt-2.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Clothing</h5>
                    </div>
                </a>
            </div>
            <!-- Headphone -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/headphone-3.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Headphone</h5>
                    </div>
                </a>
            </div>
            <!-- Furnitures -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/sofa-1.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Furnitures</h5>
                    </div>
                </a>
            </div>
            <!-- Electronics -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/electronic.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Electronics</h5>
                    </div>
                </a>
            </div>
            <!-- Office -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/table.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Office</h5>
                    </div>
                </a>
            </div>
            <!-- Camera -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/camera.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Camera</h5>
                    </div>
                </a>
            </div>
            <!-- Kids -->
            <div class="col-span-1 shadow-md rounded-[3px] overflow-hidden">
                <a href="#" class="w-full flex justify-center">
                    <div class="p-4 group text-center">
                        <div
                            class="w-[90px] h-[90px] bg-[#F7F7F7] m-auto rounded-full flex items-center justify-center flex-shrink-0 overflow-hidden">
                            <img src="assets/images/baby.png" class="w-14 h-14 object-contain" alt="">
                        </div>
                        <h5
                            class="mt-4 text-lg leading-[21px] text-secondary group-hover:text-primary transition duration-300">
                            Kids</h5>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!-- CATEGORIES end-->

    <!-- best selling -->
    <div class="container pb-14">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="col-span-1">
                <div class="flex items-center justify-between pb-2 border-b border-[#BFBFBF] mb-6">
                    <div class="text-lg font-medium text-secondary">LATEST</div>
                    <div>
                        <a href="#" class="text-[15px] font-medium text-primary flex items-center gap-1">See More
                            <svg width="15" height="15" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                      d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <div class="flex items-center mb-5">
                        <div class="w-[105px] bg-[#F2F0F0] rounded-md p-2.5">
                            <a href="#">
                                <img loading="lazy" src="assets/images/prod-1.png"
                                     class="w-full h-[75px] object-contain flex-shrink-0" alt="product">
                            </a>
                        </div>
                        <div class="pl-4">
                            <a href="#">
                                <h4
                                    class="text-base font-medium text-secondary mb-1.5 hover:text-primary transition duration-300">
                                    Adidas Trefoil Hoodie</h4>
                            </a>
                            <div class="font-medium">
                                <span class="text-primary mr-1">$45.00</span>
                                <span class="text-[#687188] text-sm font-medium line-through">$55.45</span>
                            </div>
                            <div>
                                <div class="flex items-center justify-start">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                    </div>
                                    <p class="text-sm ml-2 text-[#687188]">(150)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center mb-5">
                        <div class="w-[105px] bg-[#F2F0F0] rounded-md p-2.5">
                            <a href="#">
                                <img loading="lazy" src="assets/images/prod-6.png"
                                     class="w-full h-[75px] object-contain flex-shrink-0" alt="product">
                            </a>
                        </div>
                        <div class="pl-4">
                            <a href="#">
                                <h4
                                    class="text-base font-medium text-secondary mb-1.5 hover:text-primary transition duration-300">
                                    REG BROADCLOTH</h4>
                            </a>
                            <div class="font-medium">
                                <span class="text-primary mr-1">$45.00</span>
                                <span class="text-[#687188] text-sm font-medium line-through">$55.45</span>
                            </div>
                            <div>
                                <div class="flex items-center justify-start">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                    </div>
                                    <p class="text-sm ml-2 text-[#687188]">(150)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-[105px] bg-[#F2F0F0] rounded-md p-2.5">
                            <a href="#">
                                <img loading="lazy" src="assets/images/prod-4.png"
                                     class="w-full h-[75px] object-contain flex-shrink-0" alt="product">
                            </a>
                        </div>
                        <div class="pl-4">
                            <a href="#">
                                <h4
                                    class="text-base font-medium text-secondary mb-1.5 hover:text-primary transition duration-300">
                                    Blazer Tenia - Lana-Beige</h4>
                            </a>
                            <div class="font-medium">
                                <span class="text-primary mr-1">$45.00</span>
                                <span class="text-[#687188] text-sm font-medium line-through">$55.45</span>
                            </div>
                            <div>
                                <div class="flex items-center justify-start">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                    </div>
                                    <p class="text-sm ml-2 text-[#687188]">(150)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-1">
                <div class="flex items-center justify-between pb-2 border-b border-[#BFBFBF] mb-6">
                    <div class="text-lg font-medium text-secondary">BEST SELLING</div>
                    <div>
                        <a href="#" class="text-[15px] font-medium text-primary flex items-center gap-1">See More
                            <svg width="15" height="15" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                      d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <div class="flex items-center mb-5">
                        <div class="w-[105px] bg-[#F2F0F0] rounded-md p-2.5">
                            <a href="#">
                                <img loading="lazy" src="assets/images/prod-3.png"
                                     class="w-full h-[75px] object-contain flex-shrink-0" alt="product">
                            </a>
                        </div>
                        <div class="pl-4">
                            <a href="#">
                                <h4
                                    class="text-base font-medium text-secondary mb-1.5 hover:text-primary transition duration-300">
                                    Jump-Rings Connectors</h4>
                            </a>
                            <div class="font-medium">
                                <span class="text-primary mr-1">$45.00</span>
                                <span class="text-[#687188] text-sm font-medium line-through">$55.45</span>
                            </div>
                            <div>
                                <div class="flex items-center justify-start">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                    </div>
                                    <p class="text-sm ml-2 text-[#687188]">(150)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center mb-5">
                        <div class="w-[105px] bg-[#F2F0F0] rounded-md p-2.5">
                            <a href="#">
                                <img loading="lazy" src="assets/images/prod-2.png"
                                     class="w-full h-[75px] object-contain flex-shrink-0" alt="product">
                            </a>
                        </div>
                        <div class="pl-4">
                            <a href="#">
                                <h4
                                    class="text-base font-medium text-secondary mb-1.5 hover:text-primary transition duration-300">
                                    SWAROVSKI Fine Bracelet</h4>
                            </a>
                            <div class="font-medium">
                                <span class="text-primary mr-1">$45.00</span>
                                <span class="text-[#687188] text-sm font-medium line-through">$55.45</span>
                            </div>
                            <div>
                                <div class="flex items-center justify-start">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                    </div>
                                    <p class="text-sm ml-2 text-[#687188]">(150)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-[105px] bg-[#F2F0F0] rounded-md p-2.5">
                            <a href="#">
                                <img loading="lazy" src="assets/images/prod-5.png"
                                     class="w-full h-[75px] object-contain flex-shrink-0" alt="product">
                            </a>
                        </div>
                        <div class="pl-4">
                            <a href="#">
                                <h4
                                    class="text-base font-medium text-secondary mb-1.5 hover:text-primary transition duration-300">
                                    Hilfiger Tommy Hilfiger</h4>
                            </a>
                            <div class="font-medium">
                                <span class="text-primary mr-1">$45.00</span>
                                <span class="text-[#687188] text-sm font-medium line-through">$55.45</span>
                            </div>
                            <div>
                                <div class="flex items-center justify-start">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                    </div>
                                    <p class="text-sm ml-2 text-[#687188]">(150)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-1 md:hidden lg:block">
                <div class="flex items-center justify-between pb-2 border-b border-[#BFBFBF] mb-6">
                    <div class="text-lg font-medium text-secondary">TOP RATED</div>
                    <div>
                        <a href="#" class="text-[15px] font-medium text-primary flex items-center gap-1">See More
                            <svg width="15" height="15" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                      d="M12.969 4.281L11.53 5.72L21.812 16l-10.28 10.281l1.437 1.438l11-11l.687-.719l-.687-.719z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <div class="flex items-center mb-5">
                        <div class="w-[105px] bg-[#F2F0F0] rounded-md p-2.5">
                            <a href="#">
                                <img loading="lazy" src="assets/images/shirt-2.png"
                                     class="w-full h-[75px] object-contain flex-shrink-0" alt="product">
                            </a>
                        </div>
                        <div class="pl-4">
                            <a href="#">
                                <h4
                                    class="text-base font-medium text-secondary mb-1.5 hover:text-primary transition duration-300">
                                    Adidas Trefoil Hoodie</h4>
                            </a>
                            <div class="font-medium">
                                <span class="text-primary mr-1">$45.00</span>
                                <span class="text-[#687188] text-sm font-medium line-through">$55.45</span>
                            </div>
                            <div>
                                <div class="flex items-center justify-start">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                    </div>
                                    <p class="text-sm ml-2 text-[#687188]">(150)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center mb-5">
                        <div class="w-[105px] bg-[#F2F0F0] rounded-md p-2.5">
                            <a href="#">
                                <img loading="lazy" src="assets/images/prod-8.png"
                                     class="w-full h-[75px] object-contain flex-shrink-0" alt="product">
                            </a>
                        </div>
                        <div class="pl-4">
                            <a href="#">
                                <h4
                                    class="text-base font-medium text-secondary mb-1.5 hover:text-primary transition duration-300">
                                    RREG BROADCLOTH</h4>
                            </a>
                            <div class="font-medium">
                                <span class="text-primary mr-1">$45.00</span>
                                <span class="text-[#687188] text-sm font-medium line-through">$55.45</span>
                            </div>
                            <div>
                                <div class="flex items-center justify-start">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                    </div>
                                    <p class="text-sm ml-2 text-[#687188]">(150)</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center">
                        <div class="w-[105px] bg-[#F2F0F0] rounded-md p-2.5">
                            <a href="#">
                                <img loading="lazy" src="assets/images/prod-7.png"
                                     class="w-full h-[75px] object-contain flex-shrink-0" alt="product">
                            </a>
                        </div>
                        <div class="pl-4">
                            <a href="#">
                                <h4
                                    class="text-base font-medium text-secondary mb-1.5 hover:text-primary transition duration-300">
                                    Blazer Tenia - Lana-Beige</h4>
                            </a>
                            <div class="font-medium">
                                <span class="text-primary mr-1">$45.00</span>
                                <span class="text-[#687188] text-sm font-medium line-through">$55.45</span>
                            </div>
                            <div>
                                <div class="flex items-center justify-start">
                                    <div class="flex items-center space-x-1">
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                        <span class="text-[#F6BC3E]"><svg width="18" height="18" viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="m5.825 22l1.625-7.025L2 10.25l7.2-.625L12 3l2.8 6.625l7.2.625l-5.45 4.725L18.175 22L12 18.275Z">
                                                </path>
                                            </svg></span>
                                    </div>
                                    <p class="text-sm ml-2 text-[#687188]">(150)</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- best selling end-->
</x-shop::layouts.app>
