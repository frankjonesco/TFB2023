@if(count($articles) < 1)
    <x-nothing-to-display table="articles" />
@else
    <table class="table-fixed">
        <thead>
            <tr>
                <th class="w-1/4">Article ttitle</th>
                <th></th>
                <th class="w-48">Owner</th>
                <th>Visibility</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
           
            @foreach($articles as $article)
                <tr>
                    <td>
                        <div class="flex items-center">
                            <input type="checkbox" name="article_id_checkboxes[]" value="{{$article->id}}" onclick="handleClick(this)">
                            <a href="/dashboard/articles/{{$article->hex}}">
                                {{$article->title}}
                            </a>
                        </div>
                    </td>
                    <td>
                        <a href="/dashboard/articles/{{$article->hex}}">
                            <img 
                                src="{{$article->getImageThumbnail()}}"
                                alt="Top Family Business - {{$article->title}}"
                                class="w-20 mr-4 rounded border border-indigo-100 hover:border-amber-300 cursor-pointer"
                            >
                        </a>
                    </td>
              
                    <td>
                        <x-user-profile-pic-full-name :user="$article->user" />
                    </td>
                    <td>
                        {!!$article->statusInColor()!!}
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