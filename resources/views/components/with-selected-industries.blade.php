{{-- With selected --}}
<div class="my-5 flex items-start border p-5 border-gray-500 rounded-lg bg-stone-900">
    <form action="{{url('dashboard/sectors//industries/with-selected')}}" method="POST" class="grow">
        @csrf
        @method('PUT')
        <input type="hidden" name="current_sector_id" value="">
        <input type="hidden" id="industryIds" name="industry_ids" value="{{old('industry_ids')}}">
        <div class="flex flex-row items-center text-sm font-medium">
            <span class="mr-2.5">With selected</span>
            <span class="mr-3">
                {{-- Select action --}}
                <select name="with_selected" class="text-sm p-2" required onchange="changeWithSelectedAction(this)">
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
                <select name="sector_id" class="text-sm p-2" id="selectSector">
                    <option value="" disabled selected>Choose sector</option>
                    @foreach($sectors as $sector_item)
                        <option value="{{$sector_item->id}}" {{old('sector_id') == $sector_item->id ? 'selected' : null}}>{{$sector_item->english_name}}</option>
                    @endforeach
                </select>
                {{-- Select user --}}
                <select name="user_id" id="selectUser" class="text-sm p-2" style="display:none;">
                    <option value="" disabled selected>Choose user</option>
                    @foreach($users as $user_item)
                        <option value="{{$user_item->id}}" {{old('user_id') == $user_item->id ? 'selected' : null}}>{{$user_item->full_name}}</option>
                    @endforeach
                </select>
            </span>
            {{-- Submit --}}
            <button type="submit">Go</button>
        </div>
    </form>
    <div>
        {{-- <x-quick-create-industry :sector="$sector" /> --}}
    </div>   
</div>
@error('industry_ids')
    <p class="text-error text-base">
        Make sure you have selected some companies.
    </p>
@enderror
@error('sector_id')
    <p class="text-error">
        Select a sector.
    </p>
@enderror

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