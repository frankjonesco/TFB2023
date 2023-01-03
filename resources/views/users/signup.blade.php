<x-layout>
    <x-container>

        <x-layout-main-area>
            <x-layout-heading heading="Sign up" />

                <form action="/users/store" method="POST" class="flex flex-wrap">
                    @csrf

                    <div class="form-block w-1/2 pr-3">
                        <label for="first_name">First name</label>
                        <input type="text" name="first_name" placeholder="First name" value="{{old('first_name')}}" class="public-input">
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-block w-1/2">
                        <label for="last_name">Last name</label>
                        <input type="text" name="last_name" placeholder="Last name" value="{{old('last_name')}}" class="public-input">
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-block w-1/2 pr-3">
                        <label for="first_name">Gender</label>
                        <select name="gender" class="public-select">
                            <option disabled selected>Select your gender</option>
                            <option value="male" {{old('gender') === 'male' ? 'selected' : null}}>Male</option>
                            <option value="female" {{old('gender') === 'female' ? 'selected' : null}}>Female</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-block w-1/2">
                        <label for="last_name">Email</label>
                        <input type="email" name="email" placeholder="Email" value="{{old('email')}}" class="public-input">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-block w-1/2 pr-3">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" class="public-input">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-block w-1/2">
                        <label for="first_name">Confirm password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm password" class="public-input">
                    </div>

                    <div class="w-full text-sm mb-6 pb-5 border-b border-b-gray-200">
                        <div class="flex items-center w-full">
                            <input type="checkbox" name="terms_agreed" class="ml-2 !mr-3" {{old('terms_agreed') ? 'checked' : null}}>
                            <span class="font-light">
                                I agree to the <a href="/terms">terms & conditions</a>
                            </span>
                        </div>
                        @error('terms_agreed')
                            <p class="text-red-500 text-xs mt-1">Please agree to the terms & conditions</p>
                        @enderror
                    </div>

                    <div class="form-block w-full">
                        <button type="submit" class="btn-black mr-2.5">Sign up</button>
                        <span class="text-sm">
                            Already have an account?
                            <a href="/login" class="underline underline-offset-2 ml-1.5">
                                Log in
                            </a>
                        </span>
                    </div>

                </form>

                {{-- <x-layout-articles-split-thumbs :articles="$split_articles" /> --}}
        </x-layout-main-area>
        
        <x-layout-sidebar>
            <x-module-articles-features />
            {{-- <x-module-subscribe /> --}}
            {{-- <x-module-ranking-table :companies="$companies" /> --}}
            
        </x-layout-sidebar>
    
    </x-container>
</x-layout>