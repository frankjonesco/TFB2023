<x-dashboard-layout>

    <div class="flex flex-row items-center">
        <h1 class="grow">Category: {{$category->name}}</h1>
        <x-edit-category-buttons :category="$category" />
    </div>

    <p class="mb-3">This is the category details page.</p>

    <x-alerts/>

</x-dashboard-layout>
