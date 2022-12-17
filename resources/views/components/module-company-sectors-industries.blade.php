<div class="flex mb-2">
    <h3 class="pl-1.5 pr-5 pb-3 border-b border-sky-500 uppercase text-lg">Sectors & Industries</h3>
    <span class="grow border-b border-zinc-500"></span>
</div>
<div class="grid grid-cols-[1fr_19fr] gap-0 text-sm mb-6">
    @foreach($company->grouped_sectors as $key => $sector)
        <div class="p-2 border-b border-gray-700">
            <i class="fa-regular fa-building"></i>
        </div>
        <div class="p-2 w-full border-b border-gray-700">
            <a href="/dashboard/sectors/{{$sector->hex}}">
                {{$sector->name}}
            </a>
        </div>
        @foreach($company->sector_industries as $key => $industry)
            <div class="p-2 border-b border-gray-700 text-zinc-500">
                <i class="fa-regular fa-folder font-thin"></i>
            </div>
            <div class="p-2 w-full border-b border-gray-700 font-thin text-zinc-500">
                <a href="/dashboard/industries/{{$industry->hex}}">
                    {{$industry->name}}
                </a>
            </div>
        @endforeach
    @endforeach
</div>