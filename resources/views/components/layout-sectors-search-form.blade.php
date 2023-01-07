@php
    if(!isset($term)){
        $term = null;
    }
@endphp

<form action="{{url('sectors/search')}}" method="GET">

    <div class="form-block flex">
        <input type="text" name="term" value="{{$term ? $term : old('term')}}" placeholder="Search sectors" class="!bg-gray-50 !rounded !border !border-gray-300 focus:!border-sky-400 !p-2 !text-sm !text-gray-500 !outline-0 !placeholder-gray-400 mr-2">
        <button class="btn-plain px-4">
            <i class="fa-solid fa-magnifying-glass"></i>
        </button>
    </div>
</form>

@if($term)
    <p class="text-sm">Showing <span class="underline underline-offset-2">{{count($sectors)}}</span> {{count($sectors) === 1 ? 'result' : 'results'}} for search term <span class="underline underline-offset-2">'{{$term}}'</span>.</p>
@endif

