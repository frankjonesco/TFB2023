<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="TOFAM Partners" />

            <div class="flex w-full gap-2 mb-6 items-center">
                @foreach($partners as $partner)
                    <a href="/news/articles/{{$partner->article->hex}}/{{$partner->article->slug}}" class="w-1/4 p-7 text-center bg-slate-500 border-b-8 border-b-orange-300 border-t-8 border-t-orange-300 hover:bg-slate-600">
                        <img src="{{asset('images/partners/'.$partner->hex.'/'.$partner->logo)}}" alt="" class="max-h-8 mx-auto">
                    </a>
                @endforeach
            </div>

            <div class="flex flex-col border-b border-gray-100 mb-3">
                @foreach($partners as $partner)
                   @php
                       $article = $partner->article;
                   @endphp
                    <div class="flex items-center border-b border-gray-200 mb-5 pb-5 text-gray-500">
            
                        <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="!text-gray-200 hover:!text-gray-200">
                            <div id="{{$article->hex}}" onmouseover="gridMouseOver(this.id)" onmouseout="gridMouseOut(this.id)" class="w-72 h-56 mr-6 bg-no-repeat bg-cover bg-center flex flex-col justify-end overflow-hidden" style="background-image: url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');"></div>
                        </a>
                        <div>
                            <h3 class="pt-0 pb-2">
                                <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="plain">{{$article->title}}</a>
                            </h3>
                            <span class="text-xs italic">
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

                

                            <p class="mt-2.5 text-sm">{{truncate(strip_tags($article->body), 160)}}</p>

                            <div class="flex items-center mt-3.5 justify-end">

                                {{-- Show associated companies --}}
                                <div class="text-xs grow">
                                    <p class="font-bold">Tofam Partner:</p>
                                    <p>
                                        <div class="flex items-center">
                                            <a href="/news/articles/{{$partner->article->hex}}/{{$partner->article->slug}}">
                                                <img src="{{asset('images/partners/'.$partner->hex.'/'.$partner->logo)}}" alt="{{$partner->article->show_name}}" title="{{$partner->article->show_name}}" class="w-5 mr-1.5">
                                            </a>
                                            <a href="/news/articles/{{$partner->article->hex}}/{{$partner->article->slug}}" class="plain">
                                                {{$partner->name}}
                                            </a>
                                        </div>
                                    </p>
                                </div>

                                <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-slate-700 hover:!text-red-500">
                                    <button class="btn btn-plain"><i class="fa-solid fa-arrow-right mr-1.5"></i>Read more</button>
                                </a>
                            </div>

                
                
                

                        </div>
                    </div>
                @endforeach
            </div>
            
        </x-layout-main-area>
        <x-layout-sidebar>
                <x-module-socials />
                <x-module-subscribe />
                <x-module-articles-tabbed-list />
        </x-layout-sidebar>
    </x-container>
</x-layout>