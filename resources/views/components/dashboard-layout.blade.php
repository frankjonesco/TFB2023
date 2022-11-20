<x-layout>
    <x-container-full-w>
        <div class="flex h-full">
            <x-dashboard-sidbar/>
            <div class="w-full h-full p-10">
                {{$slot}}
            </div>
        </div>
    </x-container>
</x-layout>