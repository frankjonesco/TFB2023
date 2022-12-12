<div class="flex mb-7 mt-16">
    <h3 class="pl-1.5 pr-5 pb-3 border-b border-sky-500 uppercase text-lg">Recent comments</h3>
    <span class="grow border-b border-zinc-500"></span>
</div>

@foreach($comments as $comment)
    <div class="flex">
        <img src="{{asset('images/users/'.$comment->user->hex.'/tn-'.$comment->user->image)}}" alt="{{$comment->user->full_name}}" class="w-10 h-10 mr-4 rounded-full border border-lime-400">
        <div class="p-4 mb-5 text-zinc-400 text-sm bg-gray-800 border border-zinc-900 rounded-md overflow-hidden">
            {!!linkify($comment->body)!!}
        </div>
    </div>
@endforeach