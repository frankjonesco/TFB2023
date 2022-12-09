<x-layout>
    <x-container>
        <h1>Sign up</h1>
        
        <form action="/users/store" method="POST" class="w-1/4">
            @csrf

            <div class="form-block">
                <label for="first_name">First name</label>
                <input type="text" name="first_name" placeholder="First name" value="{{old('first_name')}}">
                @error('first_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-block">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" placeholder="Last name" value="{{old('last_name')}}">
                @error('last_name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-block">
                <label for="first_name">Gender</label>
                <select name="gender">
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
                <input type="email" name="email" placeholder="Email" value="{{old('email')}}">
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-block">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror
            </div>

            <div class="form-block">
                <label for="first_name">Confirm password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm password">
            </div>

            <div class="form-block">
                <button type="submit">Sign up</button>
                <span class="text-sm">
                    Already have an account?
                    <a href="/login">
                        Log in
                    </a>
                </span>
            </div>

        </form>
    </x-container>
</x-layout>