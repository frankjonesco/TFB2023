@if($article->tags)
    <div class="article-tags text-sm">
        <i class="fa-solid fa-tags mr-2 text-xl"></i>
        Tags:
        <ul>
            @foreach($article->splitTags() as $tag)
                <li>
                    <a href="/tags/{{strtolower($tag)}}">
                        {{$tag}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endif