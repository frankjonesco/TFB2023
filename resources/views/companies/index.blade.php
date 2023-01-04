<x-layout>
    <x-container>
        <x-layout-main-area>
            {{-- Rankinsgs search --}}
            <div class="p-3 mb-8">
                @include('includes._rankings-search-form')
            </div>
            {{-- End: Rankings search --}}

            @include('includes._rankings-table')
        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-socials />
            <x-module-matchbird-partners />
        </x-layout-sidebar>
    </x-container>
</x-layout>