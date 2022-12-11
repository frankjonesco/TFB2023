<x-dashboard-layout>

    <div class="flex flex-row items-center">
        <h1 class="grow">Companies</h1>
        <x-edit-industry-buttons :industry="$industry" />
    </div>

    <p class="mb-6">List of companies in the '{{$industry->english_name}}' industry.</p>

    <x-alerts/>

    @if(count($industry->companies) > 0)

        <form action="/dashboard/industries/{{$industry->hex}}/companies/with-selected" method="POST">
            @csrf
            @method('PUT')
            <table>
                <tr>
                    <th></th>
                    <th>Registered name</th>
                </tr>
                @foreach($industry->companies as $company)
                    <tr>
                        <td>
                            <input type="checkbox" name="company_ids[]" value="{{$company->id}}" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </td>
                        <td>
                            {{$company->registered_name}}
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

</x-dashboard-layout>
