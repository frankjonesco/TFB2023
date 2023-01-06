<x-layout>
    <x-layout-articles-news-full-w-slide :articles="$latest_articles" />
    <x-container>
        <x-layout-main-area>
            <x-layout-articles-search-form />
            <x-layout-articles-list :articles="$articles" />
        </x-layout-main-area>
        <x-layout-sidebar>
                <x-module-articles-category-menu :categories="$categories" />
                <x-module-socials />
        </x-layout-sidebar>
    </x-container>
</x-layout>