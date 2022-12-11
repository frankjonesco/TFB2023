<x-layout>
    <x-container>
        

        
        <div class="grid grid-cols-2 gap-3 my-3">

            <div class="w-full">
                @php
                    $article = $leading_articles[0];
                @endphp
                <div style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.65)),
                url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}'); height:32rem;" class="flex flex-col justify-end bg-lime-500 bg-no-repeat bg-cover px-6 py-8">
                    <span class="bg-pink-500 w-max px-2 py-1 rounded-lg text-sm font-bold">
                        Top Stories
                    </span>
                    <h2 class="py-3">
                        {{$article->title}}
                    </h2>
                    <span class="text-sm">
                        <span class="mr-8">
                            <i class="fa-regular fa-clock"></i>
                            {{showDate($article->created_at)}}
                        </span>
                        <span class="mr-8">
                            <i class="fa-regular fa-user"></i>
                            by {{$article->user->full_name}}
                        </span>
                        <span class="mr-8">
                            <i class="fa-regular fa-comments"></i>
                            {{count($article->comments)}} comments
                        </span>
                        <span>
                            <i class="fa-regular fa-eye"></i>
                            {{$article->views}}
                        </span>
                    </span>
                </div>
            </div>

            <div class="w-full">
                
                <div class="grid grid-cols-2 gap-3 h-full">
                    @foreach($latest_articles as $article)
                        <div class="bg-pink-500 bg-no-repeat flex flex-col" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.45)), url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');">
                            <span>
                                {{$article->title}}
                            </span>
                            <span>
                                {{$article->created_at}}
                            </span>
                        </div>
                    @endforeach
                    
                </div>

            </div>

        </div>

    </x-container>
</x-layout>