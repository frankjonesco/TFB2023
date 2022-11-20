<x-layout>
    <x-container-full-w>

        <div class="flex">
            <x-dashboard-sidbar/>
            <x-dashboard-page-content>
                {{$slot}}
            </x-dashboard-page-content>
        </div>

    </x-container>
</x-layout>