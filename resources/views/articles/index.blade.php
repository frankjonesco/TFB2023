<x-layout>
    {{-- @if($show_news_header)
        <x-layout-articles-news-full-w-slide :articles="$latest_articles" />
    @endif --}}
    
    <x-container>
        <x-layout-main-area>
            <x-layout-page-heading heading="Nachrichten für und von Familienunternehmen" />
            <x-layout-articles-search-form />
            <x-layout-heading heading="Latest articles" />
            <x-layout-articles-list :articles="$articles" />
        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-articles-category-menu :categories="$categories" />
            <x-module-articles-tabbed-list />
                <x-module-socials />
                <x-module-subscribe />
                <x-module-matchbird-partners />
        </x-layout-sidebar>
    </x-container>
</x-layout>