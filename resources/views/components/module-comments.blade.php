<div class="sidebar-module">
    <x-layout-heading heading="Recent comments" class="heading-mt" />

    @foreach($comments as $comment)
        <div class="flex text-gray-600 text-sm mb-6">
            <img src="{{$comment->authorImage()}}" alt="{{$comment->authorName()}}" class="w-14 h-14 mr-3 rounded-full border border-gray-400">
            <div>
                <div class="comment-bubble rounded w-full ml-3 mb-2.5 px-4 py-2 italic bg-slate-50 !border-stone-200">
                    {!!linkify($comment->body)!!}
                </div>
                <div class="ml-7 text-xs">
                    <a href="/news/articles/{{$comment->article->hex}}/{{$comment->article->slug}}" class="text-slate-900 hover:!text-red-500 italic">
                        {{$comment->article->title}}
                    </a>
                    <div class="mt-1 text-xs italic text-gray-400"><i class="fa-solid fa-user mr-1.5"></i>{{$comment->authorName()}}</div>
                </div>
            </div>
        </div>
        
    @endforeach
</div>