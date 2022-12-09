<x-layout>
    <x-container>
        <h1>Log in</h1>
        
        <form action="/users/store" method="POST" class="w-1/4">
            @csrf

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
                <button type="submit">Log in</button>
                <span class="text-sm">
                    Don't have an account yet?
                    <a href="/signup">
                        Sign up
                    </a>
                </span>
            </div>

        </form>
    </x-container>
</x-layout>