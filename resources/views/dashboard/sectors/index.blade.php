<x-dashboard-layout>
    
    <h1>Sectors</h1>
    <p class="mb-9">Use sectors to organise your companies and news articles. Each sector also contains industry folders.</p>

    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-left">Sector name</th>
                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-left">Last updated</th>
                <th class="border-b font-medium p-4 pl-8 pt-0 pb-3 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($sectors as $sector)
                <tr class="border-b border-slate-500 text-slate-500">
                    <td class="p-4 pl-8">
                        <a href="/dashboard/sectors/{{$sector->hex}}" class="hover:text-yellow-700">
                            {{$sector->name}}
                        </a>
                    </td>
                    <td class="p-4 pl-8">
                        {{$sector->updated_at}}
                    </td>
                    <td class="p-4 pl-8">
                        <button>
                            <i class="fa-solid fa-marker"></i>
                            Edit
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-dashboard-layout>