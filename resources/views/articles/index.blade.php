<x-layout>
    <x-container>
        {{-- News grid --}}
        <div class="grid grid-cols-2 gap-3 my-3">
            {{-- Leading articles --}}
            <div class="w-full">
                @php
                    $article = $leading_articles[0];
                @endphp
                <div class="bg-no-repeat bg-cover px-7 py-8 flex flex-col justify-end h-[32rem]" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.65)),
                url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');" >
                    <span class="bg-indigo-500 w-max px-2 py-1 rounded-lg text-sm font-bold">
                        Top Stories
                    </span>
                    <h2 class="py-3">
                        <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80">
                            {{$article->title}}
                        </a>
                    </h2>
                    <span class="text-sm italic">
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
                    @foreach($latest_articles as $key => $article)
                        @php
                            if($key === 0){
                                $color = 'bg-green-500';
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
                        <div class="bg-no-repeat px-4 py-5 flex flex-col justify-end overflow-hidden" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.45)), url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');">
                            <div class="translate-y-[4.80rem]">
                                <span class="{{$color}} w-max px-2 py-1 rounded-lg text-xs font-bold">
                                    Top Stories
                                </span>
                                <h3 class="pt-1.5 pb-1">
                                    <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80">
                                        {{$article->title}}
                                    </a>
                                </h3>
                                <span class="text-xs italic">
                                    <span class="mr-3">
                                        <i class="fa-regular fa-clock mr-1"></i>
                                        {{showDate($article->created_at)}}
                                    </span>
                                    <span>
                                        <i class="fa-regular fa-eye mr-1"></i>
                                        {{$article->views}}
                                    </span>
                                </span>
                                <p class="mt-3 text-sm">
                                    All accessor methods return an Attribute instance which defines how the attribute will be accessed and, optionally, mutated.
                                </p>
                            </div>
                        </div>
                    @endforeach  
                </div>
            </div>
        </div>

        {{-- Featured articles --}}
        <div class="mt-6 px-3">

            <div class="flex mb-4">
                <h3 class="pl-1.5 pr-5 border-b border-sky-500 uppercase">Today's featured</h3>
                <span class="grow border-b border-zinc-500"></span>
            </div>

            <div class="flex">
                <div>
                    @foreach($highlighted_feature_articles as $article)
                        <div class="bg-no-repeat px-4 py-5 flex flex-col justify-end overflow-hidden" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.45)), url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');">
                            
                        </div>
                    @endforeach
                </div>
                <div>
                    @foreach($featured_articles as $article)
                        <div class="flex pb-2 mb-2 border-b border-zinc-700 border-dotted">
                            <img src="{{asset('images/articles/'.$article->hex.'/'.$article->image)}}" alt="" class="w-48">
                            <div class="flex flex-col pl-4 self-center">
                                <span class="text-xs text-zinc-500 italic">Category</span>
                                <h4 class="pt-1 pb-2">{{$article->title}}</h4>
                                <span class="text-sm text-zinc-500 italic">
                                    <i class="fa-regular fa-clock mr-1"></i>
                                    {{showDate($article->created_at)}}
                                </span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            

        </div>

    </x-container>
</x-layout>