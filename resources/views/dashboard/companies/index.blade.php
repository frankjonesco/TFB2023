<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Companies</h1>
        <a href="/dashboard/companies/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create company
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your companies here.</p>

    @if(count($companies) < 1)
        <x-nothing-to-display table="companies" />
    @else
        <x-alerts/>
        <table class="table-fixed">
            <thead>
                <tr>
                    <th>Company name</th>
                    <th>Sectors</th>
                    <th>Industries</th>
                    <th>Owner</th>
                    <th>Visibility</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($companies as $company)    
                    <tr>
                        <td>
                            <a href="/dashboard/companies/{{$company->hex}}">
                                {{$company->registered_name}}
                            </a>
                        </td>
                        <td>
                            @if($company->sectors)
                                @foreach($company->sectors as $sector)
                                    <a href="/dashboard/sectors/{{$sector->hex}}">
                                        {{$sector->name}}
                                    </a>
                                    <br>
                                @endforeach
                            @endif
                        </td>
                        <td>

                            @if($company->industry_rows)
                                @foreach($company->industry_rows as $industry)
                                    <a href="/dashboard/industries/{{$industry->hex}}">
                                        {{$industry->name}}
                                    </a>
                                    <br>
                                @endforeach
                            @endif
                        </td>
                        <td>
                            <x-user-profile-pic-full-name :user="$company->user" />
                        </td>
                        <td>
                            {!!$company->statusInColor()!!}
                        </td>
                        <td class="text-right">
                            <a href="/dashboard/companies/{{$company->hex}}">
                                <button>
                                    <i class="fa-solid fa-info-circle"></i>
                                    Details
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <x-pagination table="companies" :results="$companies" />
    
    @endif

</x-dashboard-layout>
