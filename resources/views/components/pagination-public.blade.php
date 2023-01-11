{{-- {{dd($results)}} --}}
@if( method_exists($results,'links') )
    <nav aria-label="Page navigation example" class="mt-7">
        <div class="flex items-center mb-5">
            
            <div>
                <ul class="inline-flex items-center -space-x-px text-xs">
                    

                    @for($i = 1; $i <= $results->lastPage(); $i++)
                        @php
                            $link_limit = 11;
                            $half_total_links = floor($link_limit / 2);
                            $from = $results->currentPage() - $half_total_links;
                            $to = $results->currentPage() + $half_total_links;
                            if ($results->currentPage() < $half_total_links) {
                                $to += $half_total_links - $results->currentPage();
                            }
                            if ($results->lastPage() - $results->currentPage() < $half_total_links) {
                                $from -= $half_total_links - ($results->lastPage() - $results->currentPage()) - 1;
                            }
                        @endphp
                        @if($from < $i && $i < $to)
                            <li>
                                @if(isset($urlPath))
                                    <a href="{{url($urlPath.'/?page='.$i)}}"                                    
                                @else
                                    <a href="{{$results->appends($_GET)->url($i)}}"
                                @endif

                                    @if($results->currentPage() == $i)
                                        class="px-3 py-2 mr-1.5 leading-tight bg-red-500 text-white hover:bg-red-600 no-underline hover:!text-white"
                                    @else
                                        class="px-3 py-2 mr-1.5 leading-tight bg-white text-gray-500 border border-gray-200 hover:bg-red-500 hover:!text-white no-underline"
                                    @endif
                                            
                                    >{{$i}}</a>
                            </li>

                            
                        @endif
                        
                    @endfor

                    <li>
                        <a href="{{$results->nextPageUrl()}}" class="px-3 py-2 mr-1.5 leading-tight bg-white text-gray-500 border border-gray-200 hover:bg-red-500 hover:!text-white no-underline">
                            Next
                        </a>
                    </li>
                            

                    
                </ul>
            </div>
            <div class="grow text-xs text-red-400 text-end">
                @php
                    $from = ($results->currentpage()-1)*$results->perpage()+1;
                    $to = ($results->currentpage()-1)*$results->perpage()+$results->count();
                    $total = $results->total();

                    $from = number_format($from, 0, ',');
                    $to = number_format($to, 0, ',');
                    $total = number_format($total, 0, ',');
                @endphp
                <span class="text-gray-400">Showing</span> {{$from}} <span class="text-gray-400">to</span> {{$to}}
                <span class="text-gray-400">of</span> {{$total}} <span class="text-gray-400">{{$table}}</span>
            </div>
        </div>
    </nav>
@endif