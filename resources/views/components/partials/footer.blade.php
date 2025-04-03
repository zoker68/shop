<!-- footer area -->
<footer class="bg-[#f3f3f3] py-14">
    <div class="container">
        <div class="grid lg:grid-cols-2 xl:grid-cols-3 gap-4 xl:gap-6">
            <div class="col-span-1">
                <div class="flex lg:flex-wrap md:flex-nowrap flex-wrap">
                    <div class="w-full">
                        <div class="w-[120px]">
                            <img src="{{ asset('assets/images/logo.png') }}" class="w-full object-contain" alt="{{ config('app.name') }}">
                        </div>
                        <div class="w-full">
                            <p class="text-sm sm:text-[15px] text-[#2B2D42] mt-4 flex-wrap md:max-w-[330px]">Lorem
                                ipsum, or lipsum as it is sometimes kno
                                wn, is dummy text used in laying out print, gra
                                phic or web designs the passage.</p>
                        </div>
                    </div>
                    <div class="w-full md:pl-3 lg:pl-0">
                        <div>
                            <h4 class="text-lg text-secondary mt-6 mb-[15px]">NEWSLETTER</h4>
                            <form class="flex">
                                <input type="text" placeholder="Your email address"
                                       class="py-2.5 px-[15px] text-[13px] w-full sm:w-[230px] md:w-full lg:w-[230px] text-secondary bg-transparent rounded-l-[5px] border border-[#c7c7c7] focus:ring-0 focus:border-primary">
                                <button type="submit"
                                        class="default_btn py-2 px-2.5 min-w-[105px] rounded-r-[5px] rounded-l-none">
                                    SUBSCRIBE
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div class="flex flex-wrap">
                    <div class="w-1/2 lg:px-3">
                        <div class="footer-menu">
                            <h4 class="text-lg text-black font-semibold mb-5 mt-2">MY ACCOUNT</h4>
                            <x-fsp::menu code="footer-left"/>
                        </div>
                    </div>
                    <div class="w-1/2 px-3">
                        <div class="footer-menu">
                            <h4 class="text-lg text-black font-semibold mb-5 mt-2">INFORMATION</h4>
                            <x-fsp::menu code="footer-right"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-span-1">
                <div>
                    <div class="flex flex-wrap">
                        <div class="w-full">
                            <h4 class="text-lg text-black font-semibold mb-5 mt-2">CONTACT</h4>
                            <div>
                                <p class="text-[15px] text-secondary relative pl-8 mb-[13px]">
                                        <span class="absolute left-1 top-1"><svg width="15" height="15"
                                                                                 viewBox="0 0 512 512">
                                                <path fill="currentColor"
                                                      d="M253.924 127.592a64 64 0 1 0 64 64a64.073 64.073 0 0 0-64-64Zm0 96a32 32 0 1 1 32-32a32.037 32.037 0 0 1-32 32Z"/>
                                                <path fill="currentColor"
                                                      d="M376.906 68.515A173.922 173.922 0 0 0 108.2 286.426l120.907 185.613a29.619 29.619 0 0 0 49.635 0l120.911-185.613a173.921 173.921 0 0 0-22.747-217.911Zm-4.065 200.444l-118.916 182.55l-118.917-182.55c-36.4-55.879-28.593-130.659 18.563-177.817a141.92 141.92 0 0 1 200.708 0c47.156 47.158 54.962 121.938 18.562 177.817Z"/>
                                            </svg></span>

                                    7895 Dr New Albuquerue, NM 19800, <br> United
                                    States Of America
                                </p>
                                <p class="text-[15px] text-secondary relative pl-8 mb-[13px]">
                                        <span class="absolute left-1 top-1"><svg width="15" height="15"
                                                                                 viewBox="0 0 24 24">
                                                <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                      stroke-linejoin="round" stroke-width="2"
                                                      d="M10.554 6.24L7.171 2.335c-.39-.45-1.105-.448-1.558.006L2.831 5.128c-.828.829-1.065 2.06-.586 3.047a29.207 29.207 0 0 0 13.561 13.58c.986.479 2.216.242 3.044-.587l2.808-2.813c.455-.455.456-1.174.002-1.564l-3.92-3.365c-.41-.352-1.047-.306-1.458.106l-1.364 1.366a.462.462 0 0 1-.553.088a14.557 14.557 0 0 1-5.36-5.367a.463.463 0 0 1 .088-.554l1.36-1.361c.412-.414.457-1.054.101-1.465Z"/>
                                            </svg></span>
                                    <a href="tel:+38669794717">+386 (0) 69 794 717</a>
                                </p>
                                <p class="text-[15px] text-secondary relative pl-8 mb-[13px]">
                                        <span class="absolute left-1 top-1"><svg width="15" height="15"
                                                                                 viewBox="0 0 256 256">
                                                <path fill="currentColor" d="m224 56l-96 88l-96-88Z" opacity=".2"/>
                                                <path fill="currentColor"
                                                      d="M224 48H32a8 8 0 0 0-8 8v136a16 16 0 0 0 16 16h176a16 16 0 0 0 16-16V56a8 8 0 0 0-8-8Zm-20.6 16L128 133.1L52.6 64ZM216 192H40V74.2l82.6 75.7a8 8 0 0 0 10.8 0L216 74.2V192Z"/>
                                            </svg></span>
                                    <a href="mailto:info@vase-orodje.si">info@vase-orodje.si</a>
                                </p>
                            </div>
                        </div>
                        <div class="w-full">
                            <div class="mt-1.5 flex">
                                <a href="#"
                                   class="bg-[#3B5998] w-8 h-8 flex items-center justify-center rounded-full mr-3 leading-8 text-white">
                                    <svg width="16" height="16" viewBox="0 0 24 24">
                                        <path fill="currentColor" fill-rule="evenodd"
                                              d="M9.945 22v-8.834H7V9.485h2.945V6.54c0-3.043 1.926-4.54 4.64-4.54c1.3 0 2.418.097 2.744.14v3.18h-1.883c-1.476 0-1.82.703-1.82 1.732v2.433h3.68l-.736 3.68h-2.944L13.685 22"/>
                                    </svg>
                                </a>
                                <a href="#"
                                   class="bg-[#00ACEE] w-8 h-8 flex items-center justify-center rounded-full mr-3 leading-8 text-white">
                                    <svg width="15" height="15" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23Z"/>
                                    </svg>
                                </a>
                                <a href="#"
                                   class="bg-[#D53982] w-8 h-8 flex items-center justify-center rounded-full mr-3 leading-8 text-white">
                                    <svg width="14" height="14" viewBox="0 0 512 512">
                                        <path fill="currentColor"
                                              d="M349.33 69.33a93.62 93.62 0 0 1 93.34 93.34v186.66a93.62 93.62 0 0 1-93.34 93.34H162.67a93.62 93.62 0 0 1-93.34-93.34V162.67a93.62 93.62 0 0 1 93.34-93.34h186.66m0-37.33H162.67C90.8 32 32 90.8 32 162.67v186.66C32 421.2 90.8 480 162.67 480h186.66C421.2 480 480 421.2 480 349.33V162.67C480 90.8 421.2 32 349.33 32Z"/>
                                        <path fill="currentColor"
                                              d="M377.33 162.67a28 28 0 1 1 28-28a27.94 27.94 0 0 1-28 28ZM256 181.33A74.67 74.67 0 1 1 181.33 256A74.75 74.75 0 0 1 256 181.33m0-37.33a112 112 0 1 0 112 112a112 112 0 0 0-112-112Z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- copyright -->
<div class="bg-secondary py-3 mb-[70px] lg:mb-0">
    <div class="container">
        <div class="md:flex md:flex-wrap items-center">
            <div class="w-full md:w-1/2 text-center md:text-start mb-2.5 md:mb-0">
                <p class="text-base text-[#F9F9F9]"> © {{ date('Y') }} Whootalks d.o.o. </p>
            </div>
            <div class="w-full md:w-1/2">
                <div class="text-center md:text-right">
                    <img src="{{ asset('assets/images/payment-method.png') }}" class="w-[333px] inline-block flex-shrink-0"
                         alt="payment method">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- copyright end -->
