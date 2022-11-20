<x-layout>
    <x-container>
        
        <h1>Business Sectors</h1>

        @foreach($sectors as $sector)
            {{$sector->name}}, 
        @endforeach

    </x-container>
</x-layout>