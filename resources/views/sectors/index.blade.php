<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-page-heading heading="Business Sectors" />   
            <x-layout-sectors-search-form :term="$term" />
            <x-layout-heading heading="Sectors" />

            {{-- Sectors --}}
            @if($sectors)
                <div class="grid grid-cols-4 gap-3 w-full">
                    @foreach($sectors as $sector)
                        <div class="w-full m-1 border border-gray-200 p-2.5 bg-zinc-50">
                            <a href="{{$sector->link()}}">
                                <img src="{{$sector->getImageThumbnail()}}">
                            </a>
                            <h5 class="font-bold text-sm mt-2">
                                <a href="{{$sector->link()}}" class="plain">
                                    {{$sector->name}}
                                </a>
                            </h5>
                            <span class="text-xs block">
                                <a href="{{url('sectors/'.$sector->hex.'/'.$sector->slug.'/industries')}}" class="plain">
                                    {{count($sector->industries)}} industries
                                </a>
                            </span>
                            <span class="text-xs block">
                                <a href="{{$sector->link()}}" class="plain">
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