<div class="col-span-12 lg:col-span-9" id="pagination_top">
    @foreach($userWishlist as $item)
        <div class="md:flex justify-between items-center border border-[#E9E4E4] rounded-md p-2 mb-3">
            <div class="w-20 h-20">
                <img loading="lazy" class="w-full h-full object-cover" src="{{ $item->product->getCoverImage(100, 100) }}"
                     alt="{{ $item->product->name }}">
            </div>
            <div class="mt-6 md:mt-0">
                <a href="{{ route('product', $item->product) }}" class="hover:text-secondary transition durition-300">
                    <h5>{{ $item->product->name }}</h5>
                </a>
                <p class="instock mb-0">Availability:
                    <x-shop::partials.availability :product="$item->product"/>
                </p>
            </div>

            <div class="text-[18px] text-secondary font-semibold mt-2 md:mt-0">
                @money($item->product->price)
            </div>
            <div class="flex justify-between md:gap-6 items-center mt-4 md:mt-0">
                <div class="group">
                    <button
                        class="flex gap-2 items-center bg-secondary text-white text-sm font-semibold px-6 py-2 rounded hover:bg-black transition duration-300
                                @if(!$item->product->stock > 0 && !config('shop.product.allow_overstock')) disable disabled @endif"
                        wire:click="addToCart('{{ $item->product->hash }}')">
                            <span class="text-white transition">
                            <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="M15.543 9.517a.75.75 0 1 0-1.086-1.034l-2.314 2.43l-.6-.63a.75.75 0 1 0-1.086 1.034l1.143 1.2a.75.75 0 0 0 1.086 0z"></path>
                                                <path fill="currentColor" fill-rule="evenodd" d="M1.293 2.751a.75.75 0 0 1 .956-.459l.301.106c.617.217 1.14.401 1.553.603c.44.217.818.483 1.102.899c.282.412.399.865.452 1.362l.011.108H17.12c.819 0 1.653 0 2.34.077c.35.039.697.101 1.003.209c.3.105.631.278.866.584c.382.496.449 1.074.413 1.66c-.035.558-.173 1.252-.338 2.077l-.01.053l-.002.004l-.508 2.47c-.15.726-.276 1.337-.439 1.82c-.172.51-.41.96-.837 1.308c-.427.347-.916.49-1.451.556c-.505.062-1.13.062-1.87.062H10.88c-1.345 0-2.435 0-3.293-.122c-.897-.127-1.65-.4-2.243-1.026c-.547-.576-.839-1.188-.985-2.042c-.137-.8-.15-1.848-.15-3.3V7.038c0-.74-.002-1.235-.043-1.615c-.04-.363-.109-.545-.2-.677c-.087-.129-.22-.25-.524-.398c-.323-.158-.762-.314-1.43-.549l-.26-.091a.75.75 0 0 1-.46-.957M5.708 6.87v2.89c0 1.489.018 2.398.13 3.047c.101.595.274.925.594 1.263c.273.288.65.472 1.365.573c.74.105 1.724.107 3.14.107h5.304c.799 0 1.33-.001 1.734-.05c.382-.047.56-.129.685-.231s.24-.26.364-.625c.13-.385.238-.905.4-1.688l.498-2.42v-.002c.178-.89.295-1.482.322-1.926c.026-.422-.04-.569-.101-.65a.6.6 0 0 0-.177-.087a3.2 3.2 0 0 0-.672-.134c-.595-.066-1.349-.067-2.205-.067zM5.25 19.5a2.25 2.25 0 1 0 4.5 0a2.25 2.25 0 0 0-4.5 0m2.25.75a.75.75 0 1 1 0-1.5a.75.75 0 0 1 0 1.5m6.75-.75a2.25 2.25 0 1 0 4.5 0a2.25 2.25 0 0 0-4.5 0m2.25.75a.75.75 0 1 1 0-1.5a.75.75 0 0 1 0 1.5" clip-rule="evenodd"></path>
                                            </svg>
                            </span> Add to Cart
                    </button>
                </div>
                <div >
                    <button wire:click="toggleWishlist('{{ $item->product->hash }}')" class="cursor-pointer hover:text-primary transition">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="M7 21q-.825 0-1.412-.587Q5 19.825 5 19V6q-.425 0-.713-.287Q4 5.425 4 5t.287-.713Q4.575 4 5 4h4q0-.425.288-.713Q9.575 3 10 3h4q.425 0 .713.287Q15 3.575 15 4h4q.425 0 .712.287Q20 4.575 20 5t-.288.713Q19.425 6 19 6v13q0 .825-.587 1.413Q17.825 21 17 21ZM7 6v13h10V6Zm2 10q0 .425.288.712Q9.575 17 10 17t.713-.288Q11 16.425 11 16V9q0-.425-.287-.713Q10.425 8 10 8t-.712.287Q9 8.575 9 9Zm4 0q0 .425.288.712q.287.288.712.288t.713-.288Q15 16.425 15 16V9q0-.425-.287-.713Q14.425 8 14 8t-.712.287Q13 8.575 13 9ZM7 6v13V6Z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    @endforeach

        {{ $userWishlist->links('shop::components.partials.pagination') }}
</div>
