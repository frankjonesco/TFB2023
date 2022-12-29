<div>
    <div class="flex tabs mt-6">
        <div class="w-1/2 border-b-2 border-red-500">
            <a
                href="#"
                id="btnAuthorCard"
                class="author-btn !bg-red-500 hover:!bg-red-500"
            >
                About the author
            </a>
        </div>
        <div class="w-1/2 border-b-2 border-red-500">
            <a 
                href="#" 
                id="btnAuthorArticles"
                class="author-btn !bg-gray-900 hover:!bg-red-500"
            >
                More from the author
            </a>
        </div>
    </div>
    <div id="authorCard">
        <div class="flex items-center bg-gray-50 p-7 border-b border-gray-200">
            <x-user-profile-pic :user="$article->user" />
            <div class="flex flex-col">
                <span class="font-bold text-lg">{{$article->user->full_name}}</span>
                <span class="font-light text-sm">{{$article->user->user_type->name}} @ Top Family Business</span>
                <span class="font-light text-sm">Since {{showDate($article->user->created_at)}}</span>
                <span class="font-light text-sm">
                    <a href="#" class="underline underline-offset-2 hover:no-underline">
                        {{count($article->user->articles)}} articles
                    </a>
                </span>
            </div>
        </div>
    </div>
    <div id="authorArticles" class="hidden">
        <div class="flex items-center bg-gray-50 p-2 py-4 border-b border-gray-200">
            @if(empty($authorArticles))
                <p class="no-results">No articles to display.</p>
            @else
                @foreach($authorArticles as $author_article)
                    <div class="bg-no-repeat bg-center bg-cover px-4 py-5 w-1/4 m-1 h-40 flex flex-col justify-end overflow-hidden" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.85)), url('{{asset('images/articles/'.$author_article->hex.'/'.$author_article->image)}}');">
                            
                            <h3 class="pt-1.5 pb-1 text-sm">
                                <a href="/dashboard/articles/{{$author_article->hex}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80">
                                    {{$author_article->title}}
                                </a>
                            </h3>
                            <span class="text-xs italic text-zinc-100">
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
            @endif
        </div>
    </div>
</div>

<script>
    const authorCard = document.getElementById('authorCard');
    const authorArticles = document.getElementById('authorArticles');
    const btnAuthorCard = document.getElementById('btnAuthorCard');
    const btnAuthorArticles = document.getElementById('btnAuthorArticles');
    document.getElementById("btnAuthorCard").addEventListener("click", function(event){
        event.preventDefault();
        authorCard.classList.remove('hidden');
        authorArticles.classList.add('hidden');
        btnAuthorCard.classList.add('!bg-red-500');
        btnAuthorCard.classList.remove('!bg-gray-900');
        btnAuthorArticles.classList.add('!bg-gray-900');
        btnAuthorArticles.classList.remove('!bg-red-500');
    });
    document.getElementById("btnAuthorArticles").addEventListener("click", function(event){
        event.preventDefault();
        authorCard.classList.add('hidden');
        authorArticles.classList.remove('hidden');
        btnAuthorCard.classList.remove('!bg-red-500');
        btnAuthorCard.classList.add('!bg-gray-900');
        btnAuthorArticles.classList.remove('!bg-gray-900');
        btnAuthorArticles.classList.add('!bg-red-500');
    });
</script>