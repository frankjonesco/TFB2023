<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-page-heading heading="Business sectors" />   
            <x-layout-sectors-search-form :term="$term" />

            {{-- Sectors --}}
            @if($sectors)
                <div class="grid grid-cols-3 gap-3 w-full">
                    @foreach($sectors as $sector)
                        <x-card-sectors-list-item-sm :sector="$sector" />      
                    @endforeach
                </div>
                <x-pagination-public table="sectors" :results="$sectors " />
            @endif    

        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-sectors-menu />
            <x-module-articles-features />
            <x-module-subscribe />
        </x-layout-sidebar>
    </x-container>
</x-layout>