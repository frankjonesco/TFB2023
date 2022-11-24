<x-dashboard-layout>

    <div class="flex flex-row items-center">
        <h1 class="grow">Article: {{$article->title}}</h1>
        <x-edit-article-buttons :article="$article" />
    </div>

    <p class="mb-3">This is the article details page.</p>

    <x-alerts/>

</x-dashboard-layout>
