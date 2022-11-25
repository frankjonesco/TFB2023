<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Companies</h1>
        <a href="/dashboard/companies/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create company
            </button>
        </a>
    </div>

    <p class="mb-6">Manage your companies here.</p>

    <x-alerts/>

    <table class="table-fixed">
        <thead>
            <tr>
                <th>Company name</th>
                <th>Sectors</th>
                <th>Industries</th>
                <th>Owner</th>
                <th>Visibility</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($companies as $company)    
                <tr>
                    <td>
                        <a href="/dashboard/companies/{{$company->hex}}">
                            {{$company->registered_name}}
                        </a>
                    </td>
                    <td>
                        @if($company->sectors)
                            @foreach($company->sectors as $sector)
                                <a href="/dashboard/sectors/{{$sector->hex}}">
                                    {{$sector->name}}
                                </a>
                                <br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if($company->industries)
                            @foreach($company->industries as $industry)
                                <a href="/dashboard/industries/{{$industry->hex}}">
                                    {{$industry->name}}
                                </a>
                                <br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        <x-user-profile-pic-full-name :user="$company->user" />
                    </td>
                    <td>
                        {!!$company->statusInColor()!!}
                    </td>
                    <td class="text-right">
                        <a href="/dashboard/companies/{{$company->hex}}">
                            <button>
                                <i class="fa-solid fa-info-circle"></i>
                                Details
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <nav aria-label="Page navigation example" class="mt-7">
        <div class="flex items-center mb-5">
            <div class="grow">
                @php
                    $from = ($companies->currentpage()-1)*$companies->perpage()+1;
                    $to = ($companies->currentpage()-1)*$companies->perpage()+$companies->count();
                    $total = $companies->total();

                    $from = number_format($from, 0, ',');
                    $to = number_format($to, 0, ',');
                    $total = number_format($total, 0, ',');
                @endphp
                <span class="text-gray-400">Showing</span> {{$from}} <span class="text-gray-400">to</span> {{$to}}
                <span class="text-gray-400">of</span> {{$total}} <span class="text-gray-400">companies</span>
                {{-- Showing {{$companies->count()}} of {{$companies->total()}} results --}}
            </div>
            <div>
                <ul class="inline-flex items-center -space-x-px">
                    <li>
                        <a href="{{$companies->previousPageUrl()}}" class="px-3 py-2 ml-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-l-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <i class="fa-solid fa-arrow-left mr-0"></i>
                        </a>
                    </li>

                    @for($i = 1; $i <= $companies->lastPage(); $i++)
                        @php
                            $link_limit = 11;
                            $half_total_links = floor($link_limit / 2);
                            $from = $companies->currentPage() - $half_total_links;
                            $to = $companies->currentPage() + $half_total_links;
                            if ($companies->currentPage() < $half_total_links) {
                                $to += $half_total_links - $companies->currentPage();
                            }
                            if ($companies->lastPage() - $companies->currentPage() < $half_total_links) {
                                $from -= $half_total_links - ($companies->lastPage() - $companies->currentPage()) - 1;
                            }
                        @endphp
                        @if($from < $i && $i < $to)
                            <li>
                                <a href="{{$companies->url($i)}}"
                                    @if($companies->currentPage() == $i)
                                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-yellow-500 dark:border-gray-700 dark:text-white dark:hover:bg-gray-700 dark:hover:text-white"
                                    @else
                                        class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white"
                                    @endif
                                        
                                    >{{$i}}</a>
                            </li>
                        @endif
                    @endfor

                    <li>
                        <a href="{{$companies->nextPageUrl()}}" class="px-3 py-2 leading-tight text-gray-500 bg-white border border-gray-300 rounded-r-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            <i class="fa-solid fa-arrow-right mr-0"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="flex items-center">
            <div class="grow"></div>
            <form action="?" method="GET" class="flex items-center">
                <span>Page</span>
                <input type="text" name="page" class="!w-12 !ml-3 !mr-2.5 !mb-0 !text-base !text-center" value="{{$companies->currentPage()}}">
                <span>of {{$companies->lastPage()}}</span>
            </form>
        </div>
    </nav>

      
</x-dashboard-layout>
