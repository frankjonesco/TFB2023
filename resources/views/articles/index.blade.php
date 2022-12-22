<x-layout>
    
    <x-container-full-w>
        {{-- News grid --}}
        <div class="grid grid-cols-2 gap-3 m-3">
            {{-- Leading articles --}}
            <div class="w-full">
                @php
                    $article = $leading_articles[0];
                @endphp
                <div class="bg-no-repeat bg-center bg-cover px-7 py-8 flex flex-col justify-end h-[32rem]" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.85)),
                url('{{$article->getImage()}}');" >
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
                                
                            </div>
                        </div>
                    @endforeach  
                </div>
            </div>
        </div>

        {{-- Featured articles --}}
        <div class="bg-repeat" style="background-image:url('../images/bg.png');">
            <div class="flex w-3/4 mx-auto px-12 bg-white">
                <div class="mt-3 pl-3 pr-4 w-2/3 border-r border-gray-100">

                    <div class="flex mb-7">
                        <h3 class="pr-2 pb-3 border-b border-red-500 uppercase text-sm text-gray-800">Today's features</h3>
                        <span class="grow border-b border-gray-200"></span>
                    </div>

                    <div class="flex border-b border-gray-100 mb-3">
                        <div class="w-1/2 mr-7">
                            @foreach($highlighted_feature_articles as $article)
                                @if($loop->last)
                                    @php
                                        $color = 'bg-lime-600';
                                    @endphp
                                    <div class="mb-0">
                                @else
                                    @php
                                        $color = 'bg-pink-600';
                                    @endphp
                                    <div class="mb-7">
                                @endif
                                
                                    <div class="bg-no-repeat bg-cover bg-center px-4 py-5 flex flex-col justify-end overflow-hidden h-72" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.85)), url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');">
                                        <div class="flex flex-col justify-center items-center h-full">
                                            <span class="{{$color}} w-max px-2 py-1 rounded text-xs font-bold">
                                                Top Stories
                                            </span>
                                            <h3 class="pt-3 pb-3 text-center">
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
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="w-1/2">
                            
                            @foreach($featured_articles as $key => $article)
                                @if($loop->last)
                                    <div class="flex mb-3 w-full border-0">
                                @else
                                    <div class="flex pb-3 mb-3 w-full border-b border-gray-100">
                                @endif
                                        
                                    <div>
                                        <a href="/news/articles/{{$article->hex}}/{{$article->slug}}">
                                            <div class="w-24 h-20 bg-no-repeat bg-cover bg-center px-4 flex flex-col justify-end overflow-hidden border hover:border-gray-300" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.85)), url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');"></div>
                                        </a>
                                    </div>
                                    <div class="flex flex-col pl-4 self-center">
                                        <span class="text-gray-400 text-xs italic">
                                            Top Stories
                                        </span> 
                                        <h4 class="pt-1 pb-1 text-gray-500 text-xs font-bold">
                                            <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-slate-900 hover:!text-red-500">
                                                {{$article->title}}
                                            </a>
                                        </h4>
                                        <span class="text-xs text-gray-400 italic">
                                            <i class="fa-regular fa-clock mr-1"></i>
                                            {{showDate($article->created_at)}}
                                        </span>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <button class="w-full mt-2">View all articles</button> --}}
                        </div>
                    </div>
                    <div class="w-full text-center">
                        <button class="btn btn-plain"><i class="fa-solid fa-refresh mr-1.5"></i> View more features</button>
                    </div>

                </div>

                <div class="mt-3 pl-4 w-1/3">
                    <x-module-socials />
                    <x-module-articles-tabbed-list :articles="$tabbed_articles" />
                    <x-module-comments :comments="$comments" />
                </div>

            </div>
        </div>

    </x-container>
</x-layout>