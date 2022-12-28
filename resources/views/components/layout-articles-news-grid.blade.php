{{-- News grid --}}
<div class="grid grid-cols-2 gap-3 p-3 bg-zinc-800">
    {{-- Leading articles --}}
    <div class="w-full">
        @php
            $article = $leadingArticles[0];
        @endphp
        <div class="bg-no-repeat bg-center bg-cover px-7 py-8 flex flex-col justify-end h-[32rem]" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.85)),
        url('{{$article->getImage()}}');" >
            <span class="bg-indigo-500 text-white w-max px-2 py-1 rounded-lg text-sm font-bold">
                Top Stories
            </span>
            <h2 class="py-3">
                <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80">
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
    </div>

    {{-- Grid for latest articles --}}
    <div class="w-full">
        <div class="grid grid-cols-2 gap-3 h-full">
            @foreach($latestArticles as $key => $article)
                @php
                    if($key === 0){
                        $color = 'bg-lime-600';
                    }
                    elseif($key === 1){
                        $color = 'bg-pink-500';
                    }
                    elseif($key === 2){
                        $color = 'bg-orange-500';
                    }
                    elseif($key === 3){
                        $color = 'bg-sky-500';
                    }
                    else{
                        $color = 'bg-black-500';
                    }
                @endphp
                <div class="bg-no-repeat bg-center bg-cover px-4 py-5 flex flex-col justify-end overflow-hidden" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.85)), url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');">
                    <div class="translate-y-0">
                        <span class="{{$color}} w-max px-2 py-1 rounded-lg text-xs font-bold text-zinc-100">
                            Top Stories
                        </span>
                        <h3 class="pt-1.5 pb-1">
                            <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80">
                                {{$article->title}}
                            </a>
                        </h3>
                        <span class="text-xs italic text-zinc-100">
                            <span class="mr-3">
                                <i class="fa-regular fa-clock mr-1"></i>
                                {{showDate($article->created_at)}}
                            </span>
                            <span>
                                <i class="fa-regular fa-eye mr-1"></i>
                                {{$article->views}}
                            </span>
                        </span>
                                
                    </div>
                </div>
            @endforeach  
        </div>
    </div>
</div>