<x-layout>
    <x-container>
        <x-layout-main-area>
            <h2 class="pt-1 pb-2 !text-3xl">
                {{$article->title}}
            </h2>
            <b class="block mb-2">{{$article->caption}}</b>
            <span class="text-sm italic" style="font-size:0.82rem;">
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
                    {{count($article->publicComments)}} comments
                </span>
                <span>
                    <i class="fa-regular fa-eye mr-1"></i>
                    {{$article->views}}
                </span>
            </span>

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
            {!!$article->body!!}
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
            <x-module-socials />
            <x-module-articles-features />
            <x-module-articles-tabbed-list />
            <x-module-subscribe />
        </x-layout-sidebar>
    </x-container>
</x-layout>