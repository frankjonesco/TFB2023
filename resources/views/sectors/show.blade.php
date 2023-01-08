<x-layout>
    <x-container>
        <x-layout-main-area>

            <x-layout-page-heading heading="{{$sector->name}} sector: companies" />   
            <x-layout-sectors-search-form :term="$term" />

            
            
            {{-- Companies --}}
            @if($companies)
                <div class="grid grid-cols-3 gap-3 w-full">
                    @foreach($companies as $company)
                        <div class="w-full h-full flex flex-col m-1 border border-gray-200 p-2.5 bg-zinc-50">
                            <div class="max-h-min p-2 border border-gray-200 flex items-center bg-white w-full text-center" style="min-height:8rem;">
                                <a href="{{$company->link()}}" class="w-full">
                                    <img 
                                        src="{{$company->getImageThumbnail()}}"
                                        alt="Top Family Business - {{$company->registered_name}}"
                                        class="mx-auto"
                                        style="max-height:6.5rem;"
                                    >
                                </a>
                            </div>
                            </a>
                            <h5 class="font-bold text-sm mt-2.5 mx-1">
                                <a href="{{$company->link()}}" class="text-gray-700 no-underline hover:underline">
                                    {{truncate($company->show_name, 26)}}
                                </a>
                            </h5>
                            <ul class="flex flex-col text-xs mx-1 mt-1.5">
                                <li class="flex my-0.5">
                                    <span class="grow">Turnover</span>
                                    <span>{{formatTurnover($company->latest_ranking->turnover)}} €</span>
                                </li>
                                <li class="flex my-0.5">
                                    <span class="grow">Employees</span>
                                    <span>{{formatEmployees($company->latest_ranking->employees)}}</span>
                                </li>
                                <li class="flex my-0.5">
                                    <span class="grow">Year</span>
                                    <span>{{$company->latest_ranking->year}}</span>
                                </li>
                                <li class="flex my-0.5">
                                    <span class="grow">Sector</span>
                                    <span>{{$sector->name}}</span>
                                </li>
                            </ul>
                    
                            <a href="{{$company->link()}}" class="mt-3 block">
                                <button class="btn btn-plain whitespace-nowrap w-full">
                                    <i class="fa-solid fa-globe mr-1 text-sky-600"></i>
                                    Inspect company
                                </button>
                            </a>
                   
                        </div>       
                    @endforeach
                </div>
                <x-pagination-public table="companies" :results="$companies" />
            @endif 


            
             

        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-sectors-menu :current-sector="$current_sector" />
            <x-module-sector-information :sector="$sector" />
            <x-module-sector-description :description="$sector->description" />
            
            <x-module-subscribe />
        </x-layout-sidebar>
    </x-container>
</x-layout>