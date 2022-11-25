<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Users</h1>
        <a href="/dashboard/users/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create user
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your users here.</p>

    @if(count($users) < 1)
        <x-nothing-to-display table="users" />
    @else
        <x-alerts/>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Last updated</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <a href="/dashboard/users/{{$user->hex}}">
                                {{$user->full_name}}
                            </a>
                        </td>
                        <td>
                            {{$user->updated_at}}
                        </td>
                        <td class="text-right">
                            <a href="/dashboard/users/{{$user->hex}}">
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

        <x-pagination table="users" :results="$users" />
        
    @endif

</x-dashboard-layout>