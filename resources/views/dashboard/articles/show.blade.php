<x-dashboard-layout>

    <div class="flex w-full">

        <div class="w-3/4 pr-10">
            
            <x-edit-article-buttons :article="$article" />
            <h2 class="grow">{{$article->title}}</h2>

            <x-alerts/>
            
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

            <div class="bg-no-repeat bg-center bg-cover px-7 py-8 mt-6 border border-zinc-500 flex flex-col justify-end h-[32rem]" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.85)),
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

            <div class="article-body">
                {!!$article->body!!}
            </div>

            <div class="article-tags text-sm">
                <i class="fa-solid fa-tags mr-2"></i>
                Tags: 
                <ul>
                    @foreach($article->splitTags() as $tag)
                        <li>
                            <a href="">
                                {{$tag}}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            

        </div>

        <div class="w-1/4">
            
            <x-module-article-details :details="$article->details" />

        </div>

    </div>
        

</x-dashboard-layout>
