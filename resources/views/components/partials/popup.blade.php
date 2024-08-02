<!-- popup -->
<div x-data="{open: false}" x-show="open" x-transition x-cloak x-init="setTimeout(() => {open = true}, 2000)"
     class="fixed w-full h-full top-0 left-0 bg-black/50 flex items-center justify-center px-[15px] z-30">
    <div @click.outside="open=false"
         class="relative w-full max-w-[700px] bg-white py-[66px] px-6 bg-no-repeat bg-right bg-contain rounded-[5px] opacity-100"
         style="background-image: url(assets/images/popup-bg.jpg);">
        <div class="w-full max-w-[380px] text-center">
            <button @click="open=false"
                    class="absolute right-2.5 top-2.5 text-secondary hover:text-primary transition duration-300">
                <svg width="22" height="22" viewBox="0 0 32 32">
                    <path fill="currentColor"
                          d="M7.219 5.781L5.78 7.22L14.563 16L5.78 24.781l1.44 1.439L16 17.437l8.781 8.782l1.438-1.438L17.437 16l8.782-8.781L24.78 5.78L16 14.563z"/>
                </svg>
            </button>
            <h2 class="text-[40px] leading-[50px] font-medium mb-2 text-secondary">GET <span
                        class="text-primary">30% </span>OFF</h2>
            <p class="text-[15px] leading-[22px] mb-4 text-secondary">
                Subscribe to the newsletter to receive updates about new products.
            </p>
            <form action="#" class="flex">
                <input type="text" placeholder="Your Email Address"
                       class="w-full bg-white rounded-l-[5px] border border-primary focus:ring-0 focus:border-primary border-r-transparent text-sm px-5 py-[14px] focus:outline-none">
                <button type="submit" class="min-w-[120px] primary-btn rounded-l-none">Subscribe</button>
            </form>
            <div class="mt-6">
                <div class="flex items-center justify-center">
                    <input type="checkbox" name="pointer" id="pointer">
                    <label for="pointer" class="pl-4 relative cursor-pointer text-secondary">Do not show this
                        again</label>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- popup end-->
