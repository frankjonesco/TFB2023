<x-dashboard-layout>
    <div class="flex w-full">
        <div class="w-full pr-10">
            <x-edit-sector-buttons :sector="$sector" />
            <h2 class="grow">Sector/industry</h2>
            <p class="mb-6">
                <a href="/dashboard/sectors/{{$sector->hex}}">
                    {{$sector->english_name}} 
                </a>
                <span>-></span>
                <a href="/dashboard/industry/{{$industry->hex}}">
                    {{$industry->english_name}}
                </a>
            </p>
            <x-alerts/>
            @if(count($companies) > 0)
                <form>
                    @csrf
                    @method('PUT')
                    <table>
                        <tr>
                            <th>Company name</th>
                            <th></th>
                            <th>Sectors</th>
                            <th class="text-center">No. of Industries</th>
                            <th>Industries</th>
                            <th></th>
                        </tr>
                        @php
                            $i = 0;
                        @endphp 
                        @foreach($companies as $company)
                            @php
                                $company = $company[0];
                            @endphp
                            <tr>

                                <td>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="industry_id_checkboxes[]" value="{{$industry->id}}" onclick="handleClick(this)">
                                        <a href="/dashboard/companies/{{$company->hex}}">
                                            {{$company->show_name}}
                                        </a>
                                    </div>
                                </td>
                    
                                <td>
                                    <a href="/dashboard/companies/{{$company->hex}}">
                                        <img 
                                            src="{{$company->getImageThumbnail()}}"
                                            alt="Top Family Business - {{$company->english_name}}"
                                            class="w-20 mr-4 rounded border border-indigo-100 hover:border-amber-300 cursor-pointer"
                                        >
                                    </a>
                                </td>
                                <td>
                                    <ul>
                                        @foreach($company->grouped_sectors as $sector)
                                            <li>-
                                                <a href="/dashboard/sectors">
                                                    {{$sector->english_name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-center">
                                    {{count($company->grouped_industries)}}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($company->grouped_industries as $industry)
                                            <li>-
                                                <a href="">
                                                    {{$industry->english_name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-right">
                                    <a href="/dashboard/companies/{{$company->hex}}">
                                        <button type="button">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                            Inspect
                                        </button>
                                    </a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </table>
                </form>
                <x-with-selected-industries :sector="$sector" :sectors="$sectors" :users="$users" />
            @else
                <x-nothing-to-display table="industries" />
                <div class="my-5 flex items-start border p-5 border-gray-500 rounded-lg bg-slate-900">
                    <div class="grow"></div>
                    <x-quick-create-industry :sector="$sector" />
                </div>
            @endif
        </div>
    </div>
</x-dashboard-layout>
