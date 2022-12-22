<div class="flex mb-7 mt-16">
    <h3 class="pr-2 pb-3 border-b border-red-500 uppercase text-sm text-gray-800">Recent comments</h3>
    <span class="grow border-b border-gray-200"></span>
</div>

<style>
.comment-bubble{
    margin-bottom:1rem;
    padding:1rem;
    position: relative;
    background: #fafafa;
    border: 1px solid #f0f0f0;
    width: 250px;
    height: 350px;
}

.comment-bubble:after, .comment-bubble:before {
    right: 100%;
    top: 31px;
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
    border-width: 15px;
    margin-top: -15px;
}

.comment-bubble:before {
    border-color: rgba(194, 225, 245, 0);
    border-right-color: #f0f0f0;
    border-width: 17px;
    margin-top: -17px;
}


</style>

@foreach($comments as $comment)
    <div class="flex text-gray-600 text-xs">
        <img src="{{asset('images/users/'.$comment->user->hex.'/tn-'.$comment->user->image)}}" alt="{{$comment->user->full_name}}" class="w-16 h-16 mr-4 rounded-full border border-gray-400">
        <div class="comment-bubble rounded w-full ml-3 italic">
            {!!linkify($comment->body)!!}
        </div>
        {{$comment->article->title}}
    </div>
@endforeach