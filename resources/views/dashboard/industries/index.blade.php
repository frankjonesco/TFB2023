<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Industries</h1>
        <a href="/dashboard/industries/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create industry
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your industries here.</p>

    @if(count($industries) < 1)
        <x-nothing-to-display table="industries" />
    @else
        <x-alerts/>
        <table>
            <thead>
                <tr>
                    <th>Industry name</th>
                    <th class="text-center">No. of Sectors</th>
                    <th>Sectors</th>
                    <th class="text-center">No. of Companies</th>
                    <th>Owner</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($industries as $industry)
                    <tr>
                        <td>
                            <a href="/dashboard/industries/{{$industry->hex}}">
                                {{$industry->english_name}}
                            </a>
                        </td>
                        <td class="text-center">
                            {{count($industry->grouped_sectors)}}
                        </td>
                        <td>
                            @if($industry->grouped_sectors)
                                <ul>
                                    @foreach($industry->grouped_sectors as $sector)
                                        <li>- 
                                            <a href="/dashboard/sectors/{{$sector->hex}}">
                                                {{$sector->english_name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td class="text-center">
                            {{count($industry->companies)}}
                        </td>
                        <td>
                            <x-user-profile-pic-full-name :user="$industry->user" />
                        </td>
                        <td class="text-right">
                            <a href="/dashboard/industries/{{$industry->hex}}">
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

        <x-pagination table="industries" :results="$industries" />

    @endif

</x-dashboard-layout>