<x-dashboard-layout>

    <div class="flex flex-row items-center">
        <h1 class="grow">Sector: {{$sector->name}}</h1>
        <x-edit-sector-buttons :sector="$sector" />
    </div>


    <x-alerts/>
    {{-- <img src="{{asset('images/sectors/'.$sector->hex.'/'.$sector->image)}}" alt="">

    <p class="mb-3">Created: {{showDate($sector->created_at)}}</p>

    <x-owner-card :user="$sector->user" /> --}}

    <div class="flex flex-row items-center">
        <h2 class="grow">Indusrties: </h2>
    </div>

    @if(count($industries) > 0)
        <form>
            @csrf
            @method('PUT')

            {{-- List --}}
            <table>
                <tr>
                    <th>Industry name</th>
                    <th class="text-center">No. of Sectors</th>
                    <th>Sectors</th>
                    <th class="text-center">No. of Companies</th>
                    <th>Owner</th>
                    <th></th>
                </tr>

                {{-- {{dd($industries)}} --}}

                

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
                                            {{$industry->name}}
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    {{count($industry->grouped_sectors)}}
                                </td>
                                <td>
                                    <ul>
                                        @foreach($industry->grouped_sectors as $sector)
                                            <li>
                                                <a href="/dashboard/sectors/{{$sector->hex}}">
                                                    {{$sector->name}}
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
                                <td></td>
                            </tr>

                            @php
                                $i++;
                            @endphp

                        @endforeach

                    {{-- End for each industry --}}

                    

           

            </table>
        </form>

        


        

        
        <div class="my-5 flex items-start border p-5 border-gray-500 rounded-lg bg-slate-900">
            <form action="/dashboard/sectors/{{$sector->hex}}/industries/with-selected" method="POST" class="grow">
                @csrf
                @method('PUT')
                <input type="hidden" id="industryIds" name="industry_ids" placeholder="Industry IDs" value="{{old('industry_ids')}}">
                <div class="flex flex-row items-center text-sm font-medium">
                    
                    <span class="mr-2.5">With selected</span>
                    <span class="mr-3">
                        <select name="with_selected" required onchange="changeWithSelectedAction(this)">
                            <option value="change_sector" {{old('with_selected') == 'change_sector' ? 'selected' : null}}>Change sector</option>
                            <option value="change_owner" {{old('with_selected') == 'change_owner' ? 'selected' : null}}>Set owner</option>
                            <option value="delete" {{old('with_selected') == 'delete' ? 'selected' : null}}>Delete</option>
                        </select>
                    </span>
                    <span class="mr-2.5" id="to">
                        to
                    </span>
                    <span class="mr-2.5" id="selectorSpan">
                        <select name="sector_id" id="selectSector">
                            <option value="" disabled selected>Choose sector</option>
                            @foreach($sectors as $sector_item)
                                <option value="{{$sector_item->id}}" {{old('sector_id') == $sector_item->id ? 'selected' : null}}>{{$sector_item->name}}</option>
                            @endforeach
                        </select>
                        <select name="user_id" id="selectUser" style="display:none;">
                            <option value="" disabled selected>Choose user</option>
                            @foreach($users as $user_item)
                                <option value="{{$user_item->id}}" {{old('user_id') == $user_item->id ? 'selected' : null}}>{{$user_item->full_name}}</option>
                            @endforeach
                        </select>
                    </span>
                    <button type="submit">Go</button>
                
                </div>
            </form>

            <div>
                <x-quick-create-industry :sector="$sector" />
            </div>

            
            
        </div>

        @error('industry_ids')
            <p class="text-error text-base">Make sure you have selected some companies.</p>
        @enderror
        @error('sector_id')
            <p class="text-error">{{$message}}</p>
        @enderror
        
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
                // console.log(checkbox.value+"True")
                var ids = idsArrays + ',' + checkbox.value;
                ids = ids.replace(/(^,)|(,$)/g, '');
                document.getElementById('industryIds').value=ids;
            }
            else{
                // console.log(checkbox.value+"True")
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

            if(withSelected == 'change_sector'){
                document.getElementById('selectSector').style.display="block";
                document.getElementById('selectUser').style.display="none";
                document.getElementById('to').style.display="block";
                document.getElementById('selectorSpan').classList.add('mr-2.5');
            }

            if(withSelected == 'change_owner'){
                document.getElementById('selectSector').style.display="none";
                document.getElementById('selectUser').style.display="block";
                document.getElementById('to').style.display="block";
                document.getElementById('selectorSpan').classList.add('mr-2.5');
            }

            if(withSelected == 'delete'){
                document.getElementById('selectSector').style.display="none";
                document.getElementById('selectUser').style.display="none";
                document.getElementById('to').style.display="none";
                document.getElementById('selectorSpan').classList.remove('mr-2.5');
            }
                
        }
    </script>
    
</x-dashboard-layout>
