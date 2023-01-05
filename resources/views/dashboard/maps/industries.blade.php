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

    <h2>Industries</h2>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Industry name</th>
                <th class="text-center">In how many sectors?</th>
                <th>Sectors</th>
                <th class="text-center">Has how many companies?</th>               
            </tr>
        </thead>

        <tbody>
            @foreach($industries as $industry)
                <tr>
                    <td>
                        {{$industry->id}}
                    </td>
                    <td>
                        <a href="{{url('dashboard/maps/industries/'.$industry->hex)}}">
                            {{$industry->english_name}}
                        </a>
                    </td>
                    <td class="text-center">
                        {{count($industry->grouped_sectors)}}
                    </td>
                    <td>
                        <ul>
                            @foreach($industry->grouped_sectors as $sector)
                                <li>- 
                                    <a href="{{url('dashboard/maps/sectors/'.$sector->hex)}}">
                                        {{$sector->english_name}}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </td>
                    <td class="text-center">
                        {{count($industry->grouped_companies)}}
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</x-dashboard-layout>