<!-- product quick view -->
<div x-data x-show="$store.productView.isActive"
     :class="$store.productView.isActive ? 'opacity-100 visible bg-black bg-opacity-50' : 'opacity-0 invisible bg-none bg-opacity-0'"
     class="fixed left-0 top-0 w-full h-full rounded-sm flex justify-center items-center z-20">
    <div @click.outside="$store.productView.isActive=false"
         class="relative max-w-[975px] max-h-[88vh] px-6 py-10 bg-white shadow overflow-y-auto mx-4 lg:mx-0">
        <button @click="$store.productView.isActive=false"
                class="w-6 h-6 bg-primary text-white rounded flex justify-center items-center absolute top-2 right-2">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                <path fill="currentColor"
                      d="M6.4 19L5 17.6l5.6-5.6L5 6.4L6.4 5l5.6 5.6L17.6 5L19 6.4L13.4 12l5.6 5.6l-1.4 1.4l-5.6-5.6Z"/>
            </svg>
        </button>
        <div class="grid grid-cols-12 gap-6">
            <div class="col-span-12 lg:col-span-6" x-data="productImageModule">

                <div class="flex justify-center items-center w-full">
                    <img loading="lazy" :src="productImages[imageIndex]" alt="product"/>
                </div>

                <div class="productSwiper mt-4 relative group">
                    <div x-data="productImages" class="swiper-wrapper flex">
                        <template x-for="(img,index) in productImages">
                            <div class="swiper-slide">
                                <div class="h-[80px] flex flex-shrink-0 justify-center items-center"
                                     @click="imageIndex = index">
                                    <img loading="lazy" :src="img" alt="product"
                                         :class="imageIndex === index ? 'border border-primary' : ''"
                                         class="w-full h-full object-cover">
                                </div>
                            </div>
                        </template>
                    </div>

                    <div
                            class="swiper-button-next box_shadow w-8 h-8 bg-[#eceef0] absolute right-0 top-1/2 opacity-0 group-hover:opacity-100 transition duration-300">
                    </div>
                    <div
                            class="swiper-button-prev box_shadow w-8 h-8 bg-[#eceef0] absolute left-0 top-1/2 opacity-0 group-hover:opacity-100 transition duration-300">
                    </div>

                </div>

            </div>
            <div class="col-span-12 lg:col-span-6">
                <div class="product_info_wrapper">
                    <div class="product_base_info">
                        <h1 class="text-xl sm:text-3xl uppercase">GADGET SHOWROOM</h1>
                        <div class="rating">
                            <div class="flex gap-3 items-center mt-4">
                                <div class="flex gap-1 items-center">
                                        <span class="text-yellow-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                 viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21L12 17.27z"/>
                                            </svg>
                                        </span>
                                    <span class="text-yellow-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                 viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21L12 17.27z"/>
                                            </svg>
                                        </span>
                                    <span class="text-yellow-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                 viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21L12 17.27z"/>
                                            </svg>
                                        </span>
                                    <span class="text-yellow-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                 viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21L12 17.27z"/>
                                            </svg>
                                        </span>
                                    <span class="text-yellow-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                                 viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                      d="M12 17.27L18.18 21l-1.64-7.03L22 9.24l-7.19-.61L12 2L9.19 8.63L2 9.24l5.46 4.73L5.82 21L12 17.27z"/>
                                            </svg>
                                        </span>
                                </div>
                                <p class="text-sm">50 Reviews</p>
                            </div>
                        </div>
                        <div class="space-y-2 mt-4">
                            <p><span class="font-medium pr-3">Availability:</span><span
                                        class="text-[#08B54C] font-medium">In Stock</span></p>
                            <p><span class="font-medium pr-3">Brand:</span>Bata</p>
                            <p><span class="font-medium pr-3">Category:</span>Clothing</p>
                            <p><span class="font-medium pr-3">SKU:</span>BE45VGRT</p>
                        </div>
                        <div class="mt-3 flex gap-3 items-center overflow-hidden">
                            <span class="line-through">$5000.00</span>
                            <span class="text-2xl text-primary font-semibold">$4500.00</span>
                            <div
                                    class="ml-3 text-sm bg-primary text-white px-2 py-[2px] relative after:absolute after:w-[14px] after:h-[14px] after:bg-primary after:-left-1 after:top-1 after:rotate-45">
                                -30%
                            </div>
                        </div>
                        <div class="mt-2">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Enim exercitationem
                                quaerat
                                excepturi labore blanditiis
                            </p>
                        </div>
                        <!-- size -->
                        <div class="shop_filter mt-4">
                            <h4 class="text-sm font-medium  text-secondary uppercase mb-2">Size</h4>
                            <div class="flex gap-3 items-center">
                                <div class="single_size_opt">
                                    <input type="radio" name="size" class="size_inp hidden" id="size-xs" checked>
                                    <label for="size-xs" class="px-1.5 py-1">XS</label>
                                </div>
                                <div class="single_size_opt ms-2">
                                    <input type="radio" hidden name="size" class="size_inp hidden" id="size-s">
                                    <label for="size-s" class="px-2.5 py-1">S</label>
                                </div>
                                <div class="single_size_opt ms-2">
                                    <input type="radio" hidden name="size" class="size_inp hidden" id="size-m">
                                    <label for="size-m" class="px-2.5 py-1">M</label>
                                </div>
                                <div class="single_size_opt ms-2">
                                    <input type="radio" hidden name="size" class="size_inp hidden" id="size-l">
                                    <label for="size-l" class="px-2.5 py-1">L</label>
                                </div>
                                <div class="single_size_opt ms-2">
                                    <input type="radio" hidden name="size" class="size_inp hidden" id="size-xl">
                                    <label for="size-xl" class="px-1.5 py-1">XL</label>
                                </div>
                            </div>
                        </div>

                        <!-- color -->
                        <div class="pb-4 mt-4">
                            <h4 class="text-sm uppercase mb-3 text-secondary">Color</h4>
                            <div class="size_selector color_selector flex gap-3 items-center">
                                <div class="single_size_opt relative group">
                                    <input type="radio" class="size_inp hidden" id="color-purple">
                                    <label for="color-purple" class="w-6 h-6 bg-primary focus:ring-1  inline-block"
                                           data-bs-toggle="tooltip" title="" data-bs-original-title="Rose Red"
                                           aria-label="Rose Red"></label>
                                    <p
                                            class="absolute -left-3 -top-9 opacity-0 group-hover:opacity-100 invisible group-hover:visible text-sm text-white bg-black w-20 py-1 text-center rounded after:absolute after:w-2 after:h-2 after:bg-black after:rotate-45 after:-bottom-1 after:left-4">
                                        Rose Red</p>
                                </div>
                                <div class="single_size_opt relative group">
                                    <input type="radio" hidden="" name="color" class="size_inp hidden"
                                           id="color-red">
                                    <label for="color-red"
                                           class="w-6 h-6  bg-white focus:bg-white focus:ring-1  inline-block"
                                           data-bs-toggle="tooltip" title="" data-bs-original-title="White"
                                           aria-label="White"></label>
                                    <p
                                            class="absolute -left-3 -top-9 opacity-0 group-hover:opacity-100 invisible group-hover:visible text-sm text-white bg-black w-16 py-1 text-center rounded after:absolute after:w-2 after:h-2 after:bg-black after:rotate-45 after:-bottom-1 after:left-4">
                                        White</p>
                                </div>
                                <div class="single_size_opt relative group">
                                    <input type="radio" hidden="" name="color" class="size_inp hidden"
                                           id="color-green">
                                    <label for="color-green" class="w-6 h-6  bg-black focus:ring-1  inline-block"
                                           data-bs-toggle="tooltip" title="" data-bs-original-title="Black"
                                           aria-label="Black"></label>
                                    <p
                                            class="absolute -left-3 -top-9 opacity-0 group-hover:opacity-100 invisible group-hover:visible text-sm text-white bg-black w-16 py-1 text-center rounded after:absolute after:w-2 after:h-2 after:bg-black after:rotate-45 after:-bottom-1 after:left-4">
                                        Black</p>
                                </div>
                            </div>
                        </div>

                        <!-- quantity -->
                        <div class="cart_qnty ms-md-auto">
                            <p>Quantity</p>
                            <div class="flex items-center  mt-1">
                                <div
                                        class="w-8 h-8 border hover:bg-[#E9E4E4] flex justify-center items-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19 12.998H5v-2h14z"/>
                                    </svg>
                                </div>
                                <div class="w-8 h-8 border flex justify-center items-center">4</div>
                                <div
                                        class="w-8 h-8 border hover:bg-[#E9E4E4] flex justify-center items-center cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M19 12.998h-6v6h-2v-6H5v-2h6v-6h2v6h6z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- add to cart & wishlist -->
                    <div class="flex gap-5 mt-6 border-b pb-5">
                        <a href="#"
                           class="flex gap-2 items-center border border-primary bg-primary text-sm sm:text-base text-white hover:bg-white hover:text-primary transition duration-300 px-2 sm:px-8 py-2 rounded uppercase group">
                                <span class="text-white group-hover:text-primary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24">
                                        <path fill="currentColor"
                                              d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 20.01 4H5.21l-.94-2H1v2h2l3.6 7.59l-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2s-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2s2-.9 2-2s-.9-2-2-2z"/>
                                    </svg>
                                </span>
                            Add to Cart
                        </a>
                        <a href="#"
                           class="flex gap-2 items-center border border-primary hover:bg-primary text-primary  hover:text-white transition duration-300 px-2 sm:px-8 py-2 rounded uppercase group">
                                <span class="text-primary group-hover:text-white">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                         viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                              d="M128 220.2a13.6 13.6 0 0 1-9.9-4.1L35 133a58 58 0 0 1 2.2-84.2a56.5 56.5 0 0 1 41.6-14a62.8 62.8 0 0 1 40.3 18.3L128 62l11-11a57.9 57.9 0 0 1 84.1 2.2a56.2 56.2 0 0 1 14.1 41.6a62.8 62.8 0 0 1-18.3 40.3l-81 81a13.6 13.6 0 0 1-9.9 4.1Zm5.6-8.3ZM75 46.7a44 44 0 0 0-29.7 11.1a45.8 45.8 0 0 0-1.8 66.7l83.1 83.1a1.9 1.9 0 0 0 2.8 0l81-81c18.2-18.2 19.9-47.5 3.8-65.3a45.8 45.8 0 0 0-66.7-1.8l-15.3 15.2a6.1 6.1 0 0 1-8.5 0l-13.1-13.1A50.3 50.3 0 0 0 75 46.7Z"/>
                                    </svg>
                                </span>
                            Wishlist
                        </a>
                    </div>
                    <!-- social icon -->
                    <div class="flex gap-3 items-center mt-4">
                        <a href="#"
                           class="w-8 h-8 border rounded-full flex justify-center items-center hover:bg-[#E9E4E4]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                      d="M9.945 22v-8.834H7V9.485h2.945V6.54c0-3.043 1.926-4.54 4.64-4.54c1.3 0 2.418.097 2.744.14v3.18h-1.883c-1.476 0-1.82.703-1.82 1.732v2.433h3.68l-.736 3.68h-2.944L13.685 22"/>
                            </svg>
                        </a>
                        <a href="#"
                           class="w-8 h-8 border rounded-full flex justify-center items-center hover:bg-[#E9E4E4]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M22.46 6c-.77.35-1.6.58-2.46.69c.88-.53 1.56-1.37 1.88-2.38c-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29c0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15c0 1.49.75 2.81 1.91 3.56c-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07a4.28 4.28 0 0 0 4 2.98a8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21C16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56c.84-.6 1.56-1.36 2.14-2.23Z"/>
                            </svg>
                        </a>
                        <a href="#"
                           class="w-8 h-8 border rounded-full flex justify-center items-center hover:bg-[#E9E4E4]">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 448 512">
                                <path fill="currentColor"
                                      d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9S287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7s74.7 33.5 74.7 74.7s-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8c-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8s26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9c-26.2-26.2-58-34.4-93.9-36.2c-37-2.1-147.9-2.1-184.9 0c-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9c1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0c35.9-1.7 67.7-9.9 93.9-36.2c26.2-26.2 34.4-58 36.2-93.9c2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6c-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6c-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6c29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6c11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
