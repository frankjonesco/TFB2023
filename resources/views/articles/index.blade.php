<x-layout>
    <x-layout-articles-news-grid :leading-articles="$leading_articles" :latest-articles="$latest_articles" />


    
    <x-container>

        <x-layout-main-area>
            <x-layout-heading heading="Today's features" />
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


            <x-layout-articles-grid :articles="$grid_articles" />
            <x-layout-articles-slide-table :articles="$slide_table_articles" />
            <x-layout-articles-list :articles="$list_articles" />
        </x-layout-main-area>

        <x-layout-sidebar>
            <x-module-socials />
            <x-module-articles-tabbed-list :articles="$tabbed_articles" />
            <x-module-features :articles="$random_articles" />
            <x-module-subscribe />
            <x-module-comments :comments="$comments" />
        </x-layout-sidebar>

    </x-container>
</x-layout>