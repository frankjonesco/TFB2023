<div class="sidebar-module">
    <x-layout-heading heading="Top rankings" class="!mb-1.5" />
    <table class="mt-0 pt-0">
        <tbody>
            @foreach($companies as $key => $company)
                @if($loop->iteration % 2 == 0)
                    <tr class="bg-zinc-50">
                @else
                    <tr>
                @endif
                    <td class="p-2.5 m-0 !text-xs">
                        {{($companies->firstItem() + $key) < 10 ? '0'.$companies->firstItem() + $key : $companies->firstItem() + $key}}
                    </td>
                    <td class="p-2.5 m-0 !text-xs">

                        <div class="flex items-center">
                            <img 
                                src="{{$company->getImageThumbnail()}}"
                                alt="Top Family Business - {{$company->registered_name}}"
                                class="w-4 mr-4 rounded border border-indigo-100 hover:border-blue-300 cursor-pointer"
                            >
                            <a href="/companies/{{$company->hex}}/{{$company->slug}}" class="plain whitespace-nowrap hover:!underline">{{$company->show_name}}</a>
                        </div>
                    </td>
                    <td class="p-2.5 m-0 text-right whitespace-nowrap !text-xs">{{formatTurnover($company->ranking->turnover)}}</td>
                    <td class="p-2.5 text-right whitespace-nowrap !text-xs"><x-ranking-growth growth="{{$company->latest_ranking->calculateGrowth('turnover')}}" /></td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="/rankings">
        <button class="mt-4 btn-plain w-full">
            <i class="fa-solid fa-line-chart mr-1.5"></i>
            All rankings
        </button>
    </a>
</div>