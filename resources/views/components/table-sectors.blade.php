@if(count($sectors) < 1)
    <x-nothing-to-display table="sectors" />
@else
    <table>
        <thead>
            <tr>
                <th class="w-1/4">Sector name</th>
                <th></th>
                <th>Industries</th>
                <th class="text-center">Companies</th>
                <th>Owner</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($sectors as $sector)
                <tr>
                    <td>
                        <input type="checkbox" name="sector_id_checkboxes[]" value="{{$sector->id}}" onclick="handleClick(this)">
                        <a href="/dashboard/sectors/{{$sector->hex}}">
                            {{$sector->english_name}}
                        </a>
                    </td>
                    <td>
                        <a href="/dashboard/sectors/{{$sector->hex}}">
                            <img 
                                src="{{$sector->getImageThumbnail()}}"
                                alt="Top Family Business - {{$sector->english_name}}"
                                class="w-20 mr-4 rounded border border-indigo-100 hover:border-amber-300 cursor-pointer"
                            >
                        </a>
                    </td>
                    <td>
                        @if(count($sector->industries) > 0)

                            
                            <ul>
                                @php
                                    $i = 0;
                                @endphp
                                @foreach($sector->industries->groupBy('id') as $industry)
                                    @php
                                        $industry = $industry[0];
                                    @endphp
                                    <li>- 
                                        <a href="/dashboard/sector-industries/{{$industry->pivot->hex}}">
                                            {{$industry->english_name}}
                                        </a>
                                    </li>

                                    @php
                                        $i++;
                                    @endphp

                                @endforeach
                            </ul>
                        @endif
                    </td>
                    <td class="text-center">
                        {{count($sector->companies)}}
                    </td>
                    <td>
                        <x-user-profile-pic-full-name :user="$sector->user" />
                    </td>

                    <td class="text-right">
                        <a href="/dashboard/sectors/{{$sector->hex}}">
                            <button>
                                <i class="fa-solid fa-magnifying-glass"></i>
                                Inspect
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>

    </table>

    <x-pagination table="sectors" :results="$sectors" />

@endif