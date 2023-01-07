@php
    $colors = ['bg-red-500', 'bg-pink-500', 'bg-green-600', 'bg-lime-600', 'bg-sky-500', 'bg-indigo-500', 'bg-blue-500', 'bg-purple-500', 'bg-rose-500'];
    $random = array_rand($colors);
    $color = $colors[$random];

    if(isset($useThumbnail)){
        $image = $article->getImageTHumbnail();
    }else{
        $image = $article->getImage();
    }

@endphp

<div {{$attributes->merge(['class' => 'bg-no-repeat bg-cover bg-center px-4 py-5 mb-1.5 flex flex-col justify-end overflow-hidden h-72'])}} style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.55)), url('{{$image}}');">
    <div class="flex flex-col justify-center items-center h-full">
        <x-category-pip :category="$article->category" />
        <h3 class="pt-3 pb-3 text-center">
            <a href="{{$article->link()}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80 no-underline">
                {{$article->title}}
            </a>
        </h3>
        <span class="text-xs italic text-zinc-100 font-light">
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
    </div>
</div>