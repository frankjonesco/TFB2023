<nav aria-label="Page navigation example" class="mt-7">
    <div class="flex items-center mb-5">
        <div class="grow text-sm">
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
        <div>
            <ul class="inline-flex items-center -space-x-px">
                <li>
                    <a href="{{$results->previousPageUrl()}}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <i class="fa-solid fa-arrow-left mr-0"></i>
                    </a>
                </li>

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
                            <a href="{{$results->url($i)}}"
                                @if($results->currentPage() == $i)
                                    class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-yellow-500 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white"
                                @else
                                    class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                @endif
                                        
                                >{{$i}}</a>
                        </li>
                    @endif
                @endfor

                <li>
                    <a href="{{$results->nextPageUrl()}}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                        <i class="fa-solid fa-arrow-right mr-0"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    @if($results->lastPage() > 5)
        <div class="flex items-center">
            <div class="grow"></div>
            <form action="?" method="GET" class="flex items-center">
                <span>Page</span>
                <input type="text" name="page" class="!w-12 !ml-3 !mr-2.5 !mb-0 !text-base !text-center" value="{{$results->currentPage()}}">
                <span class="mr-2.5">of</span>
                <span>{{$results->lastPage()}}</span>
            </form>
        </div>
    @endif
</nav>