<x-layout>
    <x-container>
        <h1>Sign up</h1>
        
        <form action="/users/store" method="POST" class="w-1/4">
            @csrf

            <div class="form-block">
                <label for="first_name">First name</label>
                <input type="text" name="first_name">
            </div>

            <div class="form-block">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name">
            </div>

            <div class="form-block">
                <label for="first_name">First name</label>
                <input type="text" name="first_name">
            </div>

            <div class="form-block">
                <label for="last_name">Last name</label>
                <input type="text" name="last_name">
            </div>

            <div class="form-block">
                <label for="first_name">First name</label>
                <input type="text" name="first_name">
            </div>

            <div class="form-block">
                <button type="submit">Sign up</button>
            </div>

            <div class="form-block">
                <p>
                    Already have an account?
                    <a href="/login">
                        Log in
                    </a>
                </p>
            </div>

        </form>
    </x-container>
</x-layout>