<x-dashboard-layout>

    <div class="flex justify-between items-center">
        <h2>TOFAM Industries</h2>
        <a href="/dashboard/industry/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create industry
            </button>
        </a>
    </div>

    <p class="mb-6">Listing TOFAM industries.</p>

    @if(count($industries) < 1)
        <x-nothing-to-display table="industries" />
    @else
        <x-alerts/>
        <table>
            <thead>
                <tr>
                    <th class="w-1/4">Industry name</th>
                    <th></th>
                    <th>Sectors</th>
                    <th class="text-center">Companies</th>
                    <th>Owner</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($industries as $industry)
                    <tr>
                        <td>
                            <a href="/dashboard/industries/{{$industry->hex}}">
                                {{$industry->english_name}}
                            </a>
                        </td>
                        <td>
                            <a href="/dashboard/industries/{{$industry->hex}}">
                                <img 
                                    src="{{$industry->getImageThumbnail()}}"
                                    alt="Top Family Business - {{$industry->english_name}}"
                                    class="w-20 mr-4 rounded border border-indigo-100 hover:border-amber-300 cursor-pointer"
                                >
                            </a>
                        </td>
                        <td>
                            @if($industry->grouped_sectors)
                                <ul>
                                    @foreach($industry->grouped_sectors as $sector)
                                        <li>- 
                                            <a href="/dashboard/sectors/{{$sector->hex}}">
                                                {{$sector->english_name}}
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                        <td class="text-center">
                            {{count($industry->companies)}}
                        </td>
                        <td>
                            <x-user-profile-pic-full-name :user="$industry->user" />
                        </td>
                        <td class="text-right">
                            <a href="/dashboard/industries/{{$industry->hex}}">
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

        <x-pagination table="industries" :results="$industries" />

    @endif

</x-dashboard-layout>