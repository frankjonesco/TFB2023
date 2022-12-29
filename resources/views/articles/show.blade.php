<x-layout>
    <x-container-h-min>
        <x-layout-articles-breaking />
    </x-container-h-min>
    <x-container>
        <x-layout-main-area>
            <h2 class="pt-1">
                {{$article->title}}
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
                    {{count($article->publicComments)}} comments
                </span>
                <span>
                    <i class="fa-regular fa-eye mr-1"></i>
                    {{$article->views}}
                </span>
            </span>
            <img src="{{asset('images/articles/'.$article['hex'].'/'.$article['image'])}}" alt="" class="w-full mt-6">
            <span>
                {{$article->image_caption}}
            </span>
            {!!$article->body!!}
            <x-layout-articles-tags :article="$article" />
            <x-layout-articles-share :article="$article" />
            <x-layout-articles-split-thumbs :articles="$split_articles" />
            <x-layout-articles-about-author :article="$article" :authorArticles="$author_articles" />
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