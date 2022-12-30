@if(empty($companies))
    <p class="no-results">Nothing to display.</p>
@else
    <table>
        <thead>
            <th>Rank</th>
            <th>Company name</th>
            <th class="text-center">Year</th>
            <th class="text-center">Turnover</th>
            <th class="text-center">Employees</th>
            <th class="text-center">Growth</th>
        </thead>
        <tbody>
            @foreach($companies as $key => $company)
                {{-- {{dd($company)}} --}}
                <tr>
                    <td>{{$companies->firstItem() + $key}}</td>
                    <td>
                        <div class="flex items-center">
                            <img 
                                src="{{$company->getImageThumbnail()}}"
                                alt="Top Family Business - {{$company->registered_name}}"
                                class="w-6 mr-4 rounded border border-indigo-100 hover:border-blue-300 cursor-pointer"
                            >
                            <a href="/companies/{{$company->hex}}/{{$company->slug}}">{{$company->show_name}}</a>
                        </div>
                    </td>
                    <td class="text-center">{{$company->ranking->year}}</td>
                    <td class="text-center">{{formatTurnover($company->ranking->turnover)}}</td>
                    <td class="text-center">{{formatEmployees($company->ranking->employees)}}</td>
                    <td class="text-center"><x-ranking-growth growth="{{$company->latest_ranking->calculateGrowth('turnover')}}" class="text-sm" /></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <x-pagination-public table="companies" :results="$companies" />
@endif