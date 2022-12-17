<x-dashboard-layout>
    <div class="flex w-full">
        <div class="w-full pr-10">
            <x-edit-sector-buttons :sector="$sector" />
            <h2 class="grow">Sector: {{$sector->english_name}}</h2>
            <x-alerts heading="Listing industries in the '{{$sector->english_name}}' sector."/>
            @if(count($industries) > 0)
                <form>
                    @csrf
                    @method('PUT')
                    <table>
                        <tr>
                            <th>Industry name</th>
                            <th></th>
                            <th>Sectors</th>
                            <th class="text-center">Companies</th>
                            <th>Owner</th>
                            <th></th>
                        </tr>
                        @php
                            $i = 0;
                        @endphp
                        @foreach($industries as $industry)
                            @php
                                $industry = $industry[0];
                            @endphp
                            <tr>

                                <td>
                                    <div class="flex items-center">
                                        <input type="checkbox" name="industry_id_checkboxes[]" value="{{$industry->id}}" onclick="handleClick(this)">
                                        <a href="/dashboard/industries/{{$industry->hex}}">
                                            {{$industry->english_name}}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <a href="/dashboard/industries/{{$industry->hex}}">
                                        <img 
                                            src="{{$industry->getImageThumbnail()}}"
                                            alt="Top Family Business - {{$industry->registered_name}}"
                                            class="w-20 mr-4 rounded border border-indigo-100 hover:border-amber-300 cursor-pointer"
                                        >
                                    </a>
                                </td>
                                <td>
                                    <ul>
                                        @foreach($industry->grouped_sectors as $grouped_sector)
                                            <li>- 
                                                <a href="/dashboard/sectors/{{$grouped_sector->hex}}">
                                                    {{$grouped_sector->english_name}}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="text-center">
                                    {{count($industry->companies)}}
                                </td>
                                <td>
                                    <x-user-profile-pic-full-name :user="$industry->user" />
                                </td>
                                <td class="text-right">
                                    <a href="/dashboard/industries/{{$industry->hex}}">
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
                        {{-- End for each industry --}}
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
