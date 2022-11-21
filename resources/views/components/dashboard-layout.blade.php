<x-layout>
    <x-container-full-w>
        <div class="flex h-full">
            <x-dashboard-sidbar/>
            <div class="w-full h-full px-5 py-4">
                {{$slot}}
            </div>
        </div>
    </x-container>
</x-layout>