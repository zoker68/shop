<x-shop::layouts.account>
    <div class="col-span-12 lg:col-span-9 border border-[#E9E4E4] p-6 rounded-md">
        <div class="acprof_info_wrap shadow_sm">
            <h4 class="text-lg mb-3">{{ __('shop::auth.password.title') }}</h4>
            <form action="{{ route('account.profile.password.update')  }} " method="POST">
                @csrf
                @method('PATCH')
                <div class="max-w-[402px]">
                    <div>
                        <x-shop::form.label for="password"
                                      required="true">{{ __('shop::auth.password.password.label') }}</x-shop::form.label>
                        <div class="relative">
                            <x-shop::form.input id="password" name="password" type="password" required="true"
                                          placeholder="{{ __('shop::auth.password.password.placeholder') }}"/>
                            {{--<span class="absolute top-5 right-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                     viewBox="0 0 512 512">
                                    <path
                                        d="M88.3 68.1c-5.6-5.5-14.6-5.5-20.1.1-5.5 5.5-5.5 14.5 0 20l355.5 355.7c3.7 3.7 9 4.9 13.7 3.6 2.4-.6 4.6-1.9 6.4-3.7 5.5-5.5 5.5-14.5 0-20L88.3 68.1z"
                                        fill="currentColor"/>
                                    <path
                                        d="M260.2 345.9c-53 2.4-96.6-41.2-94.1-94.1.6-12.2 3.6-23.8 8.6-34.3L121.3 164c-27.7 21.4-55.4 48.9-85.1 81.3-5.5 6.1-5.6 15.2-.1 21.3C101 338.3 158.2 400 255.8 400c29.7 0 57.1-7.4 82.3-19.2l-43.5-43.5c-10.6 5-22.2 8-34.4 8.6z"
                                        fill="currentColor"/>
                                    <path
                                        d="M475.8 266c5.3-5.8 5.6-14.6.5-20.7C424 181.8 351.5 112 255.8 112c-29.1 0-56 6.6-82 19l43.7 43.7c10.5-5 22.1-8.1 34.3-8.6 53-2.4 96.6 41.2 94.1 94.1-.6 12.2-3.6 23.8-8.6 34.3l53.5 53.5c33-25.3 61.3-55.9 85-82z"
                                        fill="currentColor"/>
                                    <path
                                        d="M192.2 260.9c2.4 31.3 27.6 56.5 58.9 58.9 8.2.6 16.1-.3 23.4-2.6l-79.8-79.8c-2.2 7.4-3.1 15.3-2.5 23.5z"
                                        fill="currentColor"/>
                                    <path
                                        d="M320 256c0-1.3-.1-2.6-.1-3.9-5.6 2.5-11.7 3.9-18.2 3.9-1.1 0-2.1 0-3.1-.1l18.6 18.7c1.8-5.9 2.8-12.2 2.8-18.6z"
                                        fill="currentColor"/>
                                    <path
                                        d="M256 209c0-6 1.1-11.7 3.1-16.9-1 0-2-.1-3.1-.1-6.4 0-12.6 1-18.5 2.8l18.7 18.7c-.1-1.5-.2-3-.2-4.5z"
                                        fill="currentColor"/>
                                </svg>
                            </span>--}}
                        </div>
                        <x-shop::form.error name="password"/>
                    </div>
                    <div class="mt-4">
                        <x-shop::form.label name="new_password" class="block font-medium"
                                      required="true">{{ __('shop::auth.password.new_password.label') }}</x-shop::form.label>
                        <div class="relative">
                            <x-shop::form.input name="new_password" type="password" required="true"
                                          placeholder="{{ __('shop::auth.password.new_password.placeholder') }}"/>
                        </div>
                        <x-shop::form.error name="new_password"/>
                    </div>
                    <div class="mt-4">
                        <x-shop::form.label name="new_password_confirmation"
                                      required="true">{{ __('shop::auth.password.password_confirmation.label') }}</x-shop::form.label>
                        <div class="relative">
                            <x-shop::form.input name="new_password_confirmation" type="password" required="true"
                                          placeholder="{{ __('shop::auth.password.password_confirmation.placeholder') }}"/>
                        </div>
                        <x-shop::form.error name="new_password_confirmation"/>
                    </div>
                    <div class="mt-8">
                        <button type="submit" class="bg-secondary font-semibold text-white border-0 px-6 py-2 rounded hover:bg-black">{{ __('shop::auth.password.submit') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-shop::layouts.account>
