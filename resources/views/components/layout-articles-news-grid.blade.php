{{-- News grid --}}
<div class="grid grid-cols-5 gap-0.5 p-0.5 bg-slate-900">

    <div class="w-full">
        <div class="grid grid-rows-2 gap-0.5 h-full">
            @foreach($latestArticles as $key => $article)
                @if($key <= 1)
                    <div class="bg-no-repeat bg-center bg-cover px-4 py-5 flex flex-col justify-end overflow-hidden" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.6)), url('{{$article->getImage()}}');">
                        <div class="translate-y-0">

                            <x-category-pip :category="$article->category" />

                            <h3 class="pt-1.5 pb-1">
                                <a href="{{$article->link()}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80 no-underline">
                                    {{$article->title}}
                                </a>
                            </h3>
                            <x-article-stats :article="$article" size="md" class="text-xs" />
                                    
                        </div>
                    </div>
                @endif
            @endforeach  
        </div>
    </div>

    {{-- Leading articles --}}
    <div class="w-full col-span-2">
        @php
            $article = $leadingArticles[0];
        @endphp
        <div class="bg-no-repeat bg-center bg-cover px-7 py-8 flex flex-col justify-end h-[32rem]" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.7)),
        url('{{$article->getImage()}}');" >
            <x-category-pip :category="$article->category" />
            <h2 class="py-3">
                <a href="{{$article->link()}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80 no-underline">
                    {{$article->title}}
                </a>
            </h2>
            <x-article-stats :article="$article" class="text-base" />
        </div>
    </div>

    {{-- Grid for latest articles --}}
    <div class="w-full col-span-2">
        <div class="grid grid-cols-2 gap-0.5 h-full">
            @foreach($latestArticles as $key => $article)
                @if($key >= 2)
                    <div class="bg-no-repeat bg-center bg-cover px-4 py-5 flex flex-col justify-end overflow-hidden" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.6)), url('{{$article->getImage()}}');">
                        <div class="translate-y-0">

                            <x-category-pip :category="$article->category" />

                            <h3 class="pt-1.5 pb-1">
                                <a href="{{$article->link()}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80 no-underline">
                                    {{$article->title}}
                                </a>
                            </h3>
                            <x-article-stats :article="$article" size="md" class="text-xs" />
                                    
                        </div>
                    </div>
                @endif
            @endforeach  
        </div>
    </div>
</div>