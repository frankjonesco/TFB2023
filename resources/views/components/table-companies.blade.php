@if(count($companies) < 1)
    <x-nothing-to-display table="companies" />
@else
    <table class="table-fixed">
        <thead>
            <tr>
                <th class="w-1/4">Company name</th>
                <th></th>
                <th>Sectors</th>
                <th>Industries</th>
                <th class="w-48">Owner</th>
                <th>Visibility</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 0;
            @endphp 
            @foreach($companies as $company)
                @if(isset($extract))
                    @php
                        $company = $company[0];
                    @endphp
                @endif
                
                <tr>
                    <td>
                        <input type="checkbox" name="industry_id_checkboxes[]" value="{{$company->id}}" onclick="handleClick(this)">
                        <a href="/dashboard/companies/{{$company->hex}}">
                            {{$company->registered_name}}
                        </a>
                    </td>
                    <td>
                        <a href="/dashboard/companies/{{$company->hex}}">
                            <img 
                                src="{{$company->getImageThumbnail()}}"
                                alt="Top Family Business - {{$company->registered_name}}"
                                class="w-20 mr-4 rounded border border-indigo-100 hover:border-amber-300 cursor-pointer"
                            >
                        </a>
                    </td>
                    <td>
                        @if($company->grouped_sectors)
                            @foreach($company->grouped_sectors as $sector)
                                <a href="/dashboard/sectors/{{$sector->hex}}">
                                    {{$sector->name}}
                                </a>
                                <br>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if($company->grouped_industries)
                            @foreach($company->grouped_industries as $industry)
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
                @php
                    $i++;
                @endphp
            @endforeach
        </tbody>
    </table>
    <x-pagination table="companies" :results="$companies" />
@endif