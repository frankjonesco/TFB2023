<x-container-h-min>
    <x-layout-articles-breaking />
</x-container-h-min>
<div class="bg-repeat h-full" style="background-image:url('{{asset('images/bg.png')}}');">
    <div class="flex w-3/4 h-full mx-auto px-6 pb-6 bg-white text-gray-500">
        {{$slot}}
    </div>
</div>

