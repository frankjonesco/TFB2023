<div class="flex items-center">
    <a href="/companies/{{$company->hex}}/{{$company->slug}}">
        <img src="{{$company->logoImageThumbnail}}" alt="{{$company->show_name}}" title="{{$company->show_name}}" class="w-5 mr-1.5">
    </a>
    <a href="/companies/{{$company->hex}}/{{$company->slug}}">
        {{$company->show_name}}
    </a>
</div>