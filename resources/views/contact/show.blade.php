<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="Contact" />

            <x-alerts />

            <form action="/contact/send-message" method="POST">
                @csrf
                <div class="flex flex-col mb-3">
                    <div class="form-block flex">
                        <div class="w-1/2 mr-2">
                            <label for="first_name" class="text-gray-600">First name</label>
                            <input type="text" name="first_name" placeholder="First name" class="!bg-gray-50 !rounded !border !border-gray-300 focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0 !placeholder-gray-400">
                            @error('first_name')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>
                        <div class="w-1/2">
                            <label for="last_name" class="text-gray-600">Last name</label>
                            <input type="text" name="last_name" placeholder="Last name" class="!bg-gray-50 !rounded !border !border-gray-300 focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0 !placeholder-gray-400">
                            @error('last_name')
                                <p class="text-error">{{$message}}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="form-block">
                        <label for="email" class="text-gray-600">Email</label>
                        <input type="email" name="email" placeholder="Email address" class="!bg-gray-50 !rounded !border !border-gray-300 focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0 !placeholder-gray-400">
                        @error('email')
                            <p class="text-error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-block">
                        <label for="message">Your message</label>
                        <textarea name="message" rows="5" placeholder="Type your message" class="!bg-gray-50 !rounded !border !border-gray-300 focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0 !placeholder-gray-400"></textarea>
                        @error('message')
                            <p class="text-error">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-block">
                        <button type="submit" class="btn btn-black mt-3">
                            <i class="fa-solid fa-envelope mr-1"></i>
                            Send message
                        </button>
                    </div>
                </div>
            </form>


        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-socials />
            <x-module-articles-features />
        </x-layout-sidebar>
    </x-container>
</x-layout>