{{-- With selected --}}
<div class="my-5 flex items-start border p-5 border-gray-500 rounded-lg bg-slate-900">
    <form action="/dashboard/sectors/{{$sector->hex}}/industries/with-selected" method="POST" class="grow">
        @csrf
        @method('PUT')
        <input type="hidden" name="current_sector_id" value="{{$sector->id}}">
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
                        <option value="{{$sector_item->id}}" {{old('sector_id') == $sector_item->id ? 'selected' : null}}>{{$sector_item->name}}</option>
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
            <button type="submit" class="!text-xs">Go</button>
        </div>
    </form>
    <div>
        <x-quick-create-industry :sector="$sector" />
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