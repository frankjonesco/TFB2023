<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Sectors</h1>
        <a href="/dashboard/sectors/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create sector
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your sectors here.</p>

    <x-alerts/>

    <table>
        <thead>
            <tr>
                <th>Sector name</th>
                <th class="text-center">Industries</th>
                <th class="text-center">Companies</th>
                <th>Owner</th>
                <th>Last updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($sectors as $sector)
                <tr>
                    <td>
                        <a href="/dashboard/sectors/{{$sector->hex}}">
                            {{$sector->name}}
                        </a>
                    </td>
                    <td class="text-center">{{count($sector->industries)}}</td>
                    <td class="text-center">{{count($sector->companies)}}</td>
                    <td>
                        <x-user-profile-pic-full-name :user="$sector->user" />
                    </td>
                    <td>
                        {{$sector->updated_at}}
                    </td>
                    <td class="text-right">
                        <a href="/dashboard/sectors/{{$sector->hex}}">
                            <button>
                                <i class="fa-solid fa-info-circle"></i>
                                Details
                            </button>
                        </a>

                        <a href="/dashboard/sectors/{{$sector->hex}}/text/edit">
                            <button>
                                <i class="fa-solid fa-marker"></i>
                                Edit
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <x-pagination table="sectors" :results="$sectors" />

</x-dashboard-layout>