<x-dashboard-layout>
    <div class="flex w-full">
        <div class="w-3/4 pr-10">
            <x-edit-company-buttons :company="$company" />
            <h2 class="grow">
                Edit company
            </h2>
            <x-alerts/>
            <form action="/dashboard/companies/store" method="POST">
                @csrf
                <input type="hidden" id="inputSlug" name="slug" value="{{old('slug') ?? $company->slug}}">

                {{-- Registered name --}}
                <div class="form-block">
                    <label for="registered_name">Registered name</label>
                    <input 
                        type="text" 
                        id="registeredName"
                        name="registered_name" 
                        placeholder="Registered name" 
                        value="{{old('name') ?? $company->registered_name}}" 
                        oninput="window.updateCompanySlug(this, 'slug', 'inputSlug')"
                    >
                    @error('registered_name')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Trading name --}}
                <div class="form-block">
                    <label for="trading_name">Trading name</label>
                    <input 
                        type="text" 
                        id="tradingName"
                        name="trading_name" 
                        placeholder="Trading name" 
                        value="{{old('trading_name') ?? $company->trading_name}}" 
                        oninput="window.updateCompanySlug(this, 'slug', 'inputSlug')"
                    >
                    <p class="text-slug">Slug: <span id="slug">{{old('slug') ?? $company->slug}}</span></p>
                    @error('trading_name')
                        <p class="text-error">{{$message}}</p>
                    @enderror
                </div>

                {{-- Description --}}
                <div class="form-block">
                    <label for="description">Description</label>
                    <textarea 
                        id="description" 
                        name="description" 
                        rows="4" 
                        placeholder="How would you describe this company?"
                    >{{old('description') ?? $company->description}}</textarea>
                </div>

                {{-- Visibility --}}
                <div class="form-block">
                    <label for="status">Visibility</label>
                    <select id="status" name="status">
                        <option value="public" class="block w-full" {{$company->status == 'public' ? 'selected' : null}}>Public</option>
                        <option value="private" class="block w-full" {{$company->status == 'private' ? 'selected' : null}}>Private</option>
                        <option value="unlisted" class="block w-full" {{$company->status == 'unlisted' ? 'selected' : null}}>Unlisted</option>
                    </select>
                    @error('status')
                        <p class="text-error">You must set your visibility status.</p>
                    @enderror
                </div>
                
                {{-- Submit --}}
                <div class="form-block">
                    <button type="submit">
                        <i class="fa-regular fa-save"></i>
                        Create company
                    </button>
                </div>

            </form>
        </div>
        <div class="w-1/4">
            <x-company-modules :company="$company" />
        </div>
    </div>
</x-dashboard-layout>