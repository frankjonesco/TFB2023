<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="{{$sector->name}} Sector" />

            <table class="mb-12">
                <thead>
                    <th class="text-center font-bold">No. of Companies</th>
                    <th class="text-center font-bold">Total Turnover</th>
                    <th class="text-center font-bold">Total Employees</th>
                    <th class="text-center font-bold">Avg. Turnover per company</th>
                </thead>
                <tbody>
                    <tr>
                        <td class="text-center">{{count($sector->companies)}}</td>
                        <td class="text-center">{{formatTurnover($sector->totalTurnoverOfSectorCompanies())}} €</td>
                        <td class="text-center">{{formatEmployees($sector->totalEmployeesOfSectorCompanies())}}</td>
                        <td class="text-center">{{formatTurnover($sector->totalTurnoverOfSectorCompanies() / count($sector->companies))}} €</td>
                    </tr>
                </tbody>
            </table>
            
            <x-layout-heading heading="Companies in the {{$sector->name}} Sector" />
            {{-- Companies --}}
            @if($companies)
                <div class="grid grid-cols-4 gap-3 w-full">
                    @foreach($companies as $company)
                        <div class="w-full m-1 border border-gray-200 p-2.5 bg-zinc-50">
                            <div class="max-h-min p-2 border border-gray-200 flex items-center bg-white w-full text-center" style="min-height:8rem;">
                                <a href="/companies/{{$company->hex}}/{{$company->slug}}" class="w-full">
                                    <img 
                                        src="{{$company->getImageThumbnail()}}"
                                        alt="Top Family Business - {{$company->registered_name}}"
                                        class="mx-auto"
                                        style="max-height:6.5rem;"
                                    >
                                </a>
                            </div>
                            </a>
                            <h5 class="font-bold text-sm mt-2">
                                <a href="/companies/{{$company->hex}}/{{$company->slug}}" class="plain">
                                    {{$company->show_name}}
                                </a>
                            </h5>
                            <span class="text-xs block">
                                
                                {{formatTurnover($company->latest_ranking->turnover)}}
                                
                            </span>
                        </div>       
                    @endforeach
                </div>
            @endif 
             

        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-sectors-list :other-sectors="$other_sectors" />
            <x-module-socials />
            <x-module-articles-features />
            <x-module-subscribe />
        </x-layout-sidebar>
    </x-container>
</x-layout>