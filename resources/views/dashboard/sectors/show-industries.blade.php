<x-dashboard-layout>
{{-- {{dd($sector)}} --}}
    <div class="flex flex-row items-center">
        <h1 class="grow">Sector industries</h1>
        <x-edit-sector-buttons :sector="$sector" />
    </div>

    <p class="mb-6">List of companies in the '{{$industry->english_name}}' industry in the '{{$sector->english_name}}' sector.</p>

    <x-alerts/>

    <div class="flex flex-row items-center">
        <h2 class="grow">Companies: </h2>
    </div>

    @if(count($companies) > 0)
        <form>
            @csrf
            @method('PUT')

            {{-- List --}}
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

                    {{-- For each industry --}}
                        
                        @foreach($companies as $company)
                        {{-- {{dd($industry[0])}} --}}
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

                    {{-- End for each industry --}}

                    

           

            </table>
        </form>

        


        

        
        <div class="my-5 flex items-start border p-5 border-gray-500 rounded-lg bg-slate-900">
            <form action="/dashboard/sectors/{{$sector->hex}}/industries/with-selected" method="POST" class="grow">
                @csrf
                @method('PUT')
                <input type="hidden" name="current_sector_id" value="{{$sector->id}}">
                <input type="hidden" id="industryIds" name="industry_ids" value="{{old('industry_ids')}}">
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

                        {{-- Select sector --}}
                        <select name="sector_id" id="selectSector">
                            <option value="" disabled selected>Choose sector</option>
                            @foreach($sectors as $sector_item)
                                <option value="{{$sector_item->id}}" {{old('sector_id') == $sector_item->id ? 'selected' : null}}>{{$sector_item->name}}</option>
                            @endforeach
                        </select>

                        {{-- Select user --}}
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
