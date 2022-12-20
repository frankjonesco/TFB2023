<x-layout>
    <x-container>
        <div class="flex">
            <div class="mt-6 pl-3 pr-12 w-2/3 border-r border-zinc-500">                
                <div class="flex mb-7">
                    <h3 class="pl-1.5 pr-4 pb-3 border-b border-sky-500 uppercase text-lg">
                        Log in
                    </h3>
                    <span class="grow border-b border-zinc-500"></span>
                </div>
                <form action="/users/authenticate" method="POST" class="w-1/3">
                    @csrf
                    <div class="form-block">
                        <label for="last_name">
                            Email
                        </label>
                        <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
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
                        <input type="password" name="password" placeholder="Password">
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
            <div class="mt-6 px-12 w-1/3">
                <x-module-socials />
            </div>
        </div>
    </x-container>
</x-layout>