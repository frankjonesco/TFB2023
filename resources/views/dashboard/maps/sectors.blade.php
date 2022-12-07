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
                <th>English name</th>
                <th>No. of industries</th>
                <th>Industries</th>
                <th>No. of companies</th>
            </tr>
        </thead>

        <tbody>
            @foreach($sectors as $sector)
                <tr>
                    <td>
                        {{$sector->id}}
                    </td>
                    <td>
                        {{$sector->name}}
                    </td>
                    <td>
                        {{$sector->english_name}}
                    </td>
                    <td>
                        {{count($sector->industries)}}
                    </td>
                    <td>
                        <ul>
                            @foreach($sector->industries as $industry)
                                <li>- 
                                    {{$industry->name}}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td>
                        {{count($sector->companies)}}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</x-dashboard-layout>