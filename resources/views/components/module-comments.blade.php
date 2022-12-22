<div class="flex mb-7 mt-16">
    <h3 class="pr-2 pb-3 border-b border-red-500 uppercase text-sm text-gray-800">Recent comments</h3>
    <span class="grow border-b border-gray-200"></span>
</div>

<style>
.comment-bubble{
    position: relative;
    border: 1px solid #f0f0f0;
}

.comment-bubble:after, .comment-bubble:before {
    right: 100%;
    top: 24px;
    border: 1px solid #f0f0f0;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
}

.comment-bubble:after {
    border-color: rgba(136, 183, 213, 0);
    border-right-color: #fafafa;
    border-width: 9px;
    margin-top: -9px;
}

.comment-bubble:before {
    border-color: rgba(194, 225, 245, 0);
    border-right-color: #f0f0f0;
    border-width: 11px;
    margin-top: -11px;
}


</style>

@foreach($comments as $comment)
    <div class="flex text-gray-600 text-sm mb-6">
        <img src="{{asset('images/users/'.$comment->user->hex.'/tn-'.$comment->user->image)}}" alt="{{$comment->user->full_name}}" class="w-14 h-14 mr-3 rounded-full border border-gray-400">
        <div>
            <div class="comment-bubble rounded w-full ml-3 mb-2.5 px-4 py-2 italic bg-slate-50 !border-stone-200">
                {!!linkify($comment->body)!!}
            </div>
            <div class="ml-7 text-xs">
                <a href="/news/articles/{{$comment->article->hex}}/{{$comment->article->slug}}" class="text-slate-900 hover:!text-red-500 italic">
                    {{$comment->article->title}}
                </a>
                <div class="mt-1 text-xs italic text-gray-400"><i class="fa-solid fa-user mr-1.5"></i>{{$comment->user->full_name}}</div>
            </div>
        </div>
    </div>
    
@endforeach