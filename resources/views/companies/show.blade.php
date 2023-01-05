<x-layout>

    <x-container>
        <x-layout-main-area>
            {{-- Company layout --}}
            <div class="flex">
                <div class="w-1/4 mr-10">
                    <div class="max-h-min p-2 border border-gray-200 flex items-center" style="min-height:8rem;">
                        <img 
                            src="{{$company->getImageThumbnail()}}"
                            alt="Top Family Business - {{$company->registered_name}}"
                            class="mx-auto"
                            style="max-height:6.5rem;"
                        >
                    </div>
                    <ul class="flex flex-col text-sm mt-6">
                        <li class="flex my-1 py-1 border-b border-gray-200 px-1.5">
                            <span class="grow">Family business</span>
                            <span><i class="fa-solid fa-check text-green-700"></i></span>
                        </li>
                        <li class="flex my-1 py-1 border-b border-gray-200 px-1.5">
                            <span class="grow">Generations</span>
                            <span>{{$company->family_generations}}</span>
                        </li>
                        <li class="flex my-1 py-1 border-b border-gray-200 px-1.5">
                            <span class="grow">Family executive</span>
                            <span><i class="fa-solid fa-check text-green-700"></i></span>
                        </li>
                        <li class="flex my-1 py-1 border-b border-gray-200 px-1.5">
                            <span class="grow">Female executive</span>
                            <span><i class="fa-solid fa-check text-green-700"></i></span>
                        </li>
                        <li class="flex my-1 py-1 border-b border-gray-200 px-1.5">
                            <span class="grow">Stock listed</span>
                            <span><i class="fa-solid fa-check text-green-700"></i></span>
                        </li>
                    </ul>
                </div>
                <div class="w-3/4">
                    <h2 class="pt-0">{{$company->show_name}}</h2>
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
                    <a href="{{$company->website}}" target="_blank">
                        <button class="btn btn-plain">
                            <i class="fa-solid fa-globe mr-1 text-sky-600"></i>
                            Company website
                        </button>
                    </a>
                    <p class="mt-6 text-sm">{{$company->description}}</p>

                    <hr>




                    <h3 class="pt-0 mt-0">Details</h3>

                    <table>
                        <tbody>
                            {{-- Registered name --}}
                            @if($company->registered_name)
                                <tr>
                                    <td class="px-0 text-center">
                                        <i class="fa-regular fa-registered text-orange-500"></i>
                                    </td>
                                    <td class="px-0">Registered name</td>
                                    <td class="px-0">{{$company->registered_name}}</td>
                                </tr>
                            @endif
                            {{-- Trading name --}}
                            @if($company->trading_name)
                                <tr>
                                    <td class="px-0 text-center">
                                        <i class="fa-solid fa-trademark text-blue-500"></i>
                                    </td>
                                    <td class="px-0">Trading name</td>
                                    <td class="px-0">{{$company->trading_name}}</td>
                                </tr>
                            @endif
                            {{-- Parent organisation --}}
                            @if($company->parent_organization)
                                <tr>
                                    <td class="px-0 text-center">
                                        <i class="fa-regular fa-building text-lime-500"></i>
                                    </td>
                                    <td class="px-0">Parent organisation</td>
                                    <td class="px-0">{{$company->parent_organization}}</td>
                                </tr>
                            @endif
                            {{-- Founded in --}}
                            @if($company->founded_in)
                                <tr>
                                    <td class="px-0 text-center">
                                        <i class="fa-regular fa-calendar text-yellow-500"></i>
                                    </td>
                                    <td class="px-0">Founded in</td>
                                    <td class="px-0">{{$company->founded_in}}</td>
                                </tr>
                            @endif
                            {{-- Founded by --}}
                            @if($company->founded_by)
                                <tr>
                                    <td class="px-0 text-center">
                                        <i class="fa-regular fa-copyright text-green-500"></i>
                                    </td>
                                    <td class="px-0">Founded by</td>
                                    <td class="px-0">{{$company->founded_by}}</td>
                                </tr>
                            @endif
                            {{-- Headquarters --}}
                            @if($company->headquarters)
                                <tr>
                                    <td class="px-0 text-center">
                                        <i class="fa-regular fa-map text-pink-500"></i>
                                    </td>
                                    <td class="px-0">Headquarters</td>
                                    <td class="px-0">{{$company->headquarters}}</td>
                                </tr>
                            @endif
                            {{-- Family name --}}
                            @if($company->family_name)
                                <tr>
                                    <td class="px-0 text-center">
                                        <i class="fa-solid fa-people-roof text-purple-500"></i>
                                    </td>
                                    <td class="px-0">Family name</td>
                                    <td class="px-0">{{$company->family_name}}</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>

                    <hr>

                    @if($company->sectors)
                        <h3>Sectors</h3>
                        <div class="flex w-full">
                            @foreach($company->sectors as $sector)
                                <div class="w-1/3 m-1 border border-gray-200 p-2.5 bg-zinc-50">
                                
                                    <a href="{{$sector->link()}}">
                                        <img src="{{$sector->getImageThumbnail()}}">
                                    </a>
                                    <h5 class="font-bold text-sm mt-2">
                                        <a href="{{$sector->link()}}">
                                            {{$sector->name}}
                                        </a>
                                    </h5>
                                    <span class="text-xs">
                                        <a href="{{$sector->link()}}">
                                            {{count($sector->companies)}} companies
                                        </a>
                                    </span>
                                </div>
                                
                            @endforeach
                        </div>
                    @endif    
                    
                    @if(count($company->associated_articles) > 0)
                        <h3>Articles about {{$company->show_name}}</h3>
                        <div class="grid grid-cols-2 gap-3 w-full">
                            @foreach($company->associated_articles as $article)
                                <x-card-articles-photo-fill :article="$article" />
                            @endforeach
                        </div>
                    @endif    

                </div>
            </div>

        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-companies-ranking-charts :company="$company" />
            <x-module-socials />
            <x-module-matchbird-partners />
        </x-layout-sidebar>
    </x-container>


</x-layout>