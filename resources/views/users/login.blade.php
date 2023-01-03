<x-layout>
    <x-container>

        <x-layout-main-area>
            <x-layout-heading heading="Log in" />
            <form action="/users/authenticate" method="POST">
                @csrf
                {{-- Email input --}}
                <div class="form-block">
                    <label for="last_name">
                        Email
                    </label>
                    <input type="email" name="email" placeholder="Email" value="{{old('email')}}" class="public-input !w-1/2">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">
                            {{$message}}
                        </p>
                    @enderror
                </div>
                {{-- Password input --}}
                <div class="form-block">
                    <label for="password">
                        Password
                    </label>
                    <input type="password" name="password" placeholder="Password" class="public-input !w-1/2">
                    @error('password')
                        <p class="text-red-500 text-xs mt-1">
                            {{$message}}
                        </p>
                    @enderror
                </div>

                <div class="w-full text-sm mb-6 pb-5 border-b border-b-gray-200">
                    
                </div>

                {{-- Submit --}}
                <div class="form-block">
                    <button type="submit" class="btn-black mr-2.5">
                        Log in
                    </button>
                    <span class="text-sm">
                        Don't have an account yet?
                        <a href="/signup" class="underline underline-offset-2 ml-1.5">
                            Sign up
                        </a>
                    </span>
                </div>
            </form>
        </x-layout-main-area>

        <x-layout-sidebar>
            <x-module-socials />
        </x-layout-sidebar>

    </x-container>
</x-layout>