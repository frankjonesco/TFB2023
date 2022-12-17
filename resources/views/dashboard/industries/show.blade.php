<x-dashboard-layout>
    <div class="flex w-full">
        <div class="w-3/4 pr-10">
            <x-edit-industry-buttons :industry="$industry" />
            <h2 class="grow">Industry: {{$industry->english_name}}</h2>
            <x-alerts/>
            @if(count($industry->companies) > 0)
                <form action="/dashboard/industries/{{$industry->hex}}/companies/with-selected" method="POST">
                    @csrf
                    @method('PUT')
                    <table>
                        <tr>
                            <th class="w-1/4">Company name</th>
                            <th></th>
                            <th>Sectors</th>
                            <th>Owner</th>
                            <th>Visibility</th>
                        </tr>
                        @foreach($industry->companies as $company)
                            <tr>
                                <td>
                                    <a href="/dashboard/companies/{{$company->hex}}">
                                        {{$company->registered_name}}
                                    </a>
                                </td>
                                <td>
                                    <a href="/dashboard/companies/{{$company->hex}}">
                                        <img 
                                            src="{{$company->getImageThumbnail()}}"
                                            alt="Top Family Business - {{$company->registered_name}}"
                                            class="w-20 mr-4 rounded border border-indigo-100 hover:border-amber-300 cursor-pointer"
                                        >
                                    </a>
                                </td>
                                <td>
                                    @if($company->grouped_sectors)
                                        @foreach($company->grouped_sectors as $sector)
                                            <a href="/dashboard/sectors/{{$sector->hex}}">
                                                {{$sector->name}}
                                            </a>
                                            <br>
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    <x-user-profile-pic-full-name :user="$company->user" />
                                </td>
                                <td>
                                    {!!$company->statusInColor()!!}
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    <div class="my-5">
                        <div class="flex flex-row items-center">
                            <span class="mr-2.5">With selected</span>
                            <span class="mr-3">
                                <select name="with_selected" required>
                                    <option value="change_industry" {{old('with_selected') == 'change_industry' ? 'selected' : null}}>Move to</option>
                                    <option value="change_owner" {{old('with_selected') == 'change_owner' ? 'selected' : null}}>Set owner</option>
                                    <option value="delete" {{old('with_selected') == 'delete' ? 'selected' : null}}>Delete</option>
                                </select>
                            </span>
                            <span class="mr-2.5">
                                the
                            </span>
                            <span class="mr-2.5">
                                <select name="industry" required>
                                    <option value="" disabled selected>Choose industry</option>
                                    @foreach($industries as $industry)
                                        <option value="{{$industry->id}}" {{old('industry') == $industry->id ? 'selected' : null}}>{{$industry->name}}</option>
                                    @endforeach
                                </select>
                            </span>
                            <span class="mr-2.5">
                                industry
                            </span>
                            <button type="submit">Go</button>
                        </div>
                        @error('company_ids')
                            <p class="text-error">Make sure you have selected some companies.</p>
                        @enderror
                        @error('industry')
                            <p class="text-error">{{$message}}</p>
                        @enderror
                    </div>
                </form>
            @else
                <x-nothing-to-display table="companies" />
                {{-- <div class="my-5 flex items-start border p-5 border-gray-500 rounded-lg bg-slate-900">
                    <div class="grow"></div>
                    <x-quick-create-industry :sector="$sector" />
                </div> --}}
            @endif
        </div>
        <div class="w-1/4">

        </div>
    </div>

    

</x-dashboard-layout>
