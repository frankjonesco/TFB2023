<x-layout>
    <x-container>
        <x-layout-main-area>
            <x-layout-heading heading="News about {{$category->name}}" />

                <x-layout-articles-search-form />
            
                @foreach($articles as $article)
                    <x-card-articles-list-item-lg :article="$article" />
                @endforeach            

        </x-layout-main-area>
        <x-layout-sidebar>
            <x-module-articles-category-menu :categories="$categories" :current-category="$current_category" />
            <x-module-socials />
            <x-module-articles-features />
            <x-module-subscribe />
        </x-layout-sidebar>
    </x-container>
</x-layout>