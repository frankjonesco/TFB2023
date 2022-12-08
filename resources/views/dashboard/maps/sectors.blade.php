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

    <h2>Sectors</h2>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th class="text-center">Has how many industries?</th>
                <th>Industries</th>
                <th class="text-center">Has how many companies?</th>
            </tr>
        </thead>

        <tbody>
            @foreach($sectors as $sector)
                <tr>
                    <td>
                        {{$sector->id}}
                    </td>
                    <td>
                        <a href="/dashboard/maps/sectors/{{$sector->hex}}">
                            {{$sector->english_name}}
                        </a>
                    </td>
                    <td class="text-center">
                        {{count($sector->grouped_industries)}}
                    </td>
                    <td>
                        <ul>
                            @foreach($sector->grouped_industries as $industry)
                                <li>- 
                                    <a href="/dashboard/maps/industries/{{$industry->hex}}">
                                        {{$industry->english_name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="text-center">
                        {{count($sector->grouped_companies)}}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</x-dashboard-layout>