<x-layout>
    <x-container>

        <x-layout-main-area>
            <x-layout-heading heading="Sign up" />

                <form action="/users/store" method="POST">
                    @csrf

                    <div class="form-block">
                        <label for="first_name">First name</label>
                        <input type="text" name="first_name" placeholder="First name" value="{{old('first_name')}}" class="public-input !w-1/2">
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-block">
                        <label for="last_name">Last name</label>
                        <input type="text" name="last_name" placeholder="Last name" value="{{old('last_name')}}" class="public-input !w-1/2">
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-block">
                        <label for="first_name">Gender</label>
                        <select name="gender" class="public-select !w-1/2">
                            <option disabled selected>Select your gender</option>
                            <option value="male" {{old('gender') === 'male' ? 'selected' : null}}>Male</option>
                            <option value="female" {{old('gender') === 'female' ? 'selected' : null}}>Female</option>
                        </select>
                        @error('gender')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-block">
                        <label for="last_name">Email</label>
                        <input type="email" name="email" placeholder="Email" value="{{old('email')}}" class="public-input !w-1/2">
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-block">
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Password" class="public-input !w-1/2">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="form-block">
                        <label for="first_name">Confirm password</label>
                        <input type="password" name="password_confirmation" placeholder="Confirm password" class="public-input !w-1/2">
                    </div>

                    <div class="form-block">
                        <button type="submit" class="mr-1.5">Sign up</button>
                        <span class="text-sm">
                            Already have an account?
                            <a href="/login" class="underline underline-offset-2 ml-1.5">
                                Log in
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