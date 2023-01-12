<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-page-heading heading="{!!$article->title!!}" class="pb-0" />   
            
            <b class="block mb-2">{{$article->caption}}</b>
            <x-article-stats :article="$article" class="text-sm !text-gray-500 py-1.5 pb-2" />
            <div class="bg-no-repeat bg-center bg-cover my-3 mb-6 flex flex-col justify-end h-[423px]" style="background-image: url('{{$article->getImage()}}');">
                @if($article->image_caption || $article->image_copyright)
                    <div class="bg-black px-3 py-2 bg-opacity-40 text-xs text-white flex items-center border-t border-t-white border-opacity-40">
                        <span class="grow">{{$article->image_caption}}</span>
                        @if($article->image_copyright)
                            <span class="grow text-right"><span class="mr-1">&copy;</span>{{$article->image_copyright}}</span>
                        @endif
                    </div>
                @endif
            </div>
            {!!linkifyHtml($article->body)!!}
            <x-layout-articles-tags :article="$article" />
            <x-layout-articles-share :article="$article" />
            <x-layout-articles-split-thumbs :articles="$split_articles" />
            <x-layout-articles-about-author :article="$article" :authorArticles="$author_articles" />
            <x-layout-articles-associated-companies :companies="$article->associated_companies" />
            <x-layout-articles-grid heading="You may also like" :articles="$similar_articles" />
            <x-layout-articles-comments :article="$article" />
        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-ranking-table :companies="$companies" />
            <x-module-articles-tabbed-list />
            <x-module-socials />
            <x-module-articles-features />
            <x-module-subscribe />
        </x-layout-sidebar>
    </x-container>
</x-layout>