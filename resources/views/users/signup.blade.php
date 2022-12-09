<x-layout>
    <x-container>
        <h1>Sign up</h1>
        
        <form action="/users/store" method="POST" class="w-1/4">
            @csrf

            <div class="form-block">
                <label for="first_name">First name</label>
                <input type="text" name="first_name" placeholder="First name">
                @error()
            </div>

            <div class="form-block">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" placeholder="Last name">
            </div>

            <div class="form-block">
                <label for="first_name">Gender</label>
                <select name="gender">
                    <option disabled selected>Select your gender</option>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                </select>
            </div>

            <div class="form-block">
                <label for="last_name">Email</label>
                <input type="email" name="last_name" placeholder="Email">
            </div>

            <div class="form-block">
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
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