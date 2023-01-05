@php
    if(!isset($thumbnailSize)){
        $thumbnailSize = null;
    }
@endphp

<div {{$attributes->merge(['class' => 'flex flex-col p-4 border border-gray-200 mb-3 rounded'])}}>
    <div class="bg-no-repeat bg-center bg-cover px-7 py-8 mb-3 flex flex-col justify-end h-72" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.85)),
    url('{{$article->getImage()}}');" >
        <span class="bg-indigo-500 text-white w-max px-2 py-1 rounded-lg text-sm font-bold">
            Top Stories
        </span>
        <h2 class="py-3">
            <a href="{{$article->link()}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80 no-underline">
                {{$article->title}}
            </a>
        </h2>
        <span class="text-sm italic text-zinc-100">
            <span class="mr-6">
                <i class="fa-regular fa-clock mr-1"></i>
                {{showDate($article->created_at)}}
            </span>
            <span class="mr-6">
                <i class="fa-regular fa-user mr-1"></i>
                by {{$article->user->full_name}}
            </span>
            <span class="mr-6">
                <i class="fa-regular fa-comments mr-1"></i>
                {{count($article->comments)}} comments
            </span>
            <span>
                <i class="fa-regular fa-eye mr-1"></i>
                {{$article->views}}
            </span>
        </span>
    </div>       

    <p class="text-base p-1">
        {{truncate(strip_tags($article->body), 300)}}
    </p>

    <div class="flex items-center justify-end p-1">
        {{-- Show associated companies --}}
        @if(count($article->associated_companies) > 0)
            <div class="text-xs grow">
                <p class="font-bold">Associated companies:</p>
                @foreach($article->associated_companies as $company)
                    <p><x-company-logo-show-name :company="$company" /></p>
                @endforeach
            </div>
        @endif

        <a href="{{$article->link()}}" class="text-slate-700 hover:!text-red-500">
            <button class="btn btn-black !text-xs"><i class="fa-solid fa-arrow-right mr-1.5"></i>Read more</button>
        </a>
    </div>

</div>