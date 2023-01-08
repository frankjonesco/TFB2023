<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-page-heading heading="TOFAM Companies" />
            @include('includes._rankings-search-form')
            @include('includes._rankings-table')
            <x-layout-articles-grid :articles="$articles" heading="Latest articles" />
            <x-layout-articles-slide-table :articles="$slide_table_articles" />
        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-sectors-menu />
            <x-module-articles-features />
            <x-module-socials />
            <x-module-matchbird-partners />
            <x-module-subscribe />
        </x-layout-sidebar>
    </x-container>
</x-layout>