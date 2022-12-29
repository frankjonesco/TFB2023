<style>
.typewriter {
    display:inline-block;
    overflow: hidden;
    white-space: nowrap;
    animation: typing 2.5s steps(100, end)
}
@keyframes typing {
    from { width: 0 }
    to { width: 80% }
}
</style>

<div class="flex items-center mb-2.5 py-5 border-b border-b-gray-200 w-full">
    <div class="arrow">
        Breaking news
    </div>
    <div class="bg-gray-700 h-fit p-0.5 px-1 mr-3 rounded text-white" style="font-size:0.625rem;">
        New
    </div>

    @foreach(bulletinMessages(8) as $bulletin)
        @if($loop->first)
            <div class="bulletin-clips flex text-xs">
        @else
            <div class="bulletin-clips flex text-xs hidden">
        @endif
            <span class="mr-2"><a href="/news/articles/{{$bulletin->hex}}/{{$bulletin->slug}}" class="text-red-700 hover:!text-red-700">{{showDateTime($bulletin->created_at)}}</a></span><div class="typewriter"><span class="font-bold mr-2"><a href="/news/articles/{{$bulletin->hex}}/{{$bulletin->slug}}">{{truncate($bulletin->title, 80)}}</a></span><span class="font-light italic"><a href="/news/articles/{{$bulletin->hex}}/{{$bulletin->slug}}">{{truncate(strip_tags($bulletin->body), 60)}}</a></span></div>
        </div>
    @endforeach

    <div class="grow text-right">
        <button id="btnPlay" class="border border-gray-300 bg-transparent text-gray-400 rounded-full w-5 h-5 p-0 m-0 hidden">
            <i class="fa-solid fa-play" style="font-size:0.6rem; position:relative; top:-2.5px; left:0.5px;"></i>
        </button>
        <button id="btnPause" class="border border-gray-300 bg-transparent text-gray-400 rounded-full w-5 h-5 p-0 m-0">
            <i class="fa-solid fa-pause" style="font-size:0.6rem; position:relative; top:-2px;"></i>
        </button>
        <button id="btnPrevious" class="border border-gray-300 bg-transparent text-gray-400 rounded-full w-5 h-5 p-0 m-0">
            <i class="fa-solid fa-chevron-left" style="font-size:0.6rem; position:relative; top:-2px;"></i>
        </button>
        <button id="btnNext" class="border border-gray-300 bg-transparent text-gray-400 rounded-full w-5 h-5 p-0 m-0">
            <i class="fa-solid fa-chevron-right" style="font-size:0.6125rem; position:relative; top:-2px;"></i>
        </button>
    </div>
</div>

<style>

</style>

<script>
    const bulletins = document.querySelectorAll('.bulletin-clips');
    const btnPause = document.getElementById('btnPause');
    const btnPlay = document.getElementById('btnPlay');
    const btnNext = document.getElementById('btnNext');
    const btnPrevious = document.getElementById('btnPrevious');

    let currentItem = 0;
    let nextItem = 0;
    let lastItem = bulletins.length - 1;

    setInterval(function() {
        if(currentItem === lastItem){
            nextItem = currentItem--;
        }else{
            nextItem = currentItem++;
        }
        setVisibleItem(nextItem);
    }, 8000);

    btnPause.addEventListener('click', function () {
        btnPause.classList.add('hidden');
        btnPlay.classList.remove('hidden');
    });

    btnPlay.addEventListener('click', function () {
        btnPlay.classList.add('hidden');
        btnPause.classList.remove('hidden');
    });

    btnNext.addEventListener('click', function () {
        // If current item is last item, reset to first item
        if(currentItem === lastItem) {
            currentItem = 0;
        }else{
            currentItem++;
        }
        setVisibleItem(currentItem);
    });

    btnPrevious.addEventListener('click', function () {
        // If current item is first item, reset to last item
        if(currentItem === 0) {
            currentItem = lastItem;
        }else{
            currentItem--;
        }
        setVisibleItem(currentItem);
    });

    function setVisibleItem(item){
        // For each bulletins
        bulletins.forEach((bulletin, index) => {
            if(index === item){
                bulletin.classList.remove('hidden');
                bulletin.classList.add('flex');
            }else{
                bulletin.classList.add('hidden');
                bulletin.classList.remove('flex');
            }
        });
    }


    // function playPause(btn){
    //     btn.blur();
    //     console.log('play/pause');
    // }
    // function previousBulletin(btn){
    //     btn.blur();
    //     console.log('previous');
    // }
    // function nextBulletin(btn){
    //     btn.blur();
    //     console.log('next');
    // }
</script>

