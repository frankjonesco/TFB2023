<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="Partners" />

            @foreach($partners as $partner)
                {{$partner->name}}
            @endforeach
        </x-layout-main-area>
        <x-layout-sidebar>
                <x-module-socials />
        </x-layout-sidebar>
    </x-container>
</x-layout>