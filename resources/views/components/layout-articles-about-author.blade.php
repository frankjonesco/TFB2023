<div class="tabbed-author">
    <div class="flex mt-6">
        <div class="w-1/2">
            <a
                href="#"
                class="switch-tab focus"
            >
                About the author
            </a>
        </div>
        <div class="w-1/2">
            <a 
                href="#" 
                class="switch-tab"
            >
                More from the author
            </a>
        </div>
    </div>
    <div class="tab-content">
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
                        <div class="bg-no-repeat bg-center bg-cover px-4 py-5 w-1/4 m-1 h-40 flex flex-col justify-end overflow-hidden" style="background-image:linear-gradient(to bottom, rgba(245, 246, 252, 0.0), rgba(0, 0, 0, 0.85)), url('{{$author_article->getImageThumbnail()}}');">
                                
                                <h3 class="pt-1.5 pb-1 text-sm">
                                    <a href="{{$article->link()}}" class="text-zinc-100 hover:!text-zinc-100 hover:!text-opacity-80 no-underline">
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
</div>

<script>
    
    // SCRIPT FOR SWITCH TABS
        
    // Query selector of cradle element
    const cradle = '.tabbed-author';
        
    // Tabs within cradle
    let switchTabs = document.querySelectorAll(cradle + ' a.switch-tab');
        
    // For each tab...
    for (let i = 0; i < switchTabs.length; i++) {

        // Listen for click
        switchTabs[i].addEventListener('click', function(e){
            e.preventDefault();
            console.log('sd');
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