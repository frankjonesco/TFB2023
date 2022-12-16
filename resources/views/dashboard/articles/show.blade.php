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

            @if($article->tags)
                <div class="article-tags text-sm">
                    <i class="fa-solid fa-tags mr-2"></i>
                    Tags: 
                    <ul>
                        @foreach($article->splitTags() as $tag)
                            <li>
                                <a href="/tags/{{strtolower($tag)}}">
                                    {{$tag}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="article-author">
                <div class="flex">
                    <div class="w-1/2">
                        <a
                            href="#"
                            id="btnAuthorCard"
                            class="author-btn hover:!text-zinc-100"
                        >
                            About the author
                        </a>
                    </div>
                    <div class="w-1/2">
                        <a 
                            href="#" 
                            id="btnAuthorArticles"
                            class="author-btn !bg-zinc-100 text-zinc-700 hover:!text-zinc-800 hover:!bg-zinc-200"
                        >
                            More from the author
                        </a>
                    </div>
                </div>
                
                <div id="authorCard">
                    <div class="flex items-center bg-slate-700 p-7">
                        <x-user-profile-pic :user="$article->user" />
                        <div class="flex flex-col">
                            <span class="font-bold text-lg">{{$article->user->full_name}}</span>
                            <span class="font-light text-sm">{{$article->user->user_type}} @ Top Family Business</span>
                            <span class="font-light text-sm">Since {{showDate($article->user->created_at)}}</span>
                            <span class="font-thin text-sm">
                                <a href="#">
                                    {{count($article->user->articles)}} articles
                                </a>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div id="authorArticles" class="hidden">
                    <div class="flex items-center bg-slate-700 p-2 py-4">
                        @foreach($author_articles as $author_article)
                            <div class="bg-no-repeat bg-center bg-cover px-4 py-5 w-1/4 m-1 h-40 flex flex-col justify-end overflow-hidden" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.85)), url('{{asset('images/articles/'.$author_article->hex.'/'.$author_article->image)}}');">
                                    <span class="bg-rose-500 w-max px-2 py-1 rounded-lg text-xs font-bold">
                                        Top Stories
                                    </span>
                                    <h3 class="pt-1.5 pb-1 text-sm">
                                        <a href="/dashboard/articles/{{$author_article->hex}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80">
                                            {{$author_article->title}}
                                        </a>
                                    </h3>
                                    <span class="text-xs italic">
                                        <span class="mr-3">
                                            <i class="fa-regular fa-clock mr-1"></i>
                                            {{showDate($author_article->created_at)}}
                                        </span>
                                        <span>
                                            <i class="fa-regular fa-eye mr-1"></i>
                                            {{$author_article->views}}
                                        </span>
                                    </span>
                                    
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <script>
                const authorCard = document.getElementById('authorCard');
                const authorArticles = document.getElementById('authorArticles');

                document.getElementById("btnAuthorCard").addEventListener("click", function(event){
                    event.preventDefault();
                    authorCard.classList.remove('hidden');
                    authorArticles.classList.add('hidden');
                });

                document.getElementById("btnAuthorArticles").addEventListener("click", function(event){
                    event.preventDefault();
                    authorCard.classList.add('hidden');
                    authorArticles.classList.remove('hidden');
                });
            </script>
            

        </div>

        <div class="w-1/4">
            
            <x-module-article-details :details="$article->details" />

        </div>

    </div>
        

</x-dashboard-layout>
