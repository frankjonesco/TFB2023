<x-layout-heading heading="TOFAM Partners" class="!mb-3" />
<div class="grid grid-cols-2 gap-1 w-full mb-6 items-center">
    @foreach(tofamPartners() as $partner)
        <a href="{{$partner->url}}" target="_blank" class="p-7 text-center bg-slate-300 border border-zinc-400">
            <img src="{{$partner->getLogo()}}" alt="" class="max-h-8 mx-auto">
        </a>
    @endforeach
</div>