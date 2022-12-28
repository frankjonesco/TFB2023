<x-layout>
    <x-container>
        <x-layout-main-area>
            <span class="bg-indigo-500 w-max px-2 py-1 rounded-lg text-sm font-bold">
                Top Stories
            </span>
            <h2>
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
                    {{count($article->comments)}} comments
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
            <x-layout-articles-about-author :article="$article" :authorArticles="$author_articles" />
            <x-layout-articles-comments :article="$article" />
        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-ranking-table :companies="$companies" />
            <x-module-socials />
        </x-layout-sidebar>
    </x-container>
</x-layout>