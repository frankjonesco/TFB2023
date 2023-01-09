<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="Edit settings" />

            <p>More account settings will shortley be released. For now though, all you can do here is delete your account.</p>

            <a href="{{url('profile/confirm-delete')}}">
                <button class="btn-black mt-6">Delete account</button>
            </a>
            
        </x-layout-main-area>
        <x-layout-sidebar>
                <x-module-users-profile :user="$user" />
        </x-layout-sidebar>
    </x-container>
</x-layout>
    