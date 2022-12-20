<x-dashboard-layout>
    <div class="w-full">
        <x-edit-category-buttons :category="$category" />
        <h2 class="grow">Category: {!!$category->name!!}</h2>
        <x-alerts heading="List of articles in the '{!!$category->name!!}' category." />
        <x-table-articles :articles="$category->articles" />
    </div>
</x-dashboard-layout>