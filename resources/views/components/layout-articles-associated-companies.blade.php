@if(count($companies) > 0)
    <x-layout-heading heading="Associated companies" class="heading-mt" />

    @foreach($companies as $company)
        <div class="flex flex-row border-b border-gray-100 mb-6 pb-6">
            <div class="w-1/4 mr-10">
                <div class="h-32 p-2 border border-gray-200 flex items-center">
                    <a href="/companies/{{$company->hex}}/{{$company->slug}}">
                        <img 
                            src="{{$company->getImageThumbnail()}}"
                            alt="Top Family Business - {{$company->registered_name}}"
                            class="w-full mr-4"
                        >
                    </a>
                </div>
                <ul class="flex flex-col text-sm mt-6">
                    <li class="flex my-1 py-1 border-b border-gray-200">
                        <span class="grow">Family business</span>
                        <span><i class="fa-solid fa-check text-green-700"></i></span>
                    </li>
                    <li class="flex my-1 py-1 border-b border-gray-200">
                        <span class="grow">Generations</span>
                        <span>{{$company->family_generations}}</span>
                    </li>
                    <li class="flex my-1 py-1 border-b border-gray-200">
                        <span class="grow">Family executive</span>
                        <span><i class="fa-solid fa-check text-green-700"></i></span>
                    </li>
                    <li class="flex my-1 py-1 border-b border-gray-200">
                        <span class="grow">Female executive</span>
                        <span><i class="fa-solid fa-check text-green-700"></i></span>
                    </li>
                    <li class="flex my-1 py-1 border-b border-gray-200">
                        <span class="grow">Stock listed</span>
                        <span><i class="fa-solid fa-check text-green-700"></i></span>
                    </li>
                </ul>
            </div>
            <div class="w-3/4">
                <h2 class="pt-0">
                    <a href="/companies/{{$company->hex}}/{{$company->slug}}" class="plain">{{$company->show_name}}</a>
                </h2>
                <div class="flex mb-5">
                    <div class="w-1/3">
                        <span>Turnover</span><br>
                        <span class="font-light">{{formatTurnover($company->latest_ranking->turnover)}} €</span>
                    </div>
                    <div class="w-1/3">
                        <span>Employees</span><br>
                        <span class="font-light">{{formatEmployees($company->latest_ranking->employees)}}</span>
                    </div>
                    <div class="w-1/3">
                        <span>Growth</span><br>
                        <span class="font-light">
                            <x-ranking-growth growth="{{$company->latest_ranking->calculateGrowth('turnover')}}" class="text-base" />
                        </span>
                    </div>
                </div>
                <a href="/companies/{{$company->hex}}/{{$company->slug}}">
                    <button class="btn btn-plain">
                        <i class="fa-solid fa-globe mr-1 text-sky-600"></i>
                        Inspect company
                    </button>
                </a>
                <p class="mt-6 text-sm">{{$company->description}}</p>
            </div>
        </div>
    @endforeach
@endif