<x-layout>
    <x-layout-articles-news-grid :leading-articles="$leading_articles" :latest-articles="$latest_articles" />
    <x-container>

        <x-layout-main-area>
            <x-layout-page-heading heading="Nachrichten für und von Familienunternehmen" />
            <x-layout-articles-search-form />
            <x-layout-heading heading="Today's features" />
            <div class="flex border-b border-gray-100 mb-3">
                <div class="w-1/2 mr-4">
                    @foreach($highlighted_feature_articles as $article)
                        @if($loop->last)
                            <div class="mb-0">
                        @else
                            <div class="mb-7">
                        @endif
                            <x-card-articles-photo-fill :article="$article" class="border-b border-t" />
                        </div>
                    @endforeach
                </div>
                <div class="w-1/2">
                    @foreach($featured_articles as $key => $article)
                        @if($loop->first)
                            <x-card-articles-list-item-sm :article="$article" class="p-3 mb-0 pt-0 !border-0" />
                        @elseif($key === 1)
                            <x-card-articles-list-item-sm :article="$article" class="bg-orange-50 rounded border border-gray-200 p-3 mb-0 !font-bold" />
                        @elseif($loop->last)
                            <x-card-articles-list-item-sm :article="$article" class="!border-0 p-3 mb-0" />
                        @else
                            <x-card-articles-list-item-sm :article="$article" class="p-3 px-0 mb-0 mx-3" />
                        @endif
                    @endforeach
                    {{-- <button class="w-full mt-2">View all articles</button> --}}
                </div>
            </div>
            <div class="w-full text-center mt-4">
                <a href="{{url('news')}}">
                    <button class="btn btn-plain">
                        <i class="fa-solid fa-refresh mr-1.5"></i>
                        View more features
                    </button>
                </a>
            </div>
            <hr>
            <h2 class="font-black text-5xl mb-4 pt-4 text-gray-800">Das <span class="text-red-500">TOFAM-Ranking</span> listet alle Familienunternehmen mit mehr als 250 Millionen Euro Jahresumsatz.</h2>
            @include('includes._rankings-search-form')
            @include('includes._rankings-table')
            {{-- <x-layout-articles-grid heading="Articles grid" :articles="$grid_articles" /> --}}
            <x-layout-articles-slide-table :articles="$slide_table_articles" heading="Slide tables" />
            <x-layout-heading heading="Latest articles" class="heading-mt" />
            <x-layout-articles-search-form />
            <x-layout-articles-list :articles="$list_articles" />
        </x-layout-main-area>

        <x-layout-sidebar>
            <x-module-ranking-table :companies="$companies" />
            <x-module-socials />
            <x-module-articles-tabbed-list />
            <x-module-articles-features />
            <x-module-subscribe />
            <x-module-comments :comments="$comments" />
        </x-layout-sidebar>

    </x-container>
</x-layout>