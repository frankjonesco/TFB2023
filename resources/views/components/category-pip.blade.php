@if($category)
    <span class="bg-{{$category->color ? $category->color->tailwind_class : 'red-500'}} w-max px-2 py-1 rounded-lg text-xs font-bold text-zinc-100">
        {!!$category ? '<a href="'.$category->link().'" class="text-white no-underline">'.$category->name.'</a>' : '<a href="'.url('news/categories').'" class="text-white no-underline">Top stories</a>'!!}
    </span>
@else
    <span class="{{randomColor()}} w-max px-2 py-1 rounded-lg text-xs font-bold text-zinc-100">
        {!!$category ? '<a href="'.$category->link().'" class="text-white no-underline">'.$category->name.'</a>' : '<a href="'.url('news/categories').'" class="text-white no-underline">Top stories</a>'!!}
    </span>
@endif