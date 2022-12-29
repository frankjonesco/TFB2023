<style>
.typewriter {
    display:inline-block;
    overflow: hidden; /* Ensures the content is not revealed until the animation */
    white-space: nowrap; /* Keeps the content on a single line */
    animation: 
        typing 2.5s steps(100, end)
}

/* The typing effect */
@keyframes typing {
    from { width: 0 }
    to { width: 80% }
}


</style>


<div class="flex items-center mb-2.5 py-5 border-b border-b-gray-200 w-full">
    <div class="arrow">Breaking news</div>
    <div class="bg-gray-700 h-fit p-0.5 px-1 mr-3 rounded text-white" style="font-size:0.625rem;">New</div>
    <div class="">
        @foreach(bulletinMessages(1) as $bulletin)
            <div class="bulletin text-xs font-medium flex items-center">
                <span class="text-red-500 mr-2">
                    {{showDateTime($bulletin->created_at)}}
                </span>
                <div class="typewriter">
                    <span class="font-bold mr-2"><a href="/news/articles/{{$bulletin->hex}}/{{$bulletin->slug}}">{{truncate($bulletin->title, 80)}}</a></span>
                    <span class="font-light italic">{{truncate(strip_tags($bulletin->body), 60)}}</span>
                </div>
            </div>
        @endforeach
    </div>
    <div class="grow text-right">
        <button class="border border-gray-300 bg-transparent text-gray-400 rounded-full w-5 h-5 p-0 m-0">
            <i class="fa-solid fa-pause" style="font-size:0.6rem; position:relative; top:-2px;"></i>
        </button>
        <button class="border border-gray-300 bg-transparent text-gray-400 rounded-full w-5 h-5 p-0 m-0">
            <i class="fa-solid fa-chevron-left" style="font-size:0.6rem; position:relative; top:-2px;"></i>
        </button>
        <button class="border border-gray-300 bg-transparent text-gray-400 rounded-full w-5 h-5 p-0 m-0">
            <i class="fa-solid fa-chevron-right" style="font-size:0.6125rem; position:relative; top:-2px;"></i>
        </button>
    </div>
</div>

