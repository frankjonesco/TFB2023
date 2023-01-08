<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-page-heading heading="News: {{$category->name}}" />     
            <x-layout-articles-search-form />
            <x-layout-heading heading="News about {{$category->name}}" />       
            <x-layout-articles-list :articles="$articles" />
        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-articles-category-menu :current-category="$current_category" />
            <x-module-articles-tabbed-list />
            <x-module-socials />
            <x-module-articles-features />
            <x-module-subscribe />
        </x-layout-sidebar>
    </x-container>
</x-layout>