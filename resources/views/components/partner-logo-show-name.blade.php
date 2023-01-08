<div class="flex items-center">
    @if($partner->url === '/')
        <a href="{{$partner->link}}">
            <img src="{{$partner->getLogo()}}" alt="{{$partner->name}}" title="{{$partner->name}}" class="w-5 mr-1.5">
        </a>
        <a href="{{$partner->link}}" class="text-slate-900 hover:!text-red-500 plain">
            {{$partner->name}}
        </a>
    @else
        <a href="{{$partner->link}}" target="_blank">
            <img src="{{$partner->getLogo()}}" alt="{{$partner->name}}" title="{{$partner->name}}" class="w-5 mr-1.5">
        </a>
        <a href="{{$partner->link}}" target="_blank" class="text-slate-900 hover:!text-red-500 plain">
            {{$partner->name}}
        </a>
    @endif
</div>