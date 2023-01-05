<x-layout-heading heading="Latest articles" class="heading-mt" />

<div class="flex flex-col border-b border-gray-100 mb-3">
    @foreach($articles as $article)
        <x-card-articles-list-item-lg :article="$article" />
    @endforeach
</div>

<x-pagination-public table="articles" :results="$articles" />