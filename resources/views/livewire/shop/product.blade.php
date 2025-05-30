<div>
    <div class="product_view_wrap section_padding_b">
        <div class="container">
            <form wire:submit="addToCart('{{ $product->hash }}')">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-6">

                        <div class="flex justify-center items-center">
                            <img loading="lazy" src="{{ $product->getCoverImage(600, 600) }}" alt="{{ $product->name }}" id="product_main_image">
                        </div>

                        <div class="swiper-product-page mt-4 relative group overflow-hidden">
                            <div class="swiper-wrapper flex">
                                @foreach($product->images ?? [] as $image)
                                    <div class="swiper-slide">
                                        <div class="w-full h-[90px] flex justify-center items-center select-image cursor-pointer">
                                            <img loading="lazy" src="{{ $product->getImageUrl($image, 100, 100) }}" data-big-image="{{ $product->getImageUrl($image, 600, 600) }}" alt="{{ $product->name }}"
                                                 class="w-full h-full object-cover cursor-pointer">
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                            <div
                                class="swiper-button-next box_shadow w-8 h-8 bg-[#eceef0] absolute right-0 top-1/2 opacity-25 group-hover:opacity-100 transition duration-300">
                            </div>
                            <div
                                class="swiper-button-prev box_shadow w-8 h-8 bg-[#eceef0] absolute left-0 top-1/2 opacity-25 group-hover:opacity-100 transition duration-300">
                            </div>

                        </div>

                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <div class="product_info_wrapper">
                            <div class="product_base_info">
                                <h1 class="text-2xl sm:text-3xl">{{ $product->name }}</h1>
                                <div class="rating">
                                    <div class="flex gap-3 items-center mt-4">
                                        <x-shop::partials.rating :rating="$ratings->avg('rating')"
                                                           class="gap-1 items-center"/>
                                        <p class="text-sm">{{ trans_choice('shop::product.ratings.count', count($ratings)) }}</p>
                                    </div>
                                </div>
                                <div class="space-y-1 mt-6">
                                    <p>
                                        <span class="font-medium pr-3">{{ __('shop::product.stock') }}</span>
                                        <x-shop::partials.availability :product="$product"/>
                                    </p>
                                    @if($product->brand)
                                    <p>
                                        <span class="font-medium pr-3">{{ __('shop::product.brand') }}</span>{{ $product->brand->name }}
                                    </p>
                                    @endif
                                    <p>
                                        <span class="font-medium pr-3">Artikel:</span> {{ $product->foreign_id }}
                                    </p>
                                </div>
                                <div class="mt-7 flex gap-3 items-center overflow-hidden">
                                    {{--<span class="line-through">@money($product->price)</span>--}}
                                    <span class="text-2xl text-primary font-semibold price">@money($product->price)</span>
                                    {{--<div
                                        class="ml-3 text-sm bg-primary text-white px-2 py-[2px] relative after:absolute after:w-[14px] after:h-[14px] after:bg-primary after:-left-1 after:top-1 after:rotate-45">
                                        -30%
                                    </div>--}}
                                </div>
                                <div class="mt-2">
                                    <p class="text-[#666666]">{{ $product->description }}</p>
                                </div>


                                <div class="addtocart-wrapper flex gap-6 items-center mt-6">
                                    <!-- quantity -->
                                    <div class="cart_qnty ms-md-auto flex flex-row gap-0">
                                        <!-- <p>{{ __('shop::product.quantity') }}</p> -->
                                        <a href="#" wire:click.prevent="$set('quantityForCart', parseInt(document.getElementById('quantityForCart').value) - 1)" class="rounded-l-md h-14 w-10 flex justify-center items-center bg-[#dddddd] hover:bg-[#333333] text-black hover:text-white text-lg font-semibold transform-all duration-300">
                                            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path fill="currentColor" d="M416 208H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h384c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32"/>
                                            </svg>
                                        </a>
                                        <div class="flex items-center">
                                            <input type="number" wire:model="quantityForCart"
                                                   id="quantityForCart"
                                                class="h-14 w-14 border-t border-b border-[#dddddd] flex justify-center items-center focus:!outline-none"
                                                value="1" min="1" step="1" required>
                                        </div>
                                        <a href="#" wire:click.prevent="$set('quantityForCart', parseInt(document.getElementById('quantityForCart').value) + 1)" class="rounded-r-md h-14 w-10 flex justify-center items-center bg-[#dddddd] hover:bg-[#333333] text-black hover:text-white text-lg font-semibold transform-all duration-300">
                                            <svg height="16" width="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                                                <path fill="currentColor" d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32"/>
                                            </svg>
                                        </a>
                                    </div>
                                    <x-shop::form.addtocart class="flex gap-4 items-center sm:text-base px-2 sm:px-8 group w-full justify-center">
                                        {{ __('shop::product.add_to_cart') }}
                                        <span class="text-white ">
                                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M15.543 9.517a.75.75 0 1 0-1.086-1.034l-2.314 2.43l-.6-.63a.75.75 0 1 0-1.086 1.034l1.143 1.2a.75.75 0 0 0 1.086 0z"/>
                                                <path fill="currentColor" fill-rule="evenodd" d="M1.293 2.751a.75.75 0 0 1 .956-.459l.301.106c.617.217 1.14.401 1.553.603c.44.217.818.483 1.102.899c.282.412.399.865.452 1.362l.011.108H17.12c.819 0 1.653 0 2.34.077c.35.039.697.101 1.003.209c.3.105.631.278.866.584c.382.496.449 1.074.413 1.66c-.035.558-.173 1.252-.338 2.077l-.01.053l-.002.004l-.508 2.47c-.15.726-.276 1.337-.439 1.82c-.172.51-.41.96-.837 1.308c-.427.347-.916.49-1.451.556c-.505.062-1.13.062-1.87.062H10.88c-1.345 0-2.435 0-3.293-.122c-.897-.127-1.65-.4-2.243-1.026c-.547-.576-.839-1.188-.985-2.042c-.137-.8-.15-1.848-.15-3.3V7.038c0-.74-.002-1.235-.043-1.615c-.04-.363-.109-.545-.2-.677c-.087-.129-.22-.25-.524-.398c-.323-.158-.762-.314-1.43-.549l-.26-.091a.75.75 0 0 1-.46-.957M5.708 6.87v2.89c0 1.489.018 2.398.13 3.047c.101.595.274.925.594 1.263c.273.288.65.472 1.365.573c.74.105 1.724.107 3.14.107h5.304c.799 0 1.33-.001 1.734-.05c.382-.047.56-.129.685-.231s.24-.26.364-.625c.13-.385.238-.905.4-1.688l.498-2.42v-.002c.178-.89.295-1.482.322-1.926c.026-.422-.04-.569-.101-.65a.6.6 0 0 0-.177-.087a3.2 3.2 0 0 0-.672-.134c-.595-.066-1.349-.067-2.205-.067zM5.25 19.5a2.25 2.25 0 1 0 4.5 0a2.25 2.25 0 0 0-4.5 0m2.25.75a.75.75 0 1 1 0-1.5a.75.75 0 0 1 0 1.5m6.75-.75a2.25 2.25 0 1 0 4.5 0a2.25 2.25 0 0 0-4.5 0m2.25.75a.75.75 0 1 1 0-1.5a.75.75 0 0 1 0 1.5" clip-rule="evenodd"/>
                                            </svg>
                                        </span>
                                    </x-shop::form.addtocart>
                                </div>
                                <!-- wishlist -->
                                <div class="flex justify-end mt-4">
                                    <button wire:click.prevent="toggleWishlist('{{ $product->hash }}')"
                                    class="flex gap-2 transition duration-300 py-2 rounded group text-[#666666] hover:text-secondary transition duration-300">
                                        <span class="text-[#666666] group-hover:text-secondary">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24">
                                                @if(in_array($product->id, $wishlist))
                                                    <path fill="red"
                                                        d="m12 19.654l-.758-.685q-2.448-2.236-4.05-3.828q-1.601-1.593-2.528-2.81t-1.296-2.2T3 8.15q0-1.908 1.296-3.204T7.5 3.65q1.32 0 2.475.675T12 6.289Q12.87 5 14.025 4.325T16.5 3.65q1.908 0 3.204 1.296T21 8.15q0 .996-.368 1.98q-.369.986-1.296 2.202t-2.519 2.809q-1.592 1.592-4.06 3.828z"/>
                                                @else
                                                    <path fill="currentColor"
                                                        d="m12 19.654l-.758-.685q-2.448-2.236-4.05-3.828q-1.601-1.593-2.528-2.81t-1.296-2.2T3 8.15q0-1.908 1.296-3.204T7.5 3.65q1.32 0 2.475.675T12 6.289Q12.87 5 14.025 4.325T16.5 3.65q1.908 0 3.204 1.296T21 8.15q0 .996-.368 1.98q-.369.986-1.296 2.202t-2.519 2.809q-1.592 1.592-4.06 3.828zm0-1.354q2.4-2.17 3.95-3.716t2.45-2.685t1.25-2.015Q20 9.006 20 8.15q0-1.5-1-2.5t-2.5-1q-1.194 0-2.204.682T12.49 7.385h-.978q-.817-1.39-1.817-2.063q-1-.672-2.194-.672q-1.48 0-2.49 1T4 8.15q0 .856.35 1.734t1.25 2.015t2.45 2.675T12 18.3m0-6.825"/>
                                                @endif
                                            </svg>
                                        </span>
                                        @if(in_array($product->id, $wishlist))
                                            {{ __('shop::product.wishlist.remove') }}
                                        @else
                                            {{ __('shop::product.wishlist.add') }}
                                        @endif
                                    </button>
                                </div>
                            </div>
                            {{--
                            TODO: Add social icon
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 448 512">
                                        <path fill="currentColor"
                                              d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9S287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7s74.7 33.5 74.7 74.7s-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8c-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8s26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9c-26.2-26.2-58-34.4-93.9-36.2c-37-2.1-147.9-2.1-184.9 0c-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9c1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0c35.9-1.7 67.7-9.9 93.9-36.2c26.2-26.2 34.4-58 36.2-93.9c2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6c-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6c-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6c29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6c11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z"/>
                                    </svg>
                                </a>
                            </div>--}}
                        </div>
                    </div>
                </div>
            </form>
            <div x-data="{activeTab: 'info'}" class="product_view_tabs mt-28">
                <div class="flex gap-2 mb-4">
                    <div @click="activeTab='info'"
                        :class="{'!border-secondary !text-white bg-secondary hover:!bg-secondary' : activeTab ==='info' }"
                         class="font-semibold px-4 sm:px-4 py-3 rounded-sm text-xs sm:text-base cursor-pointer bg-[#dddddd] hover:bg-[#eeeeee] transition-all duration-300">
                        {{ __('shop::product.tabs.properties') }}
                    </div>
                    <div @click="activeTab='question'"
                         :class="{'!border-secondary !text-white bg-secondary hover:!bg-secondary' : activeTab ==='question' }"
                         class="font-semibold px-4 sm:px-4 py-3 rounded-sm text-xs sm:text-base cursor-pointer bg-[#dddddd] hover:bg-[#eeeeee] transition-all duration-300">
                        {{ __('shop::product.tabs.questions') }}
                    </div>
                    <div @click="activeTab='review'"
                        :class="{'!border-secondary !text-white bg-secondary hover:!bg-secondary' : activeTab ==='review' }"
                         class="font-semibold px-4 sm:px-4 py-3 rounded-sm text-xs sm:text-base cursor-pointer bg-[#dddddd] hover:bg-[#eeeeee] transition-all duration-300">
                        {{ __('shop::product.tabs.reviews', ['count_reviews' => count($reviews)]) }}
                    </div>
                </div>
                <!-- product info -->
                <div x-show="activeTab==='info'" class="">
                    {{--<div class="pbt_info_text">
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nec condimentum lorem
                            lacus. Lectus
                            libero in vulputate quis massa nisl risus, libero ut. Morbi praesent ipsum sed morbi
                            turpis sed.
                            Amet
                            sed fames fermentum, augue dignissim. Montes, velit velit eu gravida nibh in
                            feugiat.
                        </p>
                        <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Est nec condimentum
                            lorem
                            lacus.
                            Lectus
                            libero in vulputate quis massa nisl risus, libero ut. Morbi praesent ipsum sed morbi
                            turpis sed.
                            Amet
                            sed fames fermentum, augue dignissim. Montes, velit velit eu gravida nibh in
                            feugiat.
                        </p>
                    </div>--}}
                    <table class="my-6 border border-secondary rounded w-full">
                        @foreach($product->properties as $property)
                            <tr class="border-b w-max">
                                <td class="px-3 py-2 w-1/4 border-r">{{ $property->name }}</td>
                                <td class="px-3 py-2 w-max">@include($property->getValueBladeComponentName())</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
                <!-- question & answer -->
                <div x-show="activeTab==='question'" class="mt-6">
                    <h4>{{ trans_choice('shop::product.questions.count', count($questions )) }}</h4>
                    @foreach($questions as $question)
                        <div class="mt-6 @if (!$loop->last) border-b @endif pb-5">
                            <div class="flex items-center gap-4">
                                <div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                              d="M230.2 213a118.3 118.3 0 0 0-70.5-54.6a70 70 0 1 0-63.4 0A118.3 118.3 0 0 0 25.8 213a5.9 5.9 0 0 0 2.2 8.2a6 6 0 0 0 8.2-2.2a106 106 0 0 1 183.6 0a6 6 0 0 0 5.2 3a6.4 6.4 0 0 0 3-.8a5.9 5.9 0 0 0 2.2-8.2ZM70 96a58 58 0 1 1 58 58a58 58 0 0 1-58-58Z"/>
                                    </svg>
                                </div>
                                <div class="pbqna_content">
                                    <h5>{{ $question->question }}</h5>
                                    <p class="text-sm">{{ $question->user->name }} {{ $question->user->surname }}
                                        - {{ $question->created_at->format('d.m.Y') }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-4 mt-2">
                                <div class="align-text-top">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                         viewBox="0 0 256 256">
                                        <path fill="currentColor"
                                              d="M32 128v56a16 16 0 0 0 16 16h16a16 16 0 0 0 16-16v-40a16 16 0 0 0-16-16Zm193.5 0h-32a16 16 0 0 0-16 16v40a16 16 0 0 0 16 16h16a16 16 0 0 0 16-16Z"
                                              opacity=".2"/>
                                        <path fill="currentColor"
                                              d="M202.7 54.2A103.1 103.1 0 0 0 129.5 24H128A104 104 0 0 0 24 128v56a24.1 24.1 0 0 0 24 24h16a24.1 24.1 0 0 0 24-24v-40a24.1 24.1 0 0 0-24-24H40.4a87.8 87.8 0 0 1 88.3-80h.1a88 88 0 0 1 88.3 80h-23.6a24 24 0 0 0-24 24v40a24 24 0 0 0 24 24h16a23.6 23.6 0 0 0 8-1.4v1.4a24.1 24.1 0 0 1-24 24H136a8 8 0 0 0 0 16h57.5a40.1 40.1 0 0 0 40-40v-80a103.5 103.5 0 0 0-30.8-73.8ZM64 136a8 8 0 0 1 8 8v40a8 8 0 0 1-8 8H48a8 8 0 0 1-8-8v-48Zm145.5 56h-16a8 8 0 0 1-8-8v-40a8 8 0 0 1 8-8h24v48a8 8 0 0 1-8 8Z"/>
                                    </svg>
                                </div>
                                <div class="pbqna_content">
                                    <p class="text-secondary">{!! $question->answer !!}</p>
                                    <p class="text-sm">{{ __('shop::product.questions.store_admin') }}
                                        - {{ $question->updated_at->format('d.m.Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="my-6">
                        <form wire:submit="newQuestion">
                            <textarea
                                @guest()placeholder="{{ __('shop::product.questions.new.placeholder_guest') }}" @endguest
                            @auth()placeholder="{{ __('shop::product.questions.new.placeholder') }}" @endguest
                                wire:model="question"
                                class="w-full p-5 border focus:border-primary focus:ring-0 rounded"
                                @guest() disabled @endguest
                                required
                            ></textarea>
                            <x-shop::form.error name="question"/>
                            <x-shop::form.button class="mt-6">{{ __('shop::product.questions.new.submit') }}</x-shop::form.button>
                        </form>
                    </div>
                </div>
                <!-- reviews -->
                <div x-show="activeTab==='review'" class="mt-6">
                    <div class="sm:flex gap-5">
                        <div class="total_rating">
                            <div class="trating_number">
                                <span class="text-3xl">{{ round($ratings->avg('rating'), 1) }}</span>
                                <span class="text-3xl">/5</span>
                            </div>
                            <!-- rating -->
                            <x-shop::partials.rating :rating="$ratings->avg('rating')" class="mt-2"/>
                            <div class="text-sm mt-2">{{ trans_choice('shop::product.ratings.count', count($ratings)) }}</div>
                        </div>
                        <div>
                            @foreach(range(1, 5) as $i)
                                <div class="flex items-center gap-3">
                                    <!-- rating -->
                                    <x-shop::partials.rating :rating="$i"/>
                                    <p>{{ $ratings->where('rating', $i)->count() }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex gap-8 sm:gap-40 md:justify-between items-center mt-6">
                        <p class="m-0 text-semibold">{{ __('shop::product.reviews.title') }}</p>
                    </div>
                    <div class="mt-6">
                        @foreach($reviews as $review)
                            <div class="flex gap-5 @if(!$loop->last) border-b @endif pb-5">
                                <!-- content -->
                                <div>
                                    <h5>{{ $review->user->name }} {{ $review->user->surname }}</h5>
                                    <!-- rating -->
                                    <x-shop::partials.rating :rating="$review->rating"/>
                                    <div class="text-xs mt-2">{{ $review->created_at->format('d.m.Y') }}</div>
                                    <p class="mt-2">{{ $review->review }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="my-6">
                        <form wire:submit="newReview">
                            <div class="flex items-center gap-3">
                                <div>
                                    {{ __('shop::product.reviews.new.rating') }}
                                </div>
                                <div wire:ignore>
                                    <select wire:model="rating" class="nice-select" required>
                                        @foreach(range(1, 5) as $i)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <x-shop::form.error name="rating"/>
                            <div class="pt-3">
                                <textarea
                                    @guest()placeholder="{{ __('shop::product.reviews.new.placeholder_guest') }}" @endguest
                                    @auth()placeholder="{{ __('shop::product.reviews.new.placeholder') }}" @endguest
                                    wire:model="review"
                                    class="w-full p-5 border focus:border-primary focus:ring-0 rounded"
                                    @guest() disabled @endguest
                                ></textarea>
                                <x-shop::form.error name="review"/>
                            </div>
                            <x-shop::form.button class="mt-6">{{ __('shop::product.reviews.new.submit') }}</x-shop::form.button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
