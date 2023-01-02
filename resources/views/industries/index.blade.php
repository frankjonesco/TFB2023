<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="Sectors" />

            {{-- Sectors --}}
            @if($sectors)
                <div class="grid grid-cols-4 gap-3 w-full">
                    @foreach($sectors as $sector)
                        <div class="w-full m-1 border border-gray-200 p-2.5 bg-zinc-50">
                            <a href="/sectors/{{$sector->hex}}/{{$sector->slug}}">
                                <img src="{{asset('images/sectors/'.$sector->hex.'/'.$sector->image)}}">
                            </a>
                            <h5 class="font-bold text-sm mt-2">
                                <a href="/sectors/{{$sector->hex}}/{{$sector->slug}}">
                                    {{$sector->name}}
                                </a>
                            </h5>
                            <span class="text-xs block">
                                <a href="/sectors/{{$sector->hex}}/{{$sector->slug}}/industries">
                                    {{count($sector->industries)}} industries
                                </a>
                            </span>
                            <span class="text-xs block">
                                <a href="/sectors/{{$sector->hex}}/{{$sector->slug}}">
                                    {{count($sector->companies)}} companies
                                </a>
                            </span>
                        </div>       
                    @endforeach
                </div>
            @endif    

        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-socials />
            <x-module-articles-features />
            <x-module-subscribe />
        </x-layout-sidebar>
    </x-container>
</x-layout>