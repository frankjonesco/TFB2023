@if($growth < 0 && !empty($growth))
    <div class="text-amber-400 text-xs">
        {{$growth}}
        <span class="text-xs">%</span> 
        <i class="fa-solid fa-arrow-down text-xs"></i>
    </div>
@elseif($growth > 0)
    <div class="text-green-400 text-xs">
        {{$growth}}
        <span class="text-xs">%</span> 
        <i class="fa-solid fa-arrow-up text-xs"></i>
    </div>   
    @elseif($growth === 0)
    <div class="text-gray-400 text-xs">
        {{$growth}}
        <span class="text-xs">%</span> 
        <i class="fa-solid fa-arrow-up text-xs"></i>
    </div>   
@endif


