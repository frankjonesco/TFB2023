<x-layout-heading heading="TOFAM Partners" class="!mb-3" />
<div class="grid grid-cols-2 gap-1 w-full mb-12 items-center">
    @foreach(tofamPartners() as $partner)
        <div class="text-center bg-white border border-gray-200 border-t-white border-l-white hover:bg-amber-50 hover:border-t-gray-200 hover:border-l-gray-200 h-28 flex justify-center items-center">
            @if($partner->url === '/')
                <a href="{{$partner->url}}">
            @else
                <a href="{{$partner->url}}" target="_blank">
            @endif
                <img src="{{$partner->getLogo()}}" alt="" class="max-h-24 mx-auto p-5 cursor-pointer">
            </a>
        </div>
    @endforeach
</div>