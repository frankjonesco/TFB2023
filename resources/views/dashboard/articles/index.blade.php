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

    @if(count($articles) < 1)
        <x-nothing-to-display table="articles" />
    @else
        <x-alerts/>
        <table>
            <thead>
                <tr>
                    <th>Title</th>
                    <th></th>
                    <th>Category</th>
                    <th class="text-center">Views</th>
                    <th class="text-center">Comments</th>
                    <th>Owner</th>
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
                            <a href="/dashboard/articles/{{$article->hex}}">
                                <img 
                                    src="{{asset('images/articles/'.$article->hex.'/tn-'.$article->image)}}"
                                    alt="Top Family Business - {{$article->title}}"
                                    class="w-20 mr-4 rounded border border-indigo-100 hover:border-amber-300 cursor-pointer"
                                >
                            </a>
                        </td>
                        <td>
                            @if($article->category)
                                <a href="/dashboard/categories/{{$article->category->hex}}">
                                    {{$article->category->name}}
                                </a>
                            @else
                                <span class="no-results">Uncategorised</span>
                            @endif
                        </td>
                        <td class="text-center">
                            {{$article->views}}
                        </td>
                        <td class="text-center">
                            {{count($article->comments)}}
                        </td>
                        <td>
                            <x-user-profile-pic-full-name :user="$article->user" />
                        </td>
                        <td class="text-right">
                            <a href="/dashboard/articles/{{$article->hex}}">
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

        <x-pagination table="articles" :results="$articles" />

    @endif

</x-dashboard-layout>