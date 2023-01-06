<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-articles-search-form :articles="$articles" :term="$term" />
            <x-layout-articles-list :articles="$articles" />
        </x-layout-main-area>
        <x-layout-sidebar>
                <x-module-articles-category-menu :categories="$categories" />
                <x-module-socials />
        </x-layout-sidebar>
    </x-container>
</x-layout>