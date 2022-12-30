@if($growth < 0 && !empty($growth))
    <div {{$attributes->merge(['class' => 'text-amber-500 text-xs'])}}>
        {{$growth}}
        <span class="text-xs">%</span> 
        <i class="fa-solid fa-arrow-down text-xs"></i>
    </div>
@elseif($growth > 0)
    <div {{$attributes->merge(['class' => 'text-green-500 text-xs'])}}>
        {{$growth}}
        <span class="text-xs">%</span> 
        <i class="fa-solid fa-arrow-up text-xs"></i>
    </div>   
@elseif(!empty($growth))
    <div {{$attributes->merge(['class' => 'text-gray-500 text-xs'])}}>
        {{$growth}}
        <span class="text-xs">%</span> 
        <i class="fa-solid fa-arrow-right"></i>
    </div>   
@endif


