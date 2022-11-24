<x-dashboard-layout>
    
    <h1>Sectors</h1>
    <p class="mb-9">Use sectors to organise your companies and news articles. Each sector also contains industry folders.</p>
    <x-alerts/>

    <table>
        <thead>
            <tr>
                <th>Sector name</th>
                <th>Last updated</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sectors as $sector)
                <tr>
                    <td>
                        <a href="/dashboard/sectors/{{$sector->hex}}">
                            {{$sector->name}}
                        </a>
                    </td>
                    <td>
                        {{$sector->updated_at}}
                    </td>
                    <td>
                        <a href="/dashboard/sectors/{{$sector->hex}}/text/edit">
                            <button>
                                <i class="fa-solid fa-marker"></i>
                                Edit
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard-layout>