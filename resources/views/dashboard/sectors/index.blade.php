<x-dashboard-layout>
    
    <div class="flex flex-row items-center">
        <h1 class="grow">Sectors</h1>
        <a href="/dashboard/sectors/create">
            <button>
                <i class="fa-solid fa-plus"></i>
                Create sector
            </button>
        </a>
    </div>

    <p class="mb-6">List of sectors on the site.</p>

    @if(count($sectors) < 1)
        
        <x-nothing-to-display table="sectors" />
    
    @else
    
        <x-alerts/>
        
        <table>

            <thead>
                <tr>
                    <th>Sector name</th>
                    <th class="text-center">No. of Industries</th>
                    <th>Industries</th>
                    <th class="text-center">No. of Companies</th>
                    <th>Owner</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
                @foreach($sectors as $sector)
                    <tr>
                        <td>
                            <a href="/dashboard/sectors/{{$sector->hex}}">
                                {{$sector->english_name}}
                            </a>
                        </td>
                        <td class="text-center">
                            {{count($sector->grouped_industries)}}
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

</x-dashboard-layout>