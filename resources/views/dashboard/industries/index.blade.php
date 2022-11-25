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
                    <th>Sector</th>
                    <th class="text-center">Companies</th>
                    <th>Owner</th>
                    <th>Last updated</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($industries as $industry)
                    <tr>
                        <td>
                            <a href="/dashboard/industries/{{$industry->hex}}">
                                {{$industry->name}}
                            </a>
                        </td>
                        <td>
                            @if($industry->sector)
                                <a href="/dashboard/sectors/{{$industry->sector->hex}}">
                                    {{$industry->sector->name}}
                                </a>
                            @endif
                        </td>
                        <td class="text-center">{{count($industry->companies)}}</td>
                        <td>
                            <x-user-profile-pic-full-name :user="$industry->user" />
                        </td>
                        <td>
                            {{$industry->updated_at}}
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