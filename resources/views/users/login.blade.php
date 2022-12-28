<x-layout>
    <x-container-full-w>
        <div class="bg-repeat" style="background-image:url('{{asset('images/bg.png')}}');">
            <div class="flex w-3/4 mx-auto px-12 bg-white text-gray-500">
        
                <div class="mt-3 pl-3 pr-12 w-2/3 border-r border-gray-100">
                    <div class="flex mb-7">
                        <h3 class="pr-2 pb-3 border-b border-red-500 uppercase text-sm text-gray-800">Log in</h3>
                        <span class="grow border-b border-gray-200"></span>
                    </div>
                        <form action="/users/authenticate" method="POST">
                            @csrf
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
                            <div class="form-block">
                                <button type="submit" class="mr-1.5">
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
                    </div>
                    <div class="mt-3 pl-4 w-1/3">
                        <x-module-socials />
                    </div>
                </div>
    </x-container>
</x-layout>