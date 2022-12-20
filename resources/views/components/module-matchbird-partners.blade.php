<div class="flex mt-5 mb-7">
    <h3 class="pl-1.5 pr-5 pb-3 border-b border-sky-500 uppercase text-lg">Matchbird partners</h3>
    <span class="grow border-b border-zinc-500"></span>
</div>

<div class="grid grid-cols-3 gap-1">
    @foreach(matchbirdPartners() as $matchbird_partner)
        <div class="text-center p-2 flex">
            <img 
                src="{{$matchbird_partner->getImageThumbnail()}}"
                alt="Top Family Business - {{$matchbird_partner->registered_name}}"
                class="rounded cursor-pointer"
            >
        </div>
    @endforeach
</div>