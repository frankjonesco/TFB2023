<div class="grid grid-cols-1 gap-6 border-b border-gray-100">
    @foreach($articles as $article)
        @if(isset($term))
            <x-card-articles-list-item-lg :article="$article" :term="$term" class="mb-0" />
        @else
            <x-card-articles-list-item-lg :article="$article" class="mb-0" />
        @endif
    @endforeach
</div>
<x-pagination-public table="articles" :results="$articles" />