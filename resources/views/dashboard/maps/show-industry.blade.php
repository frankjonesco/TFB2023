<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Maps</h1>
        <a href="/dashboard/maps">
            <button>
                <i class="fa-solid fa-plus"></i>
                Maps
            </button>
        </a>
        <a href="/dashboard/maps/sectors">
            <button>
                <i class="fa-solid fa-plus"></i>
                Sectors
            </button>
        </a>
        <a href="/dashboard/maps/industries">
            <button>
                <i class="fa-solid fa-plus"></i>
                Industries
            </button>
        </a>
        <a href="/dashboard/maps/companies">
            <button>
                <i class="fa-solid fa-plus"></i>
                Companies
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your maps here.</p>

    <x-alerts/>

    <h2>Industry: {{$industry->english_name}}</h2>
    <h2>Companies</h2>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>No. of sectors</th>
                <th>Sectors</th>
                <th>No. of industries</th>
                <th>Industries</th>               
            </tr>
        </thead>

        <tbody>
            @foreach($industry->companies as $company)
                <tr>
                    <td>
                        {{$company->id}}
                    </td>
                    <td>
                        {{$company->registered_name}}
                    </td>
                    <td>
                        {{count($company->sectors)}}
                    </td>
                    <td>
                        <ul>
                            @foreach($company->sectors as $sector)
                                <li>- 
                                    <a href="/dashboard/maps/sectors/{{$sector->hex}}">
                                        {{$sector->english_name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{count($company->industries)}}
                    </td>
                    <td>
                        <ul>
                            @foreach($company->industries as $industry)
                                <li>- 
                                    <a href="/dashboard/maps/industries/{{$industry->hex}}">
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