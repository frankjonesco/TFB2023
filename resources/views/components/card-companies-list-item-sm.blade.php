@php
    if(!isset($thumbnailSize)){
        $thumbnailSize = null;
    }
@endphp

<div {{$attributes->merge(['class' => 'flex pb-3 mb-3 border-b border-gray-100'])}}>

    <a href="{{$company->link()}}">
        <div class="max-h-min p-2 border border-gray-200 flex items-center w-28">
            <img 
                src="{{$company->getImageThumbnail()}}"
                alt="Top Family Business - {{$company->show_name}}"
                class="mx-auto"
                style="max-height:2.5rem;"
            >
        </div>
    </a>
    
    
    <div class="flex flex-col justify-center pl-4">
        <h4 class="pb-1 text-gray-500 text-xs font-bold">
            <a href="{{$company->link()}}" class="text-slate-900 hover:!text-red-500 no-underline">
                {{truncate($company->show_name, 120)}}
            </a>
        </h4>
        <div class="grid grid-cols-3 text-xs w-full">
            <span class="w-1/3">Turnover</span>
            <span class="w-1/3">Employees</span>
            <span class="w-1/3">Growth</span>
            <span class="mr-6 font-light whitespace-nowrap">{{formatTurnover($company->latest_ranking->turnover)}} €</span>
            <span class="font-light">{{formatEmployees($company->latest_ranking->employees)}}</span>
            <span class="font-light"><x-ranking-growth growth="{{$company->latest_ranking->calculateGrowth('turnover')}}" class="text-xs" /></span>
        </div>
    </div>

</div>