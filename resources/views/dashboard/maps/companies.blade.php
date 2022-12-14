<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Maps</h1>
        <a href="{{url('dashboard/maps')}}">
            <button>
                <i class="fa-solid fa-plus"></i>
                Maps
            </button>
        </a>
        <a href="{{url('dashboard/maps/sectors')}}">
            <button>
                <i class="fa-solid fa-plus"></i>
                Sectors
            </button>
        </a>
        <a href="{{url('dashboard/maps/industries')}}">
            <button>
                <i class="fa-solid fa-plus"></i>
                Industries
            </button>
        </a>
        <a href="{{url('dashboard/maps/companies')}}">
            <button>
                <i class="fa-solid fa-plus"></i>
                Companies
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your maps here.</p>

    <x-alerts/>

    <h2>Companies</h2>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="text-center">In how many sectors?</th>
                <th>Sectors</th>
                <th class="text-center">In how many industries?</th>
                <th>Industries</th>
            </tr>
        </thead>

        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>
                        {{$company->id}}
                    </td>
                    <td>
                        {{$company->registered_name}}
                    </td>
                    <td class="text-center">
                        {{count($company->sectors)}}
                    </td>
                    <td>
                        <ul>
                            @foreach($company->sectors as $sector)
                                <li>- 
                                    <a href="{{url('dashboard/maps/sectors/'.$sector->hex)}}">
                                        {{$sector->english_name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="text-center">
                        {{count($company->grouped_industries)}}
                    </td>
                    <td>
                        <ul>
                            @foreach($company->grouped_industries as $industry)
                                <li>- 
                                    <a href="{{url('dashboard/maps/industries/'.$industry->hex)}}">
                                        {{$industry->english_name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</x-dashboard-layout>