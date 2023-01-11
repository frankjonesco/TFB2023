@if($category)
    <span class="bg-{{$category->color ? $category->color->tailwind_class : 'red-500'}} w-max px-2 py-1 rounded text-xs font-bold text-zinc-100">
        {!!$category ? '<a href="'.$category->link().'" class="text-white no-underline">'.$category->name.'</a>' : '<a href="'.url('news').'" class="text-white no-underline">Top stories</a>'!!}
    </span>
@else
    <span class="{{randomColor()}} w-max px-2 py-1 rounded text-xs font-bold text-zinc-100">
        {!!$category ? '<a href="'.$category->link().'" class="text-white no-underline">'.$category->name.'</a>' : '<a href="'.url('news').'" class="text-white no-underline">Top stories</a>'!!}
    </span>
@endif


{{-- @php
$colors = ['orange', 'amber', 'yellow', 'lime', 'green', 'emerald', 'teal', 'cyan', 'sky', 'blue', 'indigo', 'violet', 'fuchsia', 'pink', 'red', 'rose'];
$shades = [400,500,600,700,800];
@endphp
@foreach($colors as $color)
    @foreach($shades as $shade)
        "bg-{{$color}}-{{$shade}}", 
    @endforeach
@endforeach --}}



        