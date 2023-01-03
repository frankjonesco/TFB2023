<div class="sidebar-module">
    <x-layout-heading heading="Top rankings" class="!mb-1.5" />
    <table class="mt-0 pt-0">
        <tbody>
            @foreach($companies as $key => $company)
                <tr>
                    <td class="p-2 m-0">
                        {{($companies->firstItem() + $key) < 10 ? '0'.$companies->firstItem() + $key : $companies->firstItem() + $key}}
                    </td>
                    <td class="p-2 m-0">

                        <div class="flex items-center">
                            <img 
                                src="{{$company->getImageThumbnail()}}"
                                alt="Top Family Business - {{$company->registered_name}}"
                                class="w-4 mr-4 rounded border border-indigo-100 hover:border-blue-300 cursor-pointer"
                            >
                            <a href="/companies/{{$company->hex}}/{{$company->slug}}" class="plain">{{$company->show_name}}</a>
                        </div>
                    </td>
                    <td class="p-2 m-0 text-right">{{formatTurnover($company->ranking->turnover)}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>