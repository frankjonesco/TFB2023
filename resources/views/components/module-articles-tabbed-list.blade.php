<div class="mt-12 w-full">
    <ul class="flex w-full text-xs font-medium border-b-2 border-red-500" style="font-size:.75rem;" id="myTab">
        <li class="w-1/3 p-3 bg-red-500 text-white font-bold text-center uppercase" id="tabPopular">
            <a href="#" id="tabbedArticlesPopular" class="text-white" data-toggle="tab">Popular</a>
        </li>
        <li class="w-1/3 p-3 border-l border-r border-zinc-400 bg-zinc-900 text-center uppercase">
            <a href="#" id="tabbedArticlesRecent" class="text-white" data-toggle="tab" id="tabRecent">Recent</a>
        </li>
        <li class="w-1/3 p-3 bg-zinc-900 text-center uppercase">
            <a href="#"  id="tabbedArticlesTop" class="text-white" data-toggle="tab" id="tabTop">Top Reviews</a>
        </li>
    </ul>
    <div class="tab-content">

        <div class="tab-pane active" id="popularArticles">
            <ul class="list-posts">
                @foreach($articles['popular'] as $article)
                    <li class="p-4 px-6 flex items-center border-b bg-slate-50">
                        <div class="bg-no-repeat bg-cover bg-center w-32 h-20 mr-6" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.50)), url('{{asset($article->getImageThumbnail())}}');">
                            
                        </div>
                        
                        <div class="post-content w-3/4 overflow-hidden">
                            <div class="text-sm p-0 mb-2">
                                <a href="/news/articles/{{$article->hex}}/{{$article->slug}}">
                                    {{$article->title}}
                                </a>
                            </div>
                            <ul class="post-tags">
                                <li class="text-xs italic"><i class="fa-regular fa-clock mr-1"></i>{{showDate($article->created_at)}}</li>
                            </ul>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="tab-pane hidden" id="recentArticles">
            <ul class="list-posts">
                @foreach($articles['recent'] as $article)
                    <li class="p-4 px-6 flex items-center border-b bg-gray-900">
                        <div class="bg-no-repeat bg-cover bg-center w-32 h-20 mr-6" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.50)), url('{{asset($article->getImageThumbnail())}}');">
                            
                        </div>
                        
                        <div class="post-content w-3/4 overflow-hidden">
                            <div class="text-sm p-0 mb-2">
                                <a href="/news/articles/{{$article->hex}}/{{$article->slug}}">
                                    {{$article->title}}
                                </a>
                            </div>
                            <ul class="post-tags">
                                <li class="text-xs italic"><i class="fa-regular fa-clock mr-1"></i>{{showDate($article->created_at)}}</li>
                            </ul>
                        </div>
                    </li>
                @endforeach                
            </ul>										
        </div>

        <div class="tab-pane hidden" id="topArticles">
            <ul class="list-posts">
                @foreach($articles['top'] as $article)
                    <li class="p-4 px-6 flex items-center border-b bg-gray-900">
                        <div class="bg-no-repeat bg-cover bg-center w-32 h-20 mr-6" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.50)), url('{{asset($article->getImageThumbnail())}}');">
                            
                        </div>
                        
                        <div class="post-content w-3/4 overflow-hidden">
                            <div class="text-sm p-0 mb-2">
                                <a href="/news/articles/{{$article->hex}}/{{$article->slug}}">
                                    {{$article->title}}
                                </a>
                            </div>
                            <ul class="post-tags">
                                <li class="text-xs italic"><i class="fa-regular fa-clock mr-1"></i>{{showDate($article->created_at)}}</li>
                            </ul>
                        </div>
                    </li>
                @endforeach                
            </ul>										
        </div>

    </div>

    <a href="/news">
        <button class="mt-4 w-full">
            <i class="fa-solid fa-newspaper mr-1"></i>
            View more articles
        </button>
    </a>
</div>

<script>
    const tabbedArticlesPopular = document.getElementById('tabbedArticlesPopular');
    tabbedArticlesPopular.addEventListener('click', function(e){
        e.preventDefault();
        document.getElementById('popularArticles').classList.remove('hidden');
        document.getElementById('recentArticles').classList.remove('hidden');
        document.getElementById('topArticles').classList.remove('hidden');
        document.getElementById('recentArticles').classList.add('hidden');
        document.getElementById('topArticles').classList.add('hidden');

        document.getElementById('tabPopular').classList.toggle('bg-red-700');
        document.getElementById('tabRecent').classList.toggle('bg-red-700');
        document.getElementById('tabTop').classList.toggle('bg-red-700');
        return false;
    });

    const tabbedArticlesRecent = document.getElementById('tabbedArticlesRecent');
    tabbedArticlesRecent.addEventListener('click', function(e){
        e.preventDefault();
        document.getElementById('popularArticles').classList.remove('hidden');
        document.getElementById('recentArticles').classList.remove('hidden');
        document.getElementById('topArticles').classList.remove('hidden');
        document.getElementById('popularArticles').classList.add('hidden');
        document.getElementById('topArticles').classList.add('hidden');

        document.getElementById('tabPopular').classList.toggle('bg-red-700');
        document.getElementById('tabRecent').classList.toggle('bg-red-700');
        document.getElementById('tabTop').classList.toggle('bg-red-700');
        return false;
    });

    const tabbedArticlesTop = document.getElementById('tabbedArticlesTop');
    tabbedArticlesTop.addEventListener('click', function(e){
        e.preventDefault();
        document.getElementById('popularArticles').classList.remove('hidden');
        document.getElementById('recentArticles').classList.remove('hidden');
        document.getElementById('topArticles').classList.remove('hidden');
        document.getElementById('popularArticles').classList.add('hidden');
        document.getElementById('recentArticles').classList.add('hidden');

        document.getElementById('tabPopular').classList.toggle('bg-red-700');
        document.getElementById('tabRecent').classList.toggle('bg-red-700');
        document.getElementById('tabTop').classList.toggle('bg-red-700');
        return false;
    });
</script>