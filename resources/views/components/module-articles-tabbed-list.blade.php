<div class="sidebar-module tabbed-articles">
    <div class="w-full">

        <div class="flex mt-6">
            <div class="w-1/3">
                <a
                    href="#"
                    class="switch-tab focus"
                >
                    Popular
                </a>
            </div>
            <div class="w-1/3">
                <a 
                    href="#" 
                    class="switch-tab"
                >
                    Recent
                </a>
            </div>
            <div class="w-1/3">
                <a 
                    href="#" 
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
                        <x-card-articles-list-item-sm :article="$article" thumbnail-size="xs" class="p-5 mb-0" />
                    @endforeach
                </ul>
            </div>

            <div class="tab-pane hidden" id="recentArticles">
                <ul class="list-posts">
                    @foreach(tabbedArticles()['recent'] as $article)
                        <x-card-articles-list-item-sm :article="$article" thumbnail-size="xs" class="p-5 mb-0" />
                    @endforeach                
                </ul>										
            </div>

            <div class="tab-pane hidden" id="topArticles">
                <ul class="list-posts">
                    @foreach(tabbedArticles()['top'] as $article)
                        <x-card-articles-list-item-sm :article="$article" thumbnail-size="xs" class="p-5 mb-0" />
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
        let cradleTabbedArticles = '.tabbed-articles';
        
        // Tabs within cradle
        let switchTabsTabbedArticles = document.querySelectorAll(cradleTabbedArticles + ' a.switch-tab');
        
        // For each tab...
        for (let i = 0; i < switchTabsTabbedArticles.length; i++) {

            // Listen for click
            switchTabsTabbedArticles[i].addEventListener('click', function(e){
                e.preventDefault();

                // Blur all switch tabs
                switchTabsTabbedArticles[i].classList.add('focus');
                
                // Tab panes
                let tabPanesTabbedArticles = document.querySelectorAll(cradleTabbedArticles + ' .tab-content>div');
                
                // For each tab pane
                for (var x = 0; x < tabPanesTabbedArticles.length; x++) {
                    // Hide tab pane
                    tabPanesTabbedArticles[x].classList.add('hidden');
                }
                // Show the pane for this switch tab
                tabPanesTabbedArticles[i].classList.remove('hidden');
                
                // Refocus tabs
                refocusTabsTabbedArticles(i);
            });
        }

        function refocusTabsTabbedArticles(tab){
            // For each switch tab...
            for (let i = 0; i < switchTabsTabbedArticles.length; i++) {
                // Blur all switch tabs
                switchTabsTabbedArticles[i].classList.remove('focus');
            }
            // Focus this tab
            switchTabsTabbedArticles[tab].classList.add('focus');
        }

    </script>
</div>