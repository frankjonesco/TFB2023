<x-dashboard-layout>
    <div class="flex w-full">
        <div class="w-full pr-10">
            <x-edit-sector-buttons :sector="$sector" />
            <h2 class="grow">Sector: {{$sector->english_name}}</h2>
            <x-alerts/>

    @if(count($industries) > 0)
        <form>
            @csrf
            @method('PUT')

            {{-- List --}}
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

                    {{-- For each industry --}}
                        
                        @foreach($industries as $industry)
                        {{-- {{dd($industry[0])}} --}}
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


    <script>
        window.addEventListener('load', 
            function() { 
                console.log('Enter: ');
                var markedCheckbox = document.querySelectorAll('input[type="checkbox"]:checked');
                for (var checkbox of markedCheckbox){
                    let industryIds = document.getElementById('industryIds');
                    industryIds.value = industryIds.value + ',' + checkbox.value;
                }
            }
        );

        function handleClick(checkbox) {
            let industryIds = document.getElementById('industryIds').value;
            const idsArrays = industryIds.split(',');
            if(checkbox.checked){
                var ids = idsArrays + ',' + checkbox.value;
                ids = ids.replace(/(^,)|(,$)/g, '');
                document.getElementById('industryIds').value=ids;
            }
            else{
                var ids = idsArrays;
                for( var i = 0; i < ids.length; i++){ 
                    if ( ids[i] === checkbox.value) { 
                        ids.splice(i, 1); 
                    }
                }
                document.getElementById('industryIds').value=ids;
            }
        }

        function changeWithSelectedAction(withSelected){
            withSelected = withSelected.value;
            // Change Sector
            if(withSelected == 'change_sector'){
                document.getElementById('selectSector').style.display="block";
                document.getElementById('selectUser').style.display="none";
                document.getElementById('to').style.display="block";
                document.getElementById('selectorSpan').classList.add('mr-2.5');
            }
            // Change owner
            if(withSelected == 'change_owner'){
                document.getElementById('selectSector').style.display="none";
                document.getElementById('selectUser').style.display="block";
                document.getElementById('to').style.display="block";
                document.getElementById('selectorSpan').classList.add('mr-2.5');
            }
            // Delete
            if(withSelected == 'delete'){
                document.getElementById('selectSector').style.display="none";
                document.getElementById('selectUser').style.display="none";
                document.getElementById('to').style.display="none";
                document.getElementById('selectorSpan').classList.remove('mr-2.5');
            }    
        }
    </script>
    
</x-dashboard-layout>
