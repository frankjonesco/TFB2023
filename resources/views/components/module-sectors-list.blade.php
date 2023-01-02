<div class="sidebar-module">
    <x-layout-heading heading="Other Top Family Business Sectors" />
    @if($otherSectors)
        <div class="flex flex-col">
            @foreach($otherSectors as $sector)
                @if($loop->first)
                    <div class="">
                        <div class="bg-no-repeat bg-center bg-cover px-7 py-8 flex flex-col justify-end mb-2" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.45)),
                        url('{{asset('images/sectors/'.$sector->hex.'/'.$sector->image)}}');" >
                            <span class="bg-orange-500 text-white w-max px-2 py-1 rounded-lg text-xs font-bold">
                                Sectors
                            </span>
                            <h2 class="py-3">
                                <a href="/news/articles/" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80">
                                    {{$sector->name}}
                                </a>
                            </h2>
                            <span class="text-sm italic text-zinc-100">
                                <span class="mr-6">
                                    <i class="fa-regular fa-building mr-1"></i>
                                    Companies {{count($sector->companies)}}
                                </span>
                            </span>
                        </div>
                    </div>
                @else
                    <ul class="flex w-full">
                        <li class="mb-1 px-2 py-2 border-b border-b-gray-200 w-full flex items-center">  
                            <div class="w-2 h-2/3 bg-sky-500 mr-2 rounded-sm"></div>
                            <a href="/sectors/{{$sector->hex}}/{{$sector->slug}}" class="grow">
                                {{$sector->name}}
                            </a>
                            <div>{{count($sector->companies)}}</div>
                        </li>
                    </ul>
                @endif
            @endforeach
            <a href="/sectors" class="self-center mt-4">
                <button class="btn btn-plain">
                    <i class="fa-solid fa-building mr-1.5"></i>
                    View all sectores
                </button>
            </a>
        </div>
    @endif
</div>