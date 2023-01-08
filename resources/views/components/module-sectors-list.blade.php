<div class="sidebar-module">
    <x-layout-heading heading="Other Top Family Business Sectors" />
    @if($otherSectors)
        <div class="flex flex-col">
            @foreach($otherSectors as $sector)
                @if($loop->first)
                    <div class="">
                        <div class="bg-no-repeat bg-center bg-cover px-7 py-8 flex flex-col justify-end mb-2" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.45)),
                        url('{{$sector->getImageThumbnail()}}');" >
                            <span class="bg-orange-500 text-white w-max px-2 py-1 rounded-lg text-xs font-bold">
                                Sectors
                            </span>
                            <h2 class="py-3">
                                <a href="{{url('news/articles')}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80" class="plain">
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
                    <ul class="flex w-full text-sm">
                        <li class="mb-1 px-2 py-2 border-b border-b-gray-200 w-full flex items-center">  
                            <div class="w-2 h-2/3 mr-2 rounded-sm bg-{{$sector->color ? $sector->color->tailwind_class : randomColor()}}"></div>
                            <a href="{{$sector->link()}}" class="grow plain">
                                {{$sector->name}}
                            </a>
                            <div>{{count($sector->companies)}}</div>
                        </li>
                    </ul>
                @endif
            @endforeach
            <a href="{{url('sectors')}}" class="self-center mt-4">
                <button class="btn btn-plain">
                    <i class="fa-solid fa-building mr-1.5"></i>
                    View all sectores
                </button>
            </a>
        </div>
    @endif
</div>


@php
    if(!isset($currentSector)){
        $currentSector = null;
    }
@endphp

<div class="grid grid-cols-2 mb-12 gap-0.5">
    @foreach($sectors as $sector)
        <a href="{{$sector->link()}}" class="plain">

            @if($currentSector === $sector->id)
                <div class="flex flex-row items-center border-b text-sm p-2 py-2.5 font-bold cursor-pointer text-red-500">
                    <div class="grow">{{$sector->name}}</div>
                    <div class="count-square p-1.5 py-0.5 border border-red-500 bg-red-500 text-white rounded-sm font-bold text-xs">
                        {{count($category->companies)}}
                    </div>
                </div>
            @else
                <div onmouseover="mouseOverCategory(this)" onmouseout="mouseOutCategory(this)" class="flex flex-row items-center border-b text-sm p-2 py-2.5 font-bold cursor-pointer">
                    <div class="grow">{{$sector->name}}</div>
                    <div class="count-square p-1.5 py-0.5 border border-gray-200 rounded-sm  font-bold text-xs">
                        {{count($sector->companies)}}
                    </div>
                </div>
            @endif
    
        </a>
    @endforeach
</div>
