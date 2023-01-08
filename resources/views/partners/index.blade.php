<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-page-heading heading="TOFAM Partners" />   
            <x-layout-articles-search-form />
            <x-layout-heading heading="News articles from TOFAM partners" />

            <div class="flex flex-col border-b border-gray-100 mb-3">
                @foreach($partners as $partner)
                    @php
                       $article = $partner->article;
                    @endphp
                    <x-card-articles-list-item-lg :article="$article" />
                @endforeach
                <x-pagination-public table="partners" :results="$partners" />
            </div>
            
        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-partners />
            <x-module-articles-features />
            <x-module-articles-category-menu />
            <x-module-subscribe />
        </x-layout-sidebar>
    </x-container>
</x-layout>