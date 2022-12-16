<div class="flex mb-7">
    <h3 class="pl-1.5 pr-5 pb-3 border-b border-sky-500 uppercase text-lg">Company details</h3>
    <span class="grow border-b border-zinc-500"></span>
</div>
<div class="grid grid-cols-[1fr_8fr_11fr] gap-0 text-sm">
    @foreach($details as $key => $detail)
        <div class="p-2 border-b border-gray-700">
            <i class="{{$detail['icon']}}"></i>
        </div>
        <div class="p-2 w-full border-b border-gray-700">{{$detail['label']}}:</div>
        <div class="p-2 border-b border-gray-700 font-thin">{!!$detail['result']!!}</div>
    @endforeach
</div>