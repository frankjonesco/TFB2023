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

<x-layout-heading :heading="$heading" class="heading-mt" />

<div class="grid grid-cols-3 gap-3 border-b border-gray-100 mb-3">
    
    @foreach($articles as $article)
        <a href="/news/articles/{{$article->hex}}/{{$article->slug}}" class="!text-gray-200 hover:!text-gray-200">
            <div id="{{$article->hex}}" onmouseover="gridMouseOver(this.id)" onmouseout="gridMouseOut(this.id)" class="w-full h-44 bg-no-repeat bg-cover bg-center flex flex-col justify-end overflow-hidden" style="background-image: url('{{asset('images/articles/'.$article->hex.'/'.$article->image)}}');">
                <div id="title_{{$article->hex}}" class="w-full h-1/2 px-3 py-2.5 bg-zinc-900 bg-opacity-60 hover:bg-red-500 hover:bg-opacity-90 text-sm overflow-hidden flex flex-col justify-center">
                    <h4 class="mb-1.5 font-bold text-sm leading-normal">
                        {{truncate($article->title)}}
                    </h4>
                    <span class="text-xs italic !text-gray-200 font-light">
                        <i class="fa-regular fa-clock mr-1"></i>
                        {{showDate($article->created_at)}}
                    </span>
                </div>
            </div>
        </a>
    @endforeach
</div>
