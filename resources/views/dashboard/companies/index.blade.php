<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Companies</h1>
        <a href="/dashboard/companies/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create company
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your companies here.</p>

    <x-alerts/>

    <table>
        <thead>
            <tr>
                <th>Company name</th>
                <th></th>
                <th></th>
                <th></th>
                <th>Owner</th>
                <th>Last updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)
                <tr>
                    <td>
                        <a href="/dashboard/companies/{{$company->hex}}">
                            {{$company->registered_name}}
                        </a>
                    </td>
                    <td>0</td>
                    <td>0</td>
                    <td>0</td>
                    <td class="flex items-center">
                        <img src="{{asset('images/users/default-profile-pic-male.jpg')}}" alt="Frank Jones" title="Frank Jones" class="profile-pic-small-round">
                        Frank Jones
                    </td>
                    <td>
                        {{$company->updated_at}}
                    </td>
                    <td class="text-right">
                        <a href="/dashboard/companies/{{$company->hex}}">
                            <button>
                                <i class="fa-solid fa-info-circle"></i>
                                Details
                            </button>
                        </a>

                        <a href="/dashboard/companies/{{$company->hex}}/text/edit">
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