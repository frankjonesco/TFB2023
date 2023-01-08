@if(isset($heading))
    <x-layout-heading heading="{{$heading}}" class="heading-mt" />
@endif

<div class="grid grid-cols-2 gap-4 border-b border-gray-100 mb-3">
    <div>
        @foreach($articles['first'] as $article)
            @if($loop->first)
                <x-card-articles-photo-fill :article="$article" />
            @else
                <div class="mt-4">
                    @if($loop->last)
                        <x-card-articles-list-item-sm :article="$article" thumbnail-size="xs" class="!border-0" />
                    @else
                        <x-card-articles-list-item-sm :article="$article" thumbnail-size="xs" />
                    @endif
                </div>
            @endif
        @endforeach
    </div>

    <div>
        @foreach($articles['second'] as $article)
            @if($loop->first)
            <x-card-articles-photo-fill :article="$article" />
            @else
                <div class="mt-4">
                    @if($loop->last)
                        <x-card-articles-list-item-sm :article="$article" thumbnail-size="xs" class="!border-0" />
                    @else
                        <x-card-articles-list-item-sm :article="$article" thumbnail-size="xs" />
                    @endif
                </div>
            @endif
        @endforeach
    </div>
        
</div>
<script>
    function gridMouseOver(id) {
        document.getElementById('title_' + id).classList.remove('bg-zinc-900', 'bg-opacity-70');
        document.getElementById('title_' + id).classList.add('bg-red-500', 'bg-opacity-90');
    } 
    function gridMouseOut(id) {
        document.getElementById('title_' + id).classList.remove('bg-red-500', 'bg-opacity-90');
        document.getElementById('title_' + id).classList.add('bg-zinc-900', 'bg-opacity-70');
    } 
</script>