<div>
    <div class="product_view_wrap section_padding_b">
        <div class="container">
            <form wire:submit="addToCart('{{ $product->hash }}')">
                <div class="grid grid-cols-12 gap-6">
                    <div class="col-span-12 lg:col-span-6">

                        <div class="flex justify-center items-center">
                            <img loading="lazy" src="{{ $product->getCoverImage() }}" alt="{{ $product->name }}">
                        </div>
                    </div>
                    <div class="col-span-12 lg:col-span-6">
                        <div class="product_info_wrapper">
                            <div class="product_base_info">
                                <h1 class="text-2xl sm:text-3xl uppercase">{{ $product->name }}</h1>
                                <div class="rating">
                                    <div class="flex gap-3 items-center mt-4">
                                        <x-partials.rating :rating="$ratings->avg('rating')"
                                                           class="gap-1 items-center"/>
                                        <p class="text-sm">{{ trans_choice('product.ratings.count', count($ratings)) }}</p>
                                    </div>
                                </div>
                                <div class="space-y-2 mt-4">
                                    <p>
                                        <span class="font-medium pr-3">{{ __('zoker.shop::product.stock') }}</span>
                                        <x-partials.availability :product="$product"/>
                                    </p>
                                    <p><span
                                            class="font-medium pr-3">{{ __('zoker.shop::product.brand') }}</span>{{ $product->brand->name }}
                                    </p>
                                </div>
                                <div class="mt-3 flex gap-3 items-center overflow-hidden">
                                    {{--<span class="line-through">@money($product->price)</span>--}}
                                    <span class="text-2xl text-primary font-semibold">@money($product->price)</span>
                                    {{--<div
                                        class="ml-3 text-sm bg-primary text-white px-2 py-[2px] relative after:absolute after:w-[14px] after:h-[14px] after:bg-primary after:-left-1 after:top-1 after:rotate-45">
                                        -30%
                                    </div>--}}
                                </div>
                                <div class="mt-2">
                                    <p>{{ $product->description }}</p>
                                </div>

                                <!-- quantity -->
                                <div class="cart_qnty ms-md-auto mt-5">
                                    <p>{{ __('zoker.shop::product.quantity') }}</p>
                                    <div class="flex items-center  mt-1">
                                        <input type="number" wire:model="quantityForCart"
                                               class="w-16 h-8 border flex justify-center items-center"
                                               value="1" min="1" step="1" required>
                                    </div>
                                </div>
                            </div>
                            <!-- add to cart & wishlist -->
                            <div class="flex gap-5 mt-6 border-b pb-5">
                                <x-form.button class="flex gap-2 items-center sm:text-base px-2 sm:px-8 group">
                                    <span class="text-white group-hover:text-primary">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18"
                                             viewBox="0 0 24 24">
                                            <path fill="currentColor"
                                                  d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 20.01 4H5.21l-.94-2H1v2h2l3.6 7.59l-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2s-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2s2-.9 2-2s-.9-2-2-2z"/>
                                        </svg>
                                    </span>
                                    {{ __('zoker.shop::product.add_to_cart') }}
                                </x-form.button>
                                <button wire:click.prevent="toggleWishlist('{{ $product->hash }}')"
                                   class="flex gap-2 items-center border border-primary hover:bg-primary text-primary hover:text-white transition duration-300 px-2 sm:px-8 py-2 rounded uppercase group w-60">
                                    <span class="text-primary group-hover:text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24">
                                            @if(in_array($product->id, $wishlist))
                                                <path fill="currentColor"
                                                      d="m12 19.654l-.758-.685q-2.448-2.236-4.05-3.828q-1.601-1.593-2.528-2.81t-1.296-2.2T3 8.15q0-1.908 1.296-3.204T7.5 3.65q1.32 0 2.475.675T12 6.289Q12.87 5 14.025 4.325T16.5 3.65q1.908 0 3.204 1.296T21 8.15q0 .996-.368 1.98q-.369.986-1.296 2.202t-2.519 2.809q-1.592 1.592-4.06 3.828z"/>
                                            @else
                                                <path fill="currentColor"
                                                      d="m12 19.654l-.758-.685q-2.448-2.236-4.05-3.828q-1.601-1.593-2.528-2.81t-1.296-2.2T3 8.15q0-1.908 1.296-3.204T7.5 3.65q1.32 0 2.475.675T12 6.289Q12.87 5 14.025 4.325T16.5 3.65q1.908 0 3.204 1.296T21 8.15q0 .996-.368 1.98q-.369.986-1.296 2.202t-2.519 2.809q-1.592 1.592-4.06 3.828zm0-1.354q2.4-2.17 3.95-3.716t2.45-2.685t1.25-2.015Q20 9.006 20 8.15q0-1.5-1-2.5t-2.5-1q-1.194 0-2.204.682T12.49 7.385h-.978q-.817-1.39-1.817-2.063q-1-.672-2.194-.672q-1.48 0-2.49 1T4 8.15q0 .856.35 1.734t1.25 2.015t2.45 2.675T12 18.3m0-6.825"/>
                                            @endif
                                        </svg>
                                    </span>
                                    @if(in_array($product->id, $wishlist))
                                        {{ __('zoker.shop::product.wishlist.remove') }}
                                    @else
                                        {{ __('zoker.shop::product.wishlist.add') }}
                                    @endif
                                </button>
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
                <div class="flex gap-2 border-b mb-4">
                    <div @click="activeTab='info'" :class="{'!border-primary !text-primary' : activeTab ==='info' }"
                         class="border px-1 sm:px-4 py-2 rounded text-xs sm:text-base cursor-pointer rounded-b-none border-[#2B2D42] border-b-0">
                        {{ __('zoker.shop::product.tabs.properties') }}
                    </div>
                    <div @click="activeTab='question'"
                         :class="{'!border-primary !text-primary' : activeTab ==='question' }"
                         class="border px-1 sm:px-4 py-2 rounded text-xs sm:text-base cursor-pointer rounded-b-none border-[#2B2D42] border-b-0">
                        {{ __('zoker.shop::product.tabs.questions') }}
                    </div>
                    <div @click="activeTab='review'" :class="{'!border-primary !text-primary' : activeTab ==='review' }"
                         class="border px-1 sm:px-4 py-2 rounded text-xs sm:text-base cursor-pointer  rounded-b-none border-[#2B2D42] border-b-0">
                        {{ __('zoker.shop::product.tabs.reviews', ['count_reviews' => count($reviews)]) }}
                    </div>
                </div>
                <!-- product info -->
                <div x-show="activeTab==='info'" class="max-w-[800px]">
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
                    <h4>{{ trans_choice('product.questions.count', count($questions )) }}</h4>
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
                                    <p class="text-sm">{{ __('zoker.shop::product.questions.store_admin') }}
                                        - {{ $question->updated_at->format('d.m.Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    <div class="my-6">
                        <form wire:submit="newQuestion">
                            <textarea
                                @guest()placeholder="{{ __('zoker.shop::product.questions.new.placeholder_guest') }}" @endguest
                            @auth()placeholder="{{ __('zoker.shop::product.questions.new.placeholder') }}" @endguest
                                wire:model="question"
                                class="w-full p-5 border focus:border-primary focus:ring-0 rounded"
                                @guest() disabled @endguest
                                required
                            ></textarea>
                            <x-form.error name="question"/>
                            <x-form.button class="mt-6">{{ __('zoker.shop::product.questions.new.submit') }}</x-form.button>
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
                            <x-partials.rating :rating="$ratings->avg('rating')" class="mt-2"/>
                            <div class="text-sm mt-2">{{ trans_choice('product.ratings.count', count($ratings)) }}</div>
                        </div>
                        <div>
                            @foreach(range(1, 5) as $i)
                                <div class="flex items-center gap-3">
                                    <!-- rating -->
                                    <x-partials.rating :rating="$i"/>
                                    <p>{{ $ratings->where('rating', $i)->count() }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="flex gap-8 sm:gap-40 md:justify-between items-center mt-6">
                        <p class="m-0 text-semibold">{{ __('zoker.shop::product.reviews.title') }}</p>

                        {{--
                        TODO: Add filter
                        <div class="review_filters">
                            <select class="nice-select">
                                <option value="">Sort by</option>
                                <option value="">Price low-high</option>
                                <option value="">Price high-low</option>
                            </select>
                        </div>--}}
                    </div>
                    <div class="mt-6">
                        @foreach($reviews as $review)
                            <div class="flex gap-5 @if(!$loop->last) border-b @endif pb-5">
                                <!-- content -->
                                <div>
                                    <h5>{{ $review->user->name }} {{ $review->user->surname }}</h5>
                                    <!-- rating -->
                                    <x-partials.rating :rating="$review->rating"/>
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
                                    {{ __('zoker.shop::product.reviews.new.rating') }}
                                </div>
                                <div wire:ignore>
                                    <select wire:model="rating" class="nice-select" required>
                                        @foreach(range(1, 5) as $i)
                                            <option value="{{ $i }}">{{ $i }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <x-form.error name="rating"/>
                            <div class="pt-3">
                                <textarea
                                    @guest()placeholder="{{ __('zoker.shop::product.reviews.new.placeholder_guest') }}" @endguest
                                    @auth()placeholder="{{ __('zoker.shop::product.reviews.new.placeholder') }}" @endguest
                                    wire:model="review"
                                    class="w-full p-5 border focus:border-primary focus:ring-0 rounded"
                                    @guest() disabled @endguest
                                ></textarea>
                                <x-form.error name="review"/>
                            </div>
                            <x-form.button class="mt-6">{{ __('zoker.shop::product.reviews.new.submit') }}</x-form.button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
