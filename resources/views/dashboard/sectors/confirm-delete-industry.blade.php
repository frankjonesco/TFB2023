<x-dashboard-layout>
    
    {{-- Title and options --}}
    <div class="flex flex-row items-center">
        <h1 class="grow">Delete industry?</h1>
        <x-edit-sector-buttons :sector="$sector" />
    </div>

    {{-- Alert warning --}}
    <div class="alert-warning" role="alert">
        @if(count($ids_to_delete) > 1)
            @if($companies_count > 1)
                There are {{$companies_count}} companies in the <span class="ul-o-2">industries</span> you want to delete.
            @else
                There is {{$companies_count}} company in the <span class="ul-o-2">industries</span> you want to delete.
            @endif
        @else
            @if($companies_count > 1)
                There are {{$companies_count}} companies in the <span class="ul-o-2">{{$industries_to_delete[0]->name}}</span> industry.
            @else
                There is {{$companies_count}} company in the <span class="ul-o-2">{{$industries_to_delete[0]->name}}</span> industry.
            @endif
        @endif
    </div>
    
    {{-- Form --}}
    <form action="/dashboard/sectors/{{$sector->hex}}/industries/delete" method="POST">
        @csrf
        @method('DELETE')

        {{-- Radio buttons --}}
        <div class="form-block">
            <label>
                What to do with {{$companies_count > 1 ? 'these companies' : 'this company'}}?
            </label>
            <div class="flex items-center py-2">
                <input 
                    id="radioMove"
                    type="radio" 
                    name="with_companies_option" 
                    value="move" 
                    onclick="radioMoveCompanies()"
                    {{old('with_companies_option') == 'move' ? 'checked' : null }}
                >
                <label 
                    for="default-radio-1" 
                    class="grow self-center mb-0 text-sm font-light"
                    onclick="clickLabelCheckRadio('radioMove')"
                >Move {{$companies_count > 1 ? 'companies' : 'company'}} to another industry</label>
            </div>
            <div class="flex items-center pt-2">
                <input 
                    id="radioDelete"
                    type="radio" 
                    name="with_companies_option" 
                    value="delete" 
                    onclick="radioDeleteCompanies()"
                    {{old('with_companies_option') == 'delete' ? 'checked' : null }}
                >
                <label 
                    for="default-radio-1" 
                    class="grow mb-0 text-sm font-light"
                    onclick="clickLabelCheckRadio('radioDelete')"
                    >Delete {{$companies_count > 1 ? 'companies' : 'company'}} as well</label>
            </div>
            @error('delete_action')
                <p class="text-error mt-4">
                    What to do with the {{$companies_count > 1 ? 'companies' : 'company'}} in the {{$industry->name}} industry?
                </p>
            @enderror
        </div>

        {{-- Sector and industries --}}
        <div id="sectorIndustrySelectors" class="{{$errors->has('move_to_industry_id') || $errors->has('industry_name') ? null : '!hidden'}}">

            {{-- Select sector --}}
            <div class="form-block">
                <label for="sector_id">
                    Sector
                </label>
                <select name="sector_id" class="w-80" onchange="showSectorIndustries(this)">
                    @foreach($sectors as $sector_item)
                        <option value="{{$sector_item->id}}" {{$sector_item->id == $sector->id ? 'selected' : null}}>{{$sector_item->name}}</option>
                    @endforeach
                </select>
                @error('sector_id')
                    <p class="text-error my-4">You must select a sector.</p>
                @enderror
            </div>

            {{-- Select industry --}}
            <div class="form-block">
                <label for="industry_id">
                    Industry
                </label>
                <div id="industrySelectorAndError">
                    @foreach($sectors as $sector_item)
                        <select id="industriesForSector_{{$sector_item->id}}" name="industry_id" class="w-80 mb-4 {{$sector->id != $sector_item->id ? '!hidden' : null}} {{$errors->has('industry_name') ? '!hidden' : null}}" onchange="setIndustryId(this)">
                            <option value="">Choose industry</option>
                            @foreach($sector_item->industries as $industry_item)
                                @unless(in_array($industry_item->id, $ids_to_delete))
                                    <option value="{{$industry_item->id}}">{{$industry_item->name}}</option>
                                @endunless
                            @endforeach
                        </select>
                    @endforeach
                    
                    @error('move_to_industry_id')
                        <p class="text-error my-4">You must select an industry.</p>
                    @enderror
                    <input type="hidden" id="moveToIndustryId" name="move_to_industry_id">
                </div>
                
                <input id="industryName" type="text" name="industry_name" placeholder="Industry name" class="!w-80 !mb-5 {{$errors->has('industry_name') ?: '!hidden'}}" autofocus>
                @error('industry_name')
                    <p class="text-error my-4">Enter an industry name.</p>
                @enderror
                <a id="createButton" href="#" class="text-sm {{$errors->has('industry_name') ? '!hidden' : null}}" onclick="showCreateNewIndustry()">Or create a new industry</a>
                <a id="selectButton" href="#" class="text-sm {{$errors->has('industry_name') ?: '!hidden'}}" onclick="showSelectIndustry()">Or select an existing industry</a>

                <input type="hidden" id="deleteAction" name="delete_action" class="my-5" value="{{old('delete_action')}}">
            </div>
        </div>
        
        <div class="form-block">
            <button type="submit">
                <i class="fa-regular fa-trash-alt"></i>
                Confirm delete
            </button>
            <a href="/dashboard/sectors/{{$sector->hex}}">
                <button type="button" class="btn-cancel">
                    Cancel
                </button>
            </a>
        </div>
    </form>

   
    <script>

        function radioMoveCompanies(){
            document.getElementById('sectorIndustrySelectors').classList.remove('!hidden');
            document.getElementById('deleteAction').value="move_companies";
        }

        function radioDeleteCompanies(){
            document.getElementById('sectorIndustrySelectors').classList.add('!hidden');
            document.getElementById('deleteAction').value="delete_companies";
        }

        function hideIndustrySelectors(){
            const industrySelectors = document.getElementsByName('industry_id');
            for (var i=0; i < industrySelectors.length; i++){
                industrySelectors[i].classList.add('!hidden');
            }
            document.getElementById('industrySelectorAndError').classList.add('!hidden');
        }

        function showSectorIndustries(sectorId){
            hideIndustrySelectors();
            document.getElementById('industrySelectorAndError').classList.remove('!hidden');
            sectorId = sectorId.value
            document.getElementById('industriesForSector_' + sectorId).classList.remove('!hidden');
            const deleteAction = document.getElementById('deleteAction').value;
            console.log(deleteAction);
            if(deleteAction == 'move_companies'){
                showSelectIndustry();
            }
            if(deleteAction == 'move_companies_to_new_industry'){
                showCreateNewIndustry();
            }
        }

        function setIndustryId(industryId){
            document.getElementById('moveToIndustryId').value=industryId.value;
        }

        function showCreateNewIndustry(){
            hideIndustrySelectors();
            document.getElementById('createButton').classList.add('!hidden');
            document.getElementById('industryName').classList.remove('!hidden');
            document.getElementById('selectButton').classList.remove('!hidden');
            document.getElementById('deleteAction').value="move_companies_to_new_industry";
            hideErrors();
        }
        function showSelectIndustry(){
            const sectorId = document.getElementsByName('sector_id')[0].value;
            document.getElementById('createButton').classList.remove('!hidden');
            document.getElementById('industryName').classList.add('!hidden');
            document.getElementById('selectButton').classList.add('!hidden');
            document.getElementById('industriesForSector_' + sectorId).classList.remove('!hidden');
            document.getElementById('deleteAction').value="move_companies";
            document.getElementById('industrySelectorAndError').classList.remove('!hidden');
            hideErrors();
        }

        function clickLabelCheckRadio(radioInstance){
            document.getElementById(radioInstance).checked=true;
            if(radioInstance == 'radioMove'){
                radioMoveCompanies();
            }
            if(radioInstance == 'radioDelete'){
                radioDeleteCompanies();
            }
        }

        function hideErrors(){
            const errors = document.getElementsByClassName('text-error');
            for (var i=0; i < errors.length; i++){
                errors[i].classList.add('!hidden');
            }
        }

    </script>


</x-dashboard-layout>
