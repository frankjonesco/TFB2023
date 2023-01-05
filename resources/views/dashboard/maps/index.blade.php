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

    <h2>Maps</h2>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Sector ID</th>
                <th>Industry ID</th>
                <th>Company ID</th>
            </tr>
        </thead>

        <tbody>
            @foreach($maps as $map)
                <tr>
                    <td>
                        {{$map->id}}
                    </td>
                    <td>
                        {{$map->sector_id}}
                    </td>
                    <td>
                        {{$map->industry_id}}
                    </td>
                    <td>
                        {{$map->company_id}}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</x-dashboard-layout>