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

    <x-alerts/>

    <table>
        <thead>
            <tr>
                <th>Industry name</th>
                <th>Sector</th>
                <th>Companies</th>
                <th>Articles</th>
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
                    <td>{{$industry->sector->name}}</td>
                    <td>0</td>
                    <td>0</td>
                    <td class="flex items-center">
                        <img src="{{asset('images/users/default-profile-pic-male.jpg')}}" alt="Frank Jones" title="Frank Jones" class="profile-pic-small-round">
                        Frank Jones
                    </td>
                    <td>
                        {{$industry->updated_at}}
                    </td>
                    <td class="text-right">
                        <a href="/dashboard/industries/{{$industry->hex}}/text/edit">
                            <button>
                                <i class="fa-solid fa-info-circle"></i>
                                Details
                            </button>
                        </a>

                        <a href="/dashboard/industries/{{$industry->hex}}/text/edit">
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
</x-dashboard-layout>