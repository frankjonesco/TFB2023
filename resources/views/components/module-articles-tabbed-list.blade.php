<div class="sidebar-module tabbed-articles">
    <div class="w-full">
        <div class="flex mt-6">
            <div class="w-1/3">
                <a
                    href="#"
                    id="tabbedArticlesPopular"
                    class="switch-tab focus"
                >
                    Popular
                </a>
            </div>
            <div class="w-1/3">
                <a 
                    href="#" 
                    id="tabbedArticlesRecent"
                    class="switch-tab"
                >
                    Recent
                </a>
            </div>
            <div class="w-1/3">
                <a 
                    href="#" 
                    id="tabbedArticlesTop"
                    class="switch-tab"
                >
                    Top reviews
                </a>
            </div>
        </div>

        
        <div class="tab-content text-gray-600">

            <div class="tab-pane" id="popularArticles">
                <ul class="list-posts">
                    @foreach(tabbedArticles()['popular'] as $article)
                        <li class="p-4 px-6 flex items-center border-b bg-slate-50">
                            <a href="/news/articles/{{$article->hex}}/{{$article->slug}}">
                                <div class="bg-no-repeat bg-cover bg-center w-20 h-16 mr-6 border hover:border-gray-400" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.50)), url('{{asset($article->getImageThumbnail())}}');"></div>
                            </a>
                            
                            <div class="post-content overflow-hidden">
                                <div class="text-sm p-0 mb-2">
                                    <h4 class="text-gray-500 text-xs font-bold">
                                        <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="text-slate-900 hover:!text-red-500 no-underline">
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

        <a href="/news">
            <button class="mt-4 w-full btn-plain">
                <i class="fa-solid fa-newspaper mr-1"></i>
                View more articles
            </button>
        </a>
    </div>

    <script>

        


        // SCRIPT FOR SWITCH TABS
        
        // Query selector of cradle element
        let cradle = '.tabbed-articles';
        
        // Tabs within cradle
        let switchTabs = document.querySelectorAll(cradle + ' a.switch-tab');
        
        // For each tab...
        for (let i = 0; i < switchTabs.length; i++) {

            // Listen for click
            switchTabs[i].addEventListener('click', function(e){
                e.preventDefault();

                // Blur all switch tabs
                switchTabs[i].classList.add('focus');
                
                // Tab panes
                let tabPanes = document.querySelectorAll(cradle + ' .tab-content>div');
                
                // For each tab pane
                for (var x = 0; x < tabPanes.length; x++) {
                    // Hide tab pane
                    tabPanes[x].classList.add('hidden');
                }
                // Show the pane for this switch tab
                tabPanes[i].classList.remove('hidden');
                
                // Refocus tabs
                refocusTabs(i);
            });

        }

        function refocusTabs(tab){
            // For each switch tab...
            for (let i = 0; i < switchTabs.length; i++) {
                // Blur all switch tabs
                switchTabs[i].classList.remove('focus');
            }
            // Focus this tab
            switchTabs[tab].classList.add('focus');
        }



    </script>
</div>