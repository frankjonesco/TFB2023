<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Articles</h1>
        <a href="/dashboard/articles/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create article
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your articles here.</p>

    <x-alerts/>

    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Sector</th>
                <th>Category</th>
                <th>Owner</th>
                <th>Last updated</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
                <tr>
                    <td>
                        <a href="/dashboard/articles/{{$article->hex}}">
                            {{$article->title}}
                        </a>
                    </td>
                    <td>
                        <a href="/dashboard/sectors/{{$article->sector->hex}}">
                            {{$article->sector->name}}
                        </a>
                    </td>
                    <td>
                        <a href="/dashboard/categories/{{$article->category->hex}}">
                            {{$article->category->name}}
                        </a>
                    </td>
                    <td class="flex items-center">
                        <img src="{{asset('images/users/default-profile-pic-male.jpg')}}" alt="Frank Jones" title="Frank Jones" class="profile-pic-small-round">
                        Frank Jones
                    </td>
                    <td>
                        {{$article->updated_at}}
                    </td>
                    <td class="text-right">
                        <a href="/dashboard/articles/{{$article->hex}}">
                            <button>
                                <i class="fa-solid fa-info-circle"></i>
                                Details
                            </button>
                        </a>

                        <a href="/dashboard/articles/{{$article->hex}}/text/edit">
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