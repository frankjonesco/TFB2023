@if(count($categories) < 1)
    <x-nothing-to-display table="categories" />
@else
    <table>
        <thead>
            <tr>
                <th>Category name</th>
                <th>Sector</th>
                <th>Articles</th>
                <th>Owner</th>
                <th>Last updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        <a href="/dashboard/categories/{{$category->hex}}">
                            {{$category->name}}
                        </a>
                    </td>
                    <td>
                        <a href="/dashboard/sectors/{{$category->sector->hex}}">
                            {{$category->sector->name}}
                        </a>
                    </td>
                    <td>{{count($category->articles)}}</td>
                    <td>
                        <x-user-profile-pic-full-name :user="$category->user" />
                    </td>
                    <td>
                        {{$category->updated_at}}
                    </td>
                    <td class="text-right">
                        <a href="/dashboard/categories/{{$category->hex}}">
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

    <x-pagination table="categories" :results="$categories" />
    
@endif