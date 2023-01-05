<x-layout>
    <x-layout-articles-news-full-w-slide :articles="$latest_articles" />
    <x-container>
        <x-layout-main-area>
            <form action="/news/search" method="POST">
                <div class="form-block flex">
                    <input type="text" name="term" value="{{old('term')}}" placeholder="Search articles" class="!bg-gray-50 !rounded !border !border-gray-300 focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0 !placeholder-gray-400 mr-2">
                    <button class="btn-plain px-4">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
            <x-layout-articles-list :articles="$articles" />
        </x-layout-main-area>
        <x-layout-sidebar>
                <x-module-socials />
        </x-layout-sidebar>
    </x-container>
</x-layout>