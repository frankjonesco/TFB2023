@if(count($users) < 1)
    <x-nothing-to-display table="users" />
@else
    <x-alerts/>
    <table>
        <thead>
            <tr>
                <th class="w-1/4">Name</th>
                <th class="text-center">Companies</th>
                <th class="text-center">Articles</th>
                <th class="text-center">Comments</th>
                <th>User type</th>
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
                            <x-user-profile-pic-full-name :user="$user" />
                        </div>
                    </td>
                    <td class="text-center">
                        {{count($user->companies)}}
                    </td>
                    <td class="text-center">
                        {{count($user->articles)}}
                    </td>
                    <td class="text-center">
                        {{count($user->comments)}}
                    </td>
                    <td>
                        {{$user->user_type->name}}
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