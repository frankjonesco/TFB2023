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
                        <div class="flex items-center">
                            <input type="checkbox" name="user_id_checkboxes[]" value="{{$user->id}}" onclick="handleClick(this)">
                            <a href="/dashboard/users/{{$user->hex}}">
                                {{$user->full_name}}
                            </a>
                        </div>
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