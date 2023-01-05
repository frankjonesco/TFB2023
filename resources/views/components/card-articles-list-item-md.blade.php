@php
    if(!isset($thumbnailSize)){
        $thumbnailSize = 'md';
    }
@endphp

@php
    $colors = ['bg-red-500', 'bg-pink-500', 'bg-green-600', 'bg-lime-600', 'bg-sky-500', 'bg-indigo-500', 'bg-blue-500', 'bg-purple-500', 'bg-rose-500'];
    $random = array_rand($colors);
    $color = $colors[$random];
@endphp

<div {{$attributes->merge(['class' => 'flex-col pb-3 mb-3 mx-auto w-5/6'])}}>

    <a href="{{$article->link()}}" class="no-underline">
        <div class="w-full h-48 mb-2 bg-no-repeat bg-cover bg-center p-4 flex flex-col justify-end overflow-hidden border hover:border-gray-300" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.25)), url('{{$article->getImageThumbnail()}}');">
            <span class="{{$color}} w-max px-2 py-1 rounded text-xs font-bold text-zinc-100">
                Top Stories
            </span>
        </div>
    </a>
                                
    <div class="flex flex-col self-center">
        <h4 class="pt-1 pb-1 mb-1 text-gray-500 text-xs font-bold">
            <a href="{{$article->link()}}" class="text-slate-900 text-sm hover:!text-red-500 no-underline">
                {{truncate($article->title, 120)}}
            </a>
        </h4>
        <span class="text-xs italic text-gray-500 font-light pt-1 pb-3.5">
            <span class="mr-3">
                <i class="fa-regular fa-clock mr-1"></i>
                {{showDate($article->created_at)}}
            </span>
            <span class="mr-6">
                <i class="fa-regular fa-user mr-1"></i>
                by {{$article->user->full_name}}
            </span>
            <span>
                <i class="fa-regular fa-eye mr-1"></i>
                {{$article->views}}
            </span>
        </span>

        <p class="text-xs font-light">{{truncate(strip_tags($article->body), 150)}} <a href="{{$article->link()}}" class="no-underline hover:underline">Read more</a></p>
        
    </div>

</div>