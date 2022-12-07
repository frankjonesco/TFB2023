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

    <h2>Industries</h2>

    <table>

        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>No. of sectors</th>
                <th>Sectors</th>
               
            </tr>
        </thead>

        <tbody>
            @foreach($industries as $industry)
                <tr>
                    <td>
                        {{$industry->id}}
                    </td>
                    <td>
                        {{$industry->english_name}}
                    </td>
                    <td>
                        {{count($industry->sectors)}}
                    </td>
                    <td>
                        <ul>
                            @foreach($industry->sectors as $sector)
                                <li>- 
                                    {{$sector->english_name}}
                                </li>
                            @endforeach
                        </ul>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

</x-dashboard-layout>