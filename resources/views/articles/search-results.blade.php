<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-articles-search-form :articles="$articles" :term="$term" />
            <x-layout-heading heading="Search results" />
            <x-layout-articles-list :articles="$articles" :term="$term" />
        </x-layout-main-area>
        <x-layout-sidebar>
                <x-module-articles-category-menu />
                <x-module-socials />
        </x-layout-sidebar>
    </x-container>
</x-layout>