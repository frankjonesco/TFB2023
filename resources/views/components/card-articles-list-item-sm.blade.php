@php
    if(!isset($thumbnailSize)){
        $thumbnailSize = null;
    }
@endphp

<div {{$attributes->merge(['class' => 'flex pb-3 mb-3 border-b border-gray-100'])}}>

    <a href="{{$article->link()}}">
        <div class="{{thumbnailSize($thumbnailSize)}} bg-no-repeat bg-cover bg-center px-4 flex flex-col justify-end overflow-hidden border hover:border-gray-300" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.25)), url('{{$article->getImageThumbnail()}}');"></div>
    </a>
                            
    <div class="flex flex-col pl-4 self-center">
        <span class="text-gray-400 text-xs italic">
            Top Stories
        </span> 
        <h4 class="pt-1 pb-1 text-gray-500 text-xs font-bold">
            <a href="{{$article->link()}}" class="text-slate-900 hover:!text-red-500 no-underline">
                {{$article->title}}
            </a>
        </h4>
        <span class="text-xs text-gray-400 italic">
            <i class="fa-regular fa-clock mr-1"></i>
            {{showDate($article->created_at)}}
        </span>
    </div>
</div>