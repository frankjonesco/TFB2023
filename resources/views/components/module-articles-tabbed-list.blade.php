<div class="sidebar-module">
    <div class="w-full">
        <ul class="flex w-full text-xs font-medium border-b-2 border-red-500" style="font-size:.75rem;" id="myTab">
            <li class="w-1/3 p-3 bg-red-500 text-white font-bold text-center uppercase" id="tabPopular">
                <a href="#" id="tabbedArticlesPopular" class="text-white" data-toggle="tab">Popular</a>
            </li>
            <li class="w-1/3 p-3 mx-0.5 bg-zinc-900 font-bold text-center uppercase" style="margin: 0 1px;">
                <a href="#" id="tabbedArticlesRecent" class="text-white" data-toggle="tab" id="tabRecent">Recent</a>
            </li>
            <li class="w-1/3 p-3 bg-zinc-900 font-bold text-center uppercase">
                <a href="#"  id="tabbedArticlesTop" class="!text-white" data-toggle="tab" id="tabTop">Top Reviews</a>
            </li>
        </ul>
        <div class="tab-content text-gray-600">

            <div class="tab-pane active" id="popularArticles">
                <ul class="list-posts">
                    @foreach(tabbedArticles()['popular'] as $article)
                        <li class="p-4 px-6 flex items-center border-b bg-slate-50">
                            <a href="/news/articles/{{$article->hex}}/{{$article->slug}}">
                                <div class="bg-no-repeat bg-cover bg-center w-20 h-16 mr-6 border hover:border-gray-400" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.50)), url('{{asset($article->getImageThumbnail())}}');"></div>
                            </a>
                            
                            <div class="post-content overflow-hidden">
                                <div class="text-sm p-0 mb-2">
                                    <h4 class="text-gray-500 text-xs font-bold">
                                        <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-slate-900 hover:!text-red-500">
                                            {{$article->title}}
                                        </a>
                                    </h4>
                                </div>
                                <ul class="post-tags">
                                    <li class="text-xs italic text-gray-400"><i class="fa-regular fa-clock mr-1"></i>{{showDate($article->created_at)}}</li>
                                </ul>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="tab-pane hidden" id="recentArticles">
                <ul class="list-posts">
                    @foreach(tabbedArticles()['recent'] as $article)
                    <li class="p-4 px-6 flex items-center border-b bg-slate-50">
                        <a href="/news/articles/{{$article->hex}}/{{$article->slug}}">
                            <div class="bg-no-repeat bg-cover bg-center w-20 h-16 mr-6 border hover:border-gray-400" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.50)), url('{{asset($article->getImageThumbnail())}}');"></div>
                        </a>
                            
                        <div class="post-content overflow-hidden">
                            <div class="text-sm p-0 mb-2">
                                <h4 class="text-gray-500 text-xs font-bold">
                                    <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-slate-900 hover:!text-red-500">
                                        {{$article->title}}
                                    </a>
                                </h4>
                            </div>
                            <ul class="post-tags">
                                <li class="text-xs italic text-gray-400"><i class="fa-regular fa-clock mr-1"></i>{{showDate($article->created_at)}}</li>
                            </ul>
                        </div>
                    </li>
                    @endforeach                
                </ul>										
            </div>

            <div class="tab-pane hidden" id="topArticles">
                <ul class="list-posts">
                    @foreach(tabbedArticles()['top'] as $article)
                        <li class="p-4 px-6 flex items-center border-b bg-slate-50">
                            <a href="/news/articles/{{$article->hex}}/{{$article->slug}}">
                                <div class="bg-no-repeat bg-cover bg-center w-20 h-16 mr-6 border hover:border-gray-400" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.50)), url('{{asset($article->getImageThumbnail())}}');"></div>
                            </a>
                                
                            <div class="post-content overflow-hidden">
                                <div class="text-sm p-0 mb-2">
                                    <h4 class="text-gray-500 text-xs font-bold">
                                        <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-slate-900 hover:!text-red-500">
                                            {{$article->title}}
                                        </a>
                                    </h4>
                                </div>
                                <ul class="post-tags">
                                    <li class="text-xs italic text-gray-400"><i class="fa-regular fa-clock mr-1"></i>{{showDate($article->created_at)}}</li>
                                </ul>
                            </div>
                        </li>
                    @endforeach                
                </ul>										
            </div>

        </div>

        <a href="/news/articles">
            <button class="mt-4 w-full btn btn-plain">
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
</div>