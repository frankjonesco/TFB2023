<div class="sidebar-module">
    <x-layout-heading heading="Matchbird partners" class="heading-mt" />

    <div class="grid grid-cols-2 gap-1">
        @foreach(matchbirdPartners() as $matchbird_partner)
            <div class="text-center px-2 pb-2 flex items-center">
                <a href="/companies/{{$matchbird_partner->hex}}/{{$matchbird_partner->slug}}">
                    <img 
                        src="{{$matchbird_partner->getImageThumbnail()}}"
                        alt="Top Family Business - {{$matchbird_partner->registered_name}}"
                        class="rounded cursor-pointer w-3/4 mx-auto"
                    >
                </a>
            </div>
        @endforeach
    </div>
</div>