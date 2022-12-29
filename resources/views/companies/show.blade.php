<x-layout>

    <x-container-h-min>
        <x-layout-articles-breaking />
    </x-container-h-min>

    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="Company information" />
            {{-- Company layout --}}
            <div class="flex">
                <div class="w-1/4 mr-10">
                    <img 
                        src="{{$company->getImageThumbnail()}}"
                        alt="Top Family Business - {{$company->registered_name}}"
                        class="w-full mr-4"
                    >
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
                    <h2 class="pt-0">{{$company->show_name}}</h2>
                    <div class="flex mb-5">
                        <div class="w-1/2">
                            <span>Registered name</span><br>
                            <span class="font-thin">{{$company->registered_name}}</span>
                        </div>
                        <div class="w-1/2">
                            <span>Parent organisation:</span><br>
                            <span class="font-thin">{{$company->parent_organization}}</span>
                        </div>
                        
                    </div>
                    <a href="{{$company->website}}" target="_blank">
                        <button class="btn btn-plain">
                            <i class="fa-solid fa-globe mr-1 text-sky-600"></i>
                            Company website
                        </button>
                    </a>
                    <p class="mt-6 text-sm">{{$company->description}}</p>

                    

                    
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