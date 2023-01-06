@php
if(!isset($thumbnailSize)){
    $thumbnailSize = null;
}
@endphp

@php
    $colors = ['bg-red-500', 'bg-pink-500', 'bg-green-600', 'bg-lime-600', 'bg-sky-500', 'bg-indigo-500', 'bg-blue-500', 'bg-purple-500', 'bg-rose-500'];
    $random = array_rand($colors);
    $color = $colors[$random];
@endphp

<div {{$attributes->merge(['class' => 'grid grid-cols-10 gap-4 p-4 border-b border-gray-200'])}}>
    
        <a href="{{$article->link()}}" class="no-underline col-span-4">
            <div class="border border-gray-200 rounded-sm p-1.5 bg-lime-50">
            <div class="w-full h-48 bg-no-repeat bg-cover bg-center p-4 flex flex-col justify-end" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.25)), url('{{$article->getImageThumbnail()}}');">
                <span class="{{$color}} w-max px-2 py-1 rounded text-xs font-bold text-zinc-100">
                    {{$article->category_id ? $article->category->name : 'Top Stories'}}
                </span>
            </div></div>
        </a> 



        <div class="col-span-6">
            <h3 class="p-0 m-0 mt-1">
                <a href="{{$article->link()}}" class="plain !text-slate-700 hover:!text-red-500 no-underline">
                    {{$article->title}}
                </a>
            </h3>
            <span class="text-sm italic font-light text-gray-900 my-2 block">
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

            <p class="text-sm p-1">
                {{str_replace('&amp;', '&', truncate(strip_tags($article->body), 240))}}
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

                <a href="{{$article->link()}}" class="text-slate-700 hover:!text-red-500 self-end">
                    <button class="btn btn-black !text-xs"><i class="fa-solid fa-arrow-right mr-1.5"></i>Read more</button>
                </a>
            </div>
        </div>

</div>