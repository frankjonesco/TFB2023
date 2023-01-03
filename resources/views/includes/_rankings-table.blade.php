@if(empty($companies))
    <p class="no-results">Nothing to display.</p>
@else
    <table class="mt-6">
        <thead class="bg-slate-600">
            <th class="py-3 text-gray-50 border-b-4 border-b-red-500">Rank</th>
            <th class="py-3 text-gray-50 border-b-4 border-b-red-500">Company name</th>

            @if($search_order_by === 'companies.family_name')
                <th class="py-3 text-gray-50 border-b-4 border-b-red-500">Family name</th>
                <th class="py-3 text-gray-50 border-b-4 border-b-red-500 text-center">Year</th>
                <th class="py-3 text-gray-50 border-b-4 border-b-red-500 text-center">Turnover</th>
            @elseif($search_order_by === 'companies.founded_in')
                <th class="py-3 text-gray-50 border-b-4 border-b-red-500 text-center whitespace-nowrap">Founded in</th>
                <th class="py-3 text-gray-50 border-b-4 border-b-red-500 text-center">Year</th>
                <th class="py-3 text-gray-50 border-b-4 border-b-red-500 text-center">Turnover</th>
            @else
                <th class="py-3 text-gray-50 border-b-4 border-b-red-500 text-center">Year</th>
                <th class="py-3 text-gray-50 border-b-4 border-b-red-500 text-center">Turnover</th>
                <th class="py-3 text-gray-50 border-b-4 border-b-red-500 text-center">Employees</th>
            @endif
            <th class="py-3 text-gray-50 border-b-4 border-b-red-500 text-center">Growth</th>
        </thead>
        <tbody>
            @foreach($companies as $key => $company)
                {{-- {{dd($company)}} --}}
                @if($loop->iteration % 2 == 0)
                    <tr class="bg-zinc-50">
                @else
                    <tr>
                @endif
                    <td class="py-3.5">{{$companies->firstItem() + $key}}</td>
                    <td class="py-0">
                        <div class="flex items-center">
                            <img 
                                src="{{$company->getImageThumbnail()}}"
                                alt="Top Family Business - {{$company->registered_name}}"
                                class="w-6 mr-4 rounded border border-indigo-100 hover:border-blue-300 cursor-pointer"
                            >
                            <a href="/companies/{{$company->hex}}/{{$company->slug}}" class="plain hover:!underline">{{$company->show_name}}</a>
                        </div>
                    </td>
                    @if($search_order_by === 'companies.family_name')
                        <td class="py-0">{{$company->family_name}}</td>
                        <td class="py-0 text-center">{{$company->ranking->year}}</td>
                        <td class="py-0 text-center whitespace-nowrap">{{formatTurnover($company->ranking->turnover)}}</td>
                    @elseif($search_order_by === 'companies.founded_in')
                        <td class="py-0 text-center">{{$company->founded_in}}</td>
                        <td class="py-0 text-center"><div style="white-space: nowrap; overflow: hidden;">{{$company->ranking->year}}</div></td>
                        <td class="py-0 text-center whitespace-nowrap">{{formatTurnover($company->ranking->turnover)}}</td>
                    @else
                        <td class="py-0 text-center">{{$company->ranking->year}}</td>
                        <td class="py-0 text-center whitespace-nowrap">{{formatTurnover($company->ranking->turnover)}}</td>
                        <td class="py-0 text-center">{{formatEmployees($company->ranking->employees)}}</td>
                    @endif
                    
                    <td class="py-0 text-center whitespace-nowrap"><x-ranking-growth growth="{{$company->latest_ranking->calculateGrowth('turnover')}}" class="text-sm" /></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-pagination-public table="companies" :results="$companies" />
@endif