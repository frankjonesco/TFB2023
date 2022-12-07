<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Maps</h1>
        <a href="/dashboard/sectors/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create map
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your maps here.</p>

    @if(count($maps) < 1)
        <x-nothing-to-display table="sectors" />
    @else

        <x-alerts/>

        <table>

            <thead>
                <tr>
                    <th>ID</th>
                    <th class="text-center">Sector ID</th>
                    <th class="text-center">Industry ID</th>
                    <th class="text-center">Company ID</th>
                </tr>
            </thead>

            <tbody>
                @foreach($maps as $map)
                    <tr>
                        <td>
                            {{$map->id}}
                        </td>
                        <td class="text-center">
                            {{$map->sector_id}}
                        </td>
                        <td class="text-center">
                            {{$map->industry_id}}
                        </td>
                        <td class="text-center">
                            {{$map->company_id}}
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>


    @endif

</x-dashboard-layout>