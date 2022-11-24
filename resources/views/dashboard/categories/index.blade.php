<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Categories</h1>
        <a href="/dashboard/categories/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create category
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your categories here.</p>

    <x-alerts/>

    <table>
        <thead>
            <tr>
                <th>Category name</th>
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
                    <td>45</td>
                    <td class="flex items-center">
                        <img src="{{asset('images/users/default-profile-pic-male.jpg')}}" alt="Frank Jones" title="Frank Jones" class="profile-pic-small-round">
                        Frank Jones
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

                        <a href="/dashboard/categories/{{$category->hex}}/text/edit">
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