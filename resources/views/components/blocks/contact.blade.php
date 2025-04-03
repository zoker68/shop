<!-- contact us banner -->
<div class="bg-cover bg-center bg-no-repeat h-[350px]"
     style="background-image: url(./assets/images/contact-banner.jpg);">
    <div class="container mx-auto py-36">
        <h1 class="text-center text-3xl uppercase text-white mb-1">{{ __('shop::contact.breadcrumbs.title') }}</h1>
        <div class="flex justify-center items-center">
            <a href="{{ route('index') }}" class="text-primary">
                <svg width="17" height="17" viewBox="0 0 32 32">
                    <path fill="currentColor"
                          d="m16 2.594l-.719.687l-13 13L3.72 17.72L5 16.437V28h9V18h4v10h9V16.437l1.281 1.282l1.438-1.438l-13-13zm0 2.844l9 9V26h-5V16h-8v10H7V14.437z" />
                </svg>
            </a>
            <span class="text-white">
                    <svg width="22" height="22" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M10 6L8.59 7.41L13.17 12l-4.58 4.59L10 18l6-6l-6-6z" /></svg>
                </span>
            <span class="text-white">{{ __('shop::contact.breadcrumbs.contact_us') }}</span>
        </div>
    </div>
</div>

<!-- contact form -->
<div class="container py-14">
    <div class="grid grid-cols-12 gap-6">
        <div class="col-span-12 lg:col-span-7 bg-white box_shadow px-[30px] py-[24px]">
            @livewire('shop.contact')
        </div>
        <div class="col-span-12 lg:col-span-5 bg-white box_shadow px-[30px] py-[24px]">
            <div class=" padding_default border-0 shadow_sm">
                <h4 class="text-[18px] uppercase mb-[14px]">{{ __('shop::contact.our_store') }}</h4>
                <div class="footer_contact">
                    <div class="relative pb-3">
                        <p class="absolute top-1 left-0">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 512 512">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                      stroke-width="32"
                                      d="M256 48c-79.5 0-144 61.39-144 137c0 87 96 224.87 131.25 272.49a15.77 15.77 0 0 0 25.5 0C304 409.89 400 272.07 400 185c0-75.61-64.5-137-144-137Z" />
                                <circle cx="256" cy="192" r="48" fill="none" stroke="currentColor"
                                        stroke-linecap="round" stroke-linejoin="round" stroke-width="32" /></svg>
                        </p>
                        <p class="pl-[32px]"><a href="https://www.google.com/maps/place/{{ $address }}">{{ $address }}</a></p>
                    </div>
                    <div class="relative pb-3">
                        <span class="absolute left-0 top-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="m19.23 15.26l-2.54-.29a1.99 1.99 0 0 0-1.64.57l-1.84 1.84a15.045 15.045 0 0 1-6.59-6.59l1.85-1.85c.43-.43.64-1.03.57-1.64l-.29-2.52a2.001 2.001 0 0 0-1.99-1.77H5.03c-1.13 0-2.07.94-2 2.07c.53 8.54 7.36 15.36 15.89 15.89c1.13.07 2.07-.87 2.07-2v-1.73c.01-1.01-.75-1.86-1.76-1.98z" />
                            </svg>
                        </span>
                        <p class="pl-[32px]"><a href="tel:{{ $phone }}">{{ $phone }}</a></p>
                    </div>
                    <div class="relative pb-3">
                        <span class="absolute left-0 top-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24">
                                <path fill="currentColor"
                                      d="M4 20q-.825 0-1.412-.587Q2 18.825 2 18V6q0-.825.588-1.412Q3.175 4 4 4h16q.825 0 1.413.588Q22 5.175 22 6v12q0 .825-.587 1.413Q20.825 20 20 20Zm8-7L4 8v10h16V8Zm0-2l8-5H4ZM4 8V6v12Z" />
                            </svg>
                        </span>
                        <p class="pl-[32px]"><a href="mailto:{{ $email }}">{{ $email }}</a></p>
                    </div>
                </div>

                <h4 class="mt-4 mb-[14px] uppercase">{{ __('shop::contact.operation_hours') }}</h4>
                <div class="space-y-2">
                    @foreach($operation_hours as $day => $hours)
                    <div class="flex justify-between">
                        <p>{{ $day }}</p>
                        <p>{{ $hours }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
