@if(!isset($size))
    @php
        $size = 'full';
    @endphp
@endif

<span {{$attributes->merge(['class' => 'text-sm italic text-zinc-100 block'])}}>
    <span class="mr-6">
        <i class="fa-regular fa-clock mr-1"></i>
        {{showDate($article->created_at)}}
    </span>
    <span class="mr-6">
        <i class="fa-regular fa-user mr-1"></i>
        by {{$article->user->full_name}}
    </span>
    
    @if($size === 'full' || $size === 'md')
        <span class="mr-6">
            <i class="fa-regular fa-eye mr-1"></i>
            {{$article->views}}
        </span>
    @endif
    @if($size === 'full')
        @if(count($article->comments) > 0)
            <span class="mr-6">
                <i class="fa-regular fa-comments mr-1"></i>
                {{count($article->comments)}} comments
            </span>
        @endif
    @endif    
</span>