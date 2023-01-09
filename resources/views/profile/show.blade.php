<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="Profile" />
        </x-layout-main-area>
        <x-layout-sidebar>
                <x-module-users-profile :user="$user" />
        </x-layout-sidebar>
    </x-container>
</x-layout>
    