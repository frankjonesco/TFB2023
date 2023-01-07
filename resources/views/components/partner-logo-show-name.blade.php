<div class="flex items-center">
    <a href="{{$partner->link}}">
        <img src="{{$partner->getLogo()}}" alt="{{$partner->name}}" title="{{$partner->name}}" class="w-5 mr-1.5">
    </a>
    <a href="{{$partner->link}}" class="text-slate-900 hover:!text-red-500 plain">
        {{$partner->name}}
    </a>
</div>