@php
    if(!isset($currentCategory)){
        $currentCategory = null;
    }
@endphp

<x-layout-heading heading="News categories" class="!mb-3" />
<div class="grid grid-cols-2 mb-12 gap-0.5">
    @foreach($categories as $category)
        <a href="{{$category->link()}}" class="plain">

            @if($currentCategory === $category->id)
                <div class="flex flex-row items-center border-b text-sm p-2 py-2.5 font-bold cursor-pointer text-red-500">
                    <div class="grow">{{$category->name}}</div>
                    <div class="count-square p-1.5 py-0.5 border border-red-500 bg-red-500 text-white rounded-sm font-bold text-xs">
                        {{count($category->articles)}}
                    </div>
                </div>
            @else
                <div onmouseover="mouseOverCategory(this)" onmouseout="mouseOutCategory(this)" class="flex flex-row items-center border-b text-sm p-2 py-2.5 font-bold cursor-pointer">
                    <div class="grow">{{$category->name}}</div>
                    <div class="count-square p-1.5 py-0.5 border border-gray-200 rounded-sm  font-bold text-xs">
                        {{count($category->articles)}}
                    </div>
                </div>
            @endif
    
        </a>
    @endforeach
</div>


<script>
    function mouseOverCategory(div){
        Array.from(div.children).filter(function (child) {
            div.querySelector('.grow').classList.add('text-red-500');
            div.querySelector('.count-square').classList.add('border-red-500', 'bg-red-500', 'text-white');
        });
    }
    function mouseOutCategory(div){
        Array.from(div.children).filter(function (child) {
            div.querySelector('.grow').classList.remove('text-red-500');
            div.querySelector('.count-square').classList.remove('border-red-500', 'bg-red-500', 'text-white');
        });
    }
</script>