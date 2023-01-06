<div class="flex items-center">
    <a href="{{$company->link()}}">
        <img src="{{$company->getImageThumbnail()}}" alt="{{$company->show_name}}" title="{{$company->show_name}}" class="w-5 mr-1.5">
    </a>
    <a href="{{$company->link()}}" class="text-slate-900 hover:!text-red-500 plain">
        {{$company->show_name}}
    </a>
</div>