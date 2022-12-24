<x-layout>
    <x-container-full-w>
        <div class="bg-repeat" style="background-image:url('{{asset('images/bg.png')}}');">sdsd
            <div class="flex w-3/4 mx-auto px-12 bg-white text-gray-500">
                <div class="mt-6 pl-3 pr-12 w-2/3 border-r border-gray-100">
                    <span class="bg-indigo-500 w-max px-2 py-1 rounded-lg text-sm font-bold">
                        Top Stories
                    </span>
                    <h2>
                        {{$article->title}}
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
                    <img src="{{asset('images/articles/'.$article['hex'].'/'.$article['image'])}}" alt="" class="w-full mt-6">
                    <span>
                        {{$article->image_caption}}
                    </span>
                    {!!$article->body!!}
                    

                    <x-layout-articles-comments />
                </div>
                <div class="mt-3 pl-4 w-1/3">
                    <x-module-socials />
                </div>
            </div>
        </div>
    </x-container-full-w>
</x-layout>